<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixPermissionRoleIds extends Command
{
    protected $signature = 'fix:permission-role-ids';
    protected $description = 'Fix role_ids field from string to array in permissions collection';

    public function handle()
    {
        $permissions = DB::connection('mongodb')->collection('permissions')->get();
        $fixedCount = 0;

        foreach ($permissions as $permission) {
            if (isset($permission['role_ids']) && is_string($permission['role_ids'])) {
                $decoded = json_decode($permission['role_ids'], true);

                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    DB::connection('mongodb')
                        ->collection('permissions')
                        ->where('_id', $permission['_id'])
                        ->update(['role_ids' => $decoded]);

                    $fixedCount++;
                }
            }
        }

        $this->info("Fixed $fixedCount permission records.");
    }
}
