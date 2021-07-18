<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Console\Command;

class CreateRandomUserAction extends Command
{
    protected $signature = 'create-random-user';

    protected $description = 'Creates a random user.';

    public function handle()
    {
        User::factory()->create();
    }
}
