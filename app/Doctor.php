<?php
# @Date:   2019-11-12T14:54:00+00:00
# @Last modified time: 2019-12-05T19:55:27+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function visit(){
      return $this->belongsToMany('App\Patient')->using('App\Visit');
    }
    
}
