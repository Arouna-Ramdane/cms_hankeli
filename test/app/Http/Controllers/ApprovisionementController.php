<?php

namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovisionementController extends Controller
{
    /**
     * Liste des approvisionnements avec filtrage par date
     */
    public function index(Request $request)
    {
        $query = Approvisionnement::with('produit');

        // Filtrage par date si fournie
        if ($request->has('date') && $request->date) {
            $query->whereDate('date_appro', $request->date);
        }

        $approvisionnements = $query->orderBy('date_appro', 'desc')
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        return view('approvisionnements.index', compact('approvisionnements'));
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        $produits = Produit::orderBy('libelle')->get();
        return view('approvisionnements.create', compact('produits'));
    }

    /**
     * Enregistrement avec mise à jour automatique du stock
     */
    public function store(Request $request)
    {
        $request->validate([
            'qte_appro' => 'required|numeric|min:1',
            'date_appro' => 'required|date',
            'produit_id' => 'required|exists:produits,produit_id',
        ], [
            'produit_id.required' => 'Veuillez sélectionner un produit',
            'produit_id.exists' => 'Le produit sélectionné n\'existe pas',
            'qte_appro.required' => 'La quantité est obligatoire',
            'qte_appro.min' => 'La quantité doit être supérieure à 0',
            'date_appro.required' => 'La date est obligatoire',
        ]);

        DB::transaction(function () use ($request) {
            // Récupérer le produit
            $produit = Produit::findOrFail($request->produit_id);
            
            // Stock avant approvisionnement
            $stockAvant = $produit->quantiteStock ?? 0;
            
            // Créer l'approvisionnement
            Approvisionnement::create([
                'qte_appro' => $request->qte_appro,
                'date_appro' => $request->date_appro,
                'produit_id' => $request->produit_id,
                'stock_avant' => $stockAvant,
                'stock_apres' => $stockAvant + $request->qte_appro,
            ]);

            // Mettre à jour le stock du produit
            $produit->increment('quantiteStock', $request->qte_appro);
        });

        return redirect()
            ->route('approvisionnements.index')
            ->with('success', 'Approvisionnement enregistré avec succès. Stock mis à jour.');
    }

    /**
     * Affichage détail
     */
    public function show(string $id)
    {
        $approvisionnement = Approvisionnement::with('produit')
            ->findOrFail($id);

        return view('approvisionnements.show', compact('approvisionnement'));
    }

    /**
     * Formulaire édition
     */
    public function edit(string $id)
    {
        $approvisionnement = Approvisionnement::findOrFail($id);
        $produits = Produit::orderBy('libelle')->get();

        return view('approvisionnements.edit', compact('approvisionnement', 'produits'));
    }

    /**
     * Mise à jour avec recalcul du stock
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'qte_appro' => 'required|numeric|min:1',
            'date_appro' => 'required|date',
            'produit_id' => 'required|exists:produits,produit_id',
        ], [
            'produit_id.required' => 'Veuillez sélectionner un produit',
            'produit_id.exists' => 'Le produit sélectionné n\'existe pas',
            'qte_appro.required' => 'La quantité est obligatoire',
            'qte_appro.min' => 'La quantité doit être supérieure à 0',
            'date_appro.required' => 'La date est obligatoire',
        ]);

        DB::transaction(function () use ($request, $id) {
            $approvisionnement = Approvisionnement::findOrFail($id);
            $ancienProduit = Produit::find($approvisionnement->produit_id);
            $nouveauProduit = Produit::findOrFail($request->produit_id);

            // Cas 1 : Le produit a changé
            if ($approvisionnement->produit_id != $request->produit_id) {
                // Retirer la quantité de l'ancien produit
                if ($ancienProduit) {
                    $ancienProduit->decrement('quantiteStock', $approvisionnement->qte_appro);
                }
                
                // Ajouter au nouveau produit
                $stockAvant = $nouveauProduit->quantiteStock;
                $nouveauProduit->increment('quantiteStock', $request->qte_appro);
                
                $approvisionnement->update([
                    'qte_appro' => $request->qte_appro,
                    'date_appro' => $request->date_appro,
                    'produit_id' => $request->produit_id,
                    'stock_avant' => $stockAvant,
                    'stock_apres' => $stockAvant + $request->qte_appro,
                ]);
            } 
            // Cas 2 : Même produit, quantité différente
            else if ($approvisionnement->qte_appro != $request->qte_appro) {
                $difference = $request->qte_appro - $approvisionnement->qte_appro;
                
                if ($ancienProduit) {
                    if ($difference > 0) {
                        $ancienProduit->increment('quantiteStock', $difference);
                    } else {
                        $ancienProduit->decrement('quantiteStock', abs($difference));
                    }
                    
                    $approvisionnement->update([
                        'qte_appro' => $request->qte_appro,
                        'date_appro' => $request->date_appro,
                        'stock_apres' => $approvisionnement->stock_avant + $request->qte_appro,
                    ]);
                }
            }
            // Cas 3 : Juste la date qui change
            else {
                $approvisionnement->update([
                    'date_appro' => $request->date_appro,
                ]);
            }
        });

        return redirect()
            ->route('approvisionnements.index')
            ->with('success', 'Approvisionnement mis à jour avec succès');
    }

    /**
     * Suppression avec ajustement du stock
     */
    public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {
            $approvisionnement = Approvisionnement::findOrFail($id);
            $produit = Produit::find($approvisionnement->produit_id);

            // Retirer la quantité approvisionnée du stock actuel
            if ($produit) {
                $produit->decrement('quantiteStock', $approvisionnement->qte_appro);
            }

            $approvisionnement->delete();
        });

        return redirect()
            ->route('approvisionnements.index')
            ->with('success', 'Approvisionnement supprimé. Stock ajusté.');
    }
}