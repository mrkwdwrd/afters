<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateAdminPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:update-password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update admin password';

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
        $email = $this->ask('What is the email address?');

        if (!$user = User::withTrashed()->where('email', $email)->first()) {
            $this->error("User Email {$email} does not exist!");
        } else {
            $password = $this->ask('What is the new password?');

            $user->password = bcrypt($password);
            $user->save();
            $this->info("User {$email} is updated, new password is {$password}");
        }
    }
}
