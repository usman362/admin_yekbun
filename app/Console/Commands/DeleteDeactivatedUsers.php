<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class DeleteDeactivatedUsers extends Command
{
    protected $signature = 'users:delete-deactivated';
    protected $description = 'Delete users who have been deactivated for more than 90 days';

    public function handle()
    {
        $date = Carbon::now()->subDays(90);

        $users = User::where('status', 0)
                    ->where('deactivated_at', '<', $date)
                    ->get();

        foreach ($users as $user) {
            $file_path = public_path('storage/' . $user->image);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            $user->delete();
        }

        $this->info('Deleted users deactivated more than 90 days ago.');
    }
}
