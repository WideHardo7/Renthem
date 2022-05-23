<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Annuncio extends Model
{
    protected $table = 'annunci';
    protected $primaryKey = 'FaqId';
    protected $guarded = ['FaqId'];
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'domanda', 'risposta'
    ];
    
}
