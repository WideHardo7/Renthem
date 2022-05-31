<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Resources\Annuncio;

class AnnuncioUsers extends Model
{
    protected $table = 'annunci_users';
    public $timestamps = true;
    //
}
