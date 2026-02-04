<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LigneCommande extends Model
{
    protected $primaryKey = 'lign_id';
    protected $fillable = ['prix_ligne', 'quantite', 'commande_id', 'produit_id'];


    public function Commandes(): BelongsTo
    {
        return $this->belongsTo(Commande::class,'commande_id');
    }

    public function Produits(): BelongsTo
    {
        return $this->belongsTo(Produit::class,'produit_id');
    }
}
