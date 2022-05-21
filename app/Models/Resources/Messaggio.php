<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Messaggio extends Model
{
    protected $table = 'messaggi';
    protected $primaryKey = 'ID';
    protected $guarded = ['ID'];
    

    public $timestamps = true;
    
    public function prodCat() {
        return $this->hasOne(Category::class, 'catId', 'catId');
    }
    
   
    
}
