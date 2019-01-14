<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escola_Classe extends Model
{
    //
    protected $table = 'escola_classe';
	


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'num_vaga', 
        'escola_id',
        'classe_id', 
    ];


    public function candidaturas() {
       return $this->hasMany('App\Candidatura');
    }
}
