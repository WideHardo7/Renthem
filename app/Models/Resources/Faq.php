<?php

namespace App\Model\Resources;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model{
    
    protected $table = 'faq';
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
