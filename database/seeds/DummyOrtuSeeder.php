<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DummyOrtuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');


        for($i = 1; $i <= 50; $i++){

       User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('orangtuasiswa'),
            'level' => ('ortu'),
        ]);

      }

      $ortu = User::where('level','=','ortu')->get();
      $id = 1;
      foreach ($ortu as $value) {
        DB::table('bio_ortus')->insert([
            'user_id' => $value['id'],
            'siswa_id' => $id++,
            'telpon' => $faker->e164PhoneNumber,
        ]);
      }

    }
}
