<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::whereEmail('test@test.com')->first()) {
            $user = new User();
            $user->name = 'John Doe';
            $user->email = 'test@test.com';
            $user->password = password_hash('123456', PASSWORD_BCRYPT);
            $user->save();
        }

        factory(User::class, 2)->create();
    }
}
