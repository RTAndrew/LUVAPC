<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    //
    //
    protected $table = 'inscricao';
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'data_hora', 
        'candidatura_id',
        'funcionario_id',
        'codigo',
    ];


    // Relacao com a candidatura
	    public function candidatura() {
	       return $this->belongsTo('App\Candidatura');
	    } 

    // Relacao com a funcionario
	    public function funcionario() {
	       return $this->belongsTo('App\Funcionario');
	    } 
	
}
