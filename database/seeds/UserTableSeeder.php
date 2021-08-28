<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\Models\DictationResultModel;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Админ
        // $user = new User;
        // $user->name = 'admin';
        // $user->email = 'aswass@assasd';
        // $user->password = Hash::make("password");
        // $user->email_verified_at = Carbon::now();
        // $user->image = 'f8v4toYqRtpJCD1p328kZniRykrCG6X09k74926m.png';
        // $user->save();
        // $user->assignRole('admin');
        for($i = 0; $i < 10; $i++) {
            $user = new User;
            $user->name = str_random(10);
            $user->email = str_random(10).'@gmail.com';
            $user->password = bcrypt('secret');
            $user->image = str_random(10);
            $user->assignRole('user');
            $user->save();
            $dictationResult = new DictationResultModel;
            $dictationResult->dictation_id = 1;
            $dictationResult->user_id = $user->id;
            $dictationResult->text = '';
            $dictationResult->save();
        }

        // сразу к бд

        // $user = DB::table('users')->insert([
        // 	'name' => 'admin',
        // 	'email' => 'wwryzhakovasadawsdassdawsd@gmail.com',
        // 	'password' => Hash::make('password'),
        // 	'email_verified_at' => Carbon::now(),
        // ]);

        // DB::table('model_has_roles')->insert([
        // 	'role_id' => 2,
        // 	'model_type' => 'App\User',
        // 	'model_id' => 26
        // ]);
    }
}
