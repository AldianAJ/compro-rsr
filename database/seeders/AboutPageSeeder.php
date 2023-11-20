<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = file_get_contents('database/seeders/json/aboutpage.json');
        $datas = json_decode($datas);
        foreach ($datas as $data) {
            DB::beginTransaction();
            try {
                $about_page = new AboutPage;
                $about_page->slug = str_replace(" ", "-", strtolower($data->section)) . "-" . Str::random(5);
                $about_page->section = $data->section;
                $about_page->save();
                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                echo $ex->getMessage();
            }
        }
    }
}
