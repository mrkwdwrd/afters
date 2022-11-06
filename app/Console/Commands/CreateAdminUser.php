<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

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

        if ($email === 'admin@admin.com' && env('APP_ENV') !== 'local') {
            $this->error('admin@admin.com should not be used as the main user when not locally devving. Please enter something else.');
            return false;
        }

        if (User::withTrashed()->where('email', $email)->first()) {
            $this->error('User Email {$email} already exists!');
        } else {
            $password = $this->ask('What is the password?');

            $user = new User;
            $user->first_name = 'Admin';
            $user->surname = 'User';
            $user->email = $email;
            $user->password = bcrypt($password);
            $user->is_admin = true;
            $user->save();
            $this->info('A new user '.$email.' is created, password is '.$password);
        }
    }
}
