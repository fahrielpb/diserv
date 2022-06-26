<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders(
            [
                'key' => '83624db318a1398f617240e141350d5b'
            ]
        )->get('https://api.rajaongkir.com/starter/province');
        $provinces =  $response['rajaongkir']['results'];

        // mengambil data dari API di insert ke DB kita

        foreach($provinces as $province){
            $data_province[] = [
                'id' => $province['province_id'],
                'province' => $province['province'],
            ];
        }

        Province::insert($data_province);


    }
}
