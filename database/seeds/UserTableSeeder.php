<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User([
			'email' => 'admin@gmail.com',
			'password' => bcrypt('admin123'),
			'admin' => '1',
        ]);

        $user->save();

        $user = new App\User([
			'email' => 'user@gmail.com',
			'password' => bcrypt('user123'),
			'admin' => '0',
        ]);

        $user->save();
    }
}
