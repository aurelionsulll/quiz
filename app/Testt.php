<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testt extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function qst()
    {
        return $this->belongsTo('App\Qst');
    }
    
    public function answer()
    {
        return $this->belongsTo('App\Answer');
    }
}
