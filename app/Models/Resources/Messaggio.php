<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Messaggio extends Model
{
    protected $table = 'messaggi';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    

    public $timestamps = true;
    
    //relazione one to many inversa,
    public function locatorechat() {
        return $this->belongsTo(User::class, 'id', 'idlocatore');
    }
    //relazione one to many inversa,
    public function locatariochat() {
        return $this->belongsTo(User::class, 'id', 'idlocatario');
    }
    
   
    
}
