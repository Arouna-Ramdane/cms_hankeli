<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approvisionnement extends Model
{
    use HasFactory;

    protected $primaryKey = 'appro_id';

    protected $fillable = [
        'qte_appro',
        'date_appro',
        'produit_id',
        'stock_avant',
        'stock_apres',
    ];

    protected $casts = [
        'date_appro' => 'date',
        'qte_appro' => 'integer',
        'stock_avant' => 'integer',
        'stock_apres' => 'integer',
    ];

    /**
     * Relation avec Produit
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id', 'produit_id');
    }
}