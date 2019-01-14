<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 
        'director',
        'email',
        'endereco',
        'telefone',
        'num_vaga', 
    ];

    // Muitos Para Muitos
    public function classes() {
        return $this->belongsToMany('App\Classe', 'escola_classe')->withPivot('num_vaga')->withTimestamps();
    }
}
