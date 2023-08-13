<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserProfile;
use App\Models\User;
use App\Action\Profile\CreateUserProfileAction;

class CreateUserProfileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user profile and return Bearer token';

    /**
     * Execute the console command.
     */
    public function handle(CreateUserProfileAction $action)
    {
        $credentials = [
            'name' => 'nazar',
            'email' => 'nazar@nazar.com',
            'password' => 'password' 
        ];
        $user = User::create($credentials);

        $action([
            'ldu_login' => 'n.iliasevych',
            'ldu_password' => '45895',
            'faculty_id' => 1,
            'group_id' => 97,
            'course' => 1,
            'user_id' => $user->id,
        ]);

        $token = auth()->attempt($credentials);

        $this->info('Bearer '. $token);
    }
}
