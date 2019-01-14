<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'documento_url', 
        'escola_classe_id', 
        'candidato_id', 
    ];

    /**
     * Atributos com valores definidos
     *
     * @var array
     */
    protected $attributes = [
        'estado' => 'pendente',
    ];





    public function escola_classe() {
       return $this->belongsTo('App\Escola_Classe');
    }

    public function candidato() {
       return $this->belongsTo('App\Candidato');
    }

    //Relacionamento com Aluno
        public function inscricao()
        {
            return $this->hasOne('App\Inscricao');
        }
}
