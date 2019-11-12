<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserComment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user_1 = new User();
        $user_1->id = '1';
        $user_1->name = 'John Smith';
        $user_1->save();

        $user_2 = new User();
        $user_2->id = '2';
        $user_2->name = 'John Doe';
        $user_2->save();

        $user_comment_1 = new UserComment();
        $user_comment_1->user_id = 1;
        $user_comment_1->comment = 'Test Comment 1';

        $user_comment_2 = new UserComment();
        $user_comment_2->user_id = 2;
        $user_comment_2->comment = 'Test Comment 2';
    }
}
