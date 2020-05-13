<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    // protected $table = 'candidatures';

    // public $primaryKey = 'id';

    // public $timestamps = 'false';

    public function user(){
        return $this->belongsTo('App\User');
    }

}
