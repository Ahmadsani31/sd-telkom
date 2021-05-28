<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 50; $i++){

            // insert data ke table pegawai menggunakan Faker
        User::create([
              'name' => $faker->name,
              'email' => $faker->email,
              'password' => bcrypt('siswasdtelkom'),
              'level' => ('siswa'),
          ]);

      }


      $sis = User::where('level','=','siswa')->get();

      foreach ($sis as $value) {
     DB::table('bio_siswas')->insert([
            'user_id' => $value['id'],
            'nisn' => $faker->isbn10,
            'telpon' => $faker->e164PhoneNumber,
            'lokal' => ('A'),
            'kelas' => ('I'),
            'gender' => ('L'),
            'alamat' => $faker->address,
        ]);
      }

    }
}
