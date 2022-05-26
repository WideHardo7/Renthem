<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
/*
            $table->bigIncrements('id')->unsigned()->index();;
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username',20)->unique();
            $table->string('password');
            $table->string('role',10);
            $table->rememberToken();
            $table->timestamps();
*/
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('cognome');
            $table->date('data_nascita');
            $table->set('genere', ['Maschio','Femmina'])->nullable();
            $table->string('email');
             $table->string('telefono');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username',20);
            $table->string('password');
            $table->string('role',10);
            $table->rememberToken();
            $table->timestamps();                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
