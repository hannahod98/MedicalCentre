<?php
# @Date:   2019-12-01T20:26:49+00:00
# @Last modified time: 2019-12-01T20:49:02+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function visit(){
    return $this->belongsToMany('App\Doctor')->using('App\Visit');
  }

}
