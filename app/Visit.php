<?php
# @Date:   2019-12-05T18:55:54+00:00
# @Last modified time: 2019-12-06T20:45:30+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  public function user(){
    return $this->hasMany('App\User');
  }
}
