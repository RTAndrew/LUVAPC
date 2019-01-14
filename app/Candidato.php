<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 
        'sexo',
        'data_nascimento',
        'bi_numero',
        'telefone', 
        'email', 
        'user_id', 
        'bi_url', 
        'endereco', 
    ];






    //Relacionamento com User
	    public function user() {
	        return $this->belongsTo('App\User');
	    }

    // Relacionamento com Candidatura
        public function candidaturas() {
           return $this->hasMany('App\Candidatura');
        } 
}
