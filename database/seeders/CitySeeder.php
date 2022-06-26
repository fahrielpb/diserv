<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
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
        )->get('https://api.rajaongkir.com/starter/city');
        $cities =  $response['rajaongkir']['results'];

        // mengambil data dari API di insert ke DB kita
        foreach($cities as $city){
            $data_cities[] = [
                'id' => $city['city_id'],
                'province_id' => $city['province_id'],
                'type' => $city['type'],
                'city_name' => $city['city_name'],
                'postal_code' => $city['postal_code']
            ];
        }

        City::insert($data_cities);
    }
}
