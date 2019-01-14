<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
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
    ];
    
    


    //Relacionamento com User
	    public function user()
	    {
	        return $this->belondsTo('App\User');
	    } 

    // Relacionamento com as inscricoes
        public function inscricao()
        {
           return $this->hasMany('App\Inscricao');
        }
}
