<?php

use App\Alquan;
use App\Alquran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DummyAlquranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ayat = Http::get('https://api.banghasan.com/quran/format/json/surat')->json()['hasil'];
        foreach ($ayat as $a) {
            Alquran::create([
                'nama_ayat'   => $a['nama'],
                'jumlah_ayat' => $a['ayat'],
                'type_ayat'        => $a['type'],
                'arti'        => $a['arti'],
                'keterangan'   => $a['keterangan'],
            ]);

            }
        }
}
