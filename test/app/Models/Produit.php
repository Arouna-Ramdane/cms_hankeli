<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $primaryKey = 'produit_id';
    protected $fillable = ['libelle', 'prix', 'quantiteStock','image'];

    public function LigneCommandes(): HasMany
    {
        return $this->hasMany(LigneCommande::class);
    }
}
