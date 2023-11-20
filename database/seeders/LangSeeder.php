<?php

namespace Database\Seeders;

use App\Models\Lang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = file_get_contents('database/seeders/json/lang.json');
        $datas = json_decode($datas);
        foreach ($datas as $data) {
            DB::beginTransaction();
            try {
                $lang = new Lang;
                $lang->code = $data->code;
                $lang->language = $data->language;
                $lang->save();
                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                echo $ex->getMessage();
            }
        }
    }
}
