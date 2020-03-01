<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //

     public function Company()
    {
    return $this->belongsTo('App\Company' ,'company');
    }
}
