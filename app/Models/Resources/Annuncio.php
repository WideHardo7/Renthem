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
        'IDproprietario', 'citta','zona_quartiere','indirizzo','descrizione','importo','dimensione','tipologia','data_inizio_disponibilita','data_fine_disponibilita',
        'servizi_inclusi','eta_minima','genere_richiesto','data_assegnazione','assegnato','immagine','C_numero_posti_letto_totali','C_numero_posti_letto_in_camera',
        'C_presenza_angolo_studio','A_numero_camere','A_numero_posti_letto','A_presenza_cucina','A_presenza_locale_ricreativo','A_servizi_disponibili',
    ];
    
}
