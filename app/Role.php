<?php
# @Date:   2019-11-06T15:58:15+00:00
# @Last modified time: 2019-11-06T17:37:23+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  public function users(){
    return $this->belongsToMany('App\User','user_role');
  }
}
