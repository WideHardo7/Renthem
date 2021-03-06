<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use App\Models\Resources\Annuncio;
use App\Models\Resources\Messaggio;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'cognome', 'email', 'username', 'password', 'telefono', 'data_nascita' ,'genere', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function hasRole($role) {
        $role = (array)$role;
        return in_array($this->role, $role);
    }
    
    public function setPasswordAttribute($value){
        $this->attributes['password']=Hash::make($value);
    }
    //relazione one to many un locatore può inserire più annunci
    public function annunci(){
        return $this->hasMany(Annuncio::class, 'user_id', 'id');
    }
    //relazione many to many più locatari possono opzionare lo stesso annuncio e più annunci
    public function moreannunci(){
        return $this->belongsToMany(Annuncio::class, 'annunci_users')->withPivot('assegnato')->withTimestamps();
        
    }
    //relazione one to many un locatore può ricevere più messaggi
    public function messaggiolocatore(){
        return $this->hasMany(Messaggio::class, 'idlocatore', 'id');
    }
    //relazione one to many un locatario può inviare più messaggi
     public function messaggiolocatario(){
        return $this->hasMany(Messaggio::class, 'idlocatario', 'id');
    }

}
