<?php
# @Date:   2019-11-06T14:41:01+00:00
# @Last modified time: 2019-12-07T14:27:05+00:00




namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

public function doctor(){
  return $this->hasOne('App\Doctor');
}
public function patient(){
  return $this->hasOne('App\Patient');
}

public function visit(){
  return $this->belongsToMany('App\Doctor')->using('App\Visit');
}


    public function roles(){
      return $this->belongsToMany('App\Role','user_role');
    }

    public function authorizeRoles($roles){
      if (is_array($roles)){
        return $this->hasAnyRole($roles)||abort(401,'This action is unauthorised');
      }
      return $this->hasAnyRole($roles)||abort(401,'This action is unauthorised');
    }

    public function hasAnyRole($role){
      return null !== $this->roles()->where('name',$role)->first();
    }

    // public functiion hasRole($roles){
    //   return null !== $this->roles()->whereIn('name',$roles)->first();
    // }
    // if($user->authorizeRoles('admin')){
    //
    // }
    // else{
    //
    // }
}
