<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    // Muitos Para Muitos
    public function escolas() {
        return $this->belongsToMany('App\Escola', 'escola_classe')->withPivot('num_vaga')->withTimestamps();
        // return $this->belongsToMany('App\Escola')->using('App\Escola_Classe');
    }
}
