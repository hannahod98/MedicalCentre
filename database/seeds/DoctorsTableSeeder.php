<?php
# @Date:   2019-11-12T15:35:48+00:00
# @Last modified time: 2019-11-13T14:42:01+00:00




use Illuminate\Database\Seeder;
use App\Role;
use App\Doctor;

class DoctorsTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_user = Role::where('name','doctor')->first();
      // echo ($role_user);
      foreach ($role_user->users as $user){
        $doctor = new Doctor();
        $doctor->start_date = '2019-06-15';
        $doctor->user_id = $user->id;
        $doctor->save();
      }
    }
    //private function random_str($length,$keyspace){

    //}
}
