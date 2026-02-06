<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Ismaelw\LaraTeX\LaraTeX;

class JournalController extends Controller
{
    public function imprimer()
    {
        $date = Carbon::today();

        // LIGNES DE VENTE GROUPEES PAR PRODUIT
        $lignes = DB::table('ligne_commandes')
            ->join('produits', 'ligne_commandes.produit_id', '=', 'produits.produit_id')
            ->select(
                'produits.produit_id',
                'produits.libelle',
                DB::raw('SUM(ligne_commandes.quantite) as quantite_totale'),
                DB::raw('SUM(ligne_commandes.prix_ligne) as montant_total')
            )
            ->whereDate('ligne_commandes.created_at', $date)
            ->groupBy('produits.produit_id', 'produits.libelle')
            ->orderBy('produits.libelle')
            ->get();

        // Total encaissé journalier
        $total = $lignes->sum('montant_total');

        return (new LaraTeX('latex.inventaire_recu'))
            ->with([
                'lignes' => $lignes,
                'total'  => $total,
                'date'   => $date->format('d/m/Y'),
            ])
            ->download('rapport-vente-'.$date->format('d-m-Y').'.pdf');
    }
}
