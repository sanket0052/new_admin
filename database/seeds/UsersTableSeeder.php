<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        try{
            $user = User::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => app('hash')->make('123456'),
                'contact_no' => '8989898989',
                'role_id' => Role::first()->getKey(),
                'created_by' => null,
                'birth_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }catch(Exception $e){
            echo $e;
        }
    }
}
