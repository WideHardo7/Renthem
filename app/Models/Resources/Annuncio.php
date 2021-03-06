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
        'IDproprietario', 
        'user_id',//maybe wrong
        'citta',
        'zona_quartiere',
        'indirizzo',
        'descrizione',
        'importo',
        'dimensione',
        'tipologia',
        'data_inizio_disponibilita',
        'data_fine_disponibilita',
        'servizi_inclusi',
        'eta_minima',
        'genere_richiesto',
        'assegnato',
        'data_assegnazione',       
        'immagine',
        
        'numero_posti_letto_totali',
        'C_numero_posti_letto_in_camera',
        
        'A_numero_camere',
        'A_locali_presenti',        
    ];
    //relazione one to many inversa, da un annuncio devo poter risalire al suo gestore/locatore
    public function utente(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    //relazione many to many inversa, da qualsiasi annuncio sia, io devo poter risalire a tutti i locatari che lo hanno opzionato
    public function moreutenti(){
        return $this->belongsToMany(User::class, 'annunci_users')->withPivot('assegnato')->withTimestamps();
    }
      
}
