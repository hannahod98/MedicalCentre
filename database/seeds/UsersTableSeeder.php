<?php
# @Date:   2019-11-06T16:19:22+00:00
# @Last modified time: 2019-12-01T21:16:36+00:00




use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name','admin')->first();
      $role_doctor = Role::where('name','doctor')->first();
      $role_patient = Role::where('name','patient')->first();

      $admin = new User();
      $admin->name = 'Hannah O Donoghue';
      $admin->address = 'father kearns street';
      $admin->phone = '0844444356';
      $admin->email ='admin@mail.com';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $doctor = new User();
      $doctor->name = 'Mark mann';
      $doctor->address = '1 Mann street';
      $doctor->phone = '0871234985';
      $doctor->email ='drmarkmann@mail.com';
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor = new User();
      $doctor->name = 'David Simmons';
      $doctor->address = 'main street';
      $doctor->phone = '0881234985';
      $doctor->email ='drdavidsimmons@mail.com';
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $patient = new User();
      $patient->name = 'Mary Doyle';
      $patient->address = 'Derry street';
      $patient->phone = '0821267893';
      $patient->email ='marydoyle@mail.com';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient = new User();
      $patient->name = 'Sarah Farell';
      $patient->address = 'Main street';
      $patient->phone = '0861267887';
      $patient->email ='sarahfarell@mail.com';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);
    }


}
