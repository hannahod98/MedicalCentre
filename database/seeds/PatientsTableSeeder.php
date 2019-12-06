<?php
# @Date:   2019-12-01T20:52:54+00:00
# @Last modified time: 2019-12-03T15:20:09+00:00




use Illuminate\Database\Seeder;
use App\Role;
use App\Patient;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_user = Role::where('name','patient')->first();
      // echo ($role_user);
      foreach ($role_user->users as $user){
        $patient = new Patient();
        $patient->insurance = true;
        $patient->insurance_name = 'health insurance';
        $patient->user_id = $user->id;
        $patient->save();
      }
    }
}
