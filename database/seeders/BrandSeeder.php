<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = file_get_contents('database/seeders/json/brand.json');
        $datas = json_decode($datas);
        foreach ($datas as $data) {
            DB::beginTransaction();
            try {
                $brand = new Brand();
                $brand->slug = Str::slug($data->brand_name, '-') . "-" . Str::random(5);
                $brand->brand_name = $data->brand_name;
                $brand->save();
                DB::commit();
            } catch (\Exception $ex) {
                //throw $th;
                DB::rollBack();
                echo $ex->getMessage();
            }
        }
    }
}
