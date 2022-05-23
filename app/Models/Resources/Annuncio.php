<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Annuncio extends Model
{
    protected $table = 'annunci';
    protected $primaryKey = 'AnnuncioId';
    protected $guarded = ['AnnuncioId'];
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDproprietario', 'citta','zona-quartiere','indirizzo','descrizione',
    ];
    
}
