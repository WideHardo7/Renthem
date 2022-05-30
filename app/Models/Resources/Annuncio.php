<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;

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
        'user_id', 'citta','zona-quartiere','indirizzo','descrizione',
    ];
    public function utente(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
    public function moreutenti(){
        return $this->belongsToMany(Users::class, 'annunci_users')->withTimestamps();
    }
    
}
