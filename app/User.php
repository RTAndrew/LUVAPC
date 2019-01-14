<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'perfil', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Atributos com valores definidos
     *
     * @var array
     */
    protected $attributes = [
        'perfil' => 'candidato'
    ];
    
    


    //Relacionamento com Aluno
        public function candidato()
        {
            return $this->hasOne('App\Candidato');
        } 

    //Relacionamento com Funcionario
        public function funcionario()
        {
            return $this->hasOne('App\Funcionario');
        } 





    // Funcoes para descobrir
    // O tipo de usuario

        public function isAdmin(){
            if ($this->perfil == 'admnin'){
                return true;
            } else {
                return false;
            }
        }

        public function isFuncionario(){
            if ($this->perfil == 'funcionario'){
                return true;
            } else {
                return false;
            }
        }

        public function isCandidato(){
            if ($this->perfil == 'candidato'){
                return true;
            } else {
                return false;
            }
        }
}
