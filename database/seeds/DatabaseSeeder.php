<?php
# @Date:   2019-11-06T14:41:00+00:00
# @Last modified time: 2019-11-06T16:29:03+00:00




use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(DoctorsTableSeeder::class);
         $this->call(PatientsTableSeeder::class);

    }
}
