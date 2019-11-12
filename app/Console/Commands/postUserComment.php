<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\UserComment;


class postUserComment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:comment {user_id : The ID of the user} {comment : Comment}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Post user comment, for comment with space use double quotation `e.g php artisan post:comment 1 "Test Comment"`';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user_id = $this->argument('user_id');
        $comment = $this->argument('comment');

        //check if user exist
        $user = User::find($user_id);
        if (!$user)
            return $this->error('user not found.');

        UserComment::create(['user_id' => $user_id, 'comment' => $comment]);
        $this->info('comment saved.');
    }
}
