<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = file_get_contents('database/seeders/json/user.json');
        $datas = json_decode($datas);
        foreach ($datas as $data) {
            DB::beginTransaction();
            try {
                $user = new User;
                $user->name = $data->name;
                $user->email = $data->email;
                $user->role = $data->role;
                $user->password = bcrypt($data->password);
                $user->save();
                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                echo $ex->getMessage();
            }
        }
    }
}
