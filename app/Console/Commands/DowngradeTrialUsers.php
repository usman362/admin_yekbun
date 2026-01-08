<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class DowngradeTrialUsers extends Command
{
    protected $signature = 'users:downgrade-trial';
    protected $description = 'Downgrade Trial Users Educated to Cultivated after 30 days';

    public function handle()
    {
        $date = Carbon::now()->subDays(30);

        $users = User::where('subscription_type', 'trial')
                    ->where('user_type', 'educated')
                    ->where('expired_at', '<', $date)
                    ->get();

        foreach ($users as $user) {
            $user->user_type = 'cultivated';
            $user->level = 0;
            $user->save();
        }

        $this->info('Downgraded Trial Users Educated to Cultivated after 30 days.');
    }
}
