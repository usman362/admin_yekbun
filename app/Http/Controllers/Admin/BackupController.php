<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\SystemBackup;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class BackupController extends Controller
{

    public function listBackups()
    {
        $backups = SystemBackup::latest()->get();
        return response()->json($backups);
    }

    public function createBackup()
    {
        // Only allow admin (you can use your own logic)
        // if (!auth()->user() || !auth()->user()->is_admin) {
        //     abort(403, 'Unauthorized');
        // }

        $backupDir = storage_path('app/backups');
        if (!File::exists($backupDir)) {
            File::makeDirectory($backupDir, 0755, true);
        }

        $fileName = 'project_backup_' . Carbon::now()->format('Y_m_d_H_i_s') . '.zip';
        $filePath = $backupDir . '/' . $fileName;

        $zip = new ZipArchive;
        if ($zip->open($filePath, ZipArchive::CREATE) === TRUE) {
            $rootPath = base_path();

            // Choose what to include (avoid vendor/node_modules if large)
            $folders = [
                // Folders
                'app',
                'bootstrap',
                'config',
                'database',
                'docker',
                'images',
                'lang',
                'public',
                'resources',
                'routes',
                'storage',
                'tests',

                // Root-level files
                '.editorconfig',
                '.env',
                '.env.example',
                '.gitattributes',
                '.gitignore',
                '.htaccess',
                '.prettierignore',
                '.prettierrc.json',
                '.styleci.yml',
                'artisan',
                'composer.json',
                'composer.lock',
                'default.php',
                'docker-compose.yml',
                'index.php',
                'package-lock.json',
                'package.json',
                'phpunit.xml',
                'README.md',
                'test.php',
                'vite.config.js',
                'webpack.mix.js',
            ];

            foreach ($folders as $folder) {
                $fullPath = $rootPath . '/' . $folder;

                if (File::exists($fullPath)) {
                    // Skip the backup directory itself
                    if (strpos($fullPath, 'storage/app/backups') !== false) {
                        continue;
                    }

                    if (is_dir($fullPath)) {
                        $files = new \RecursiveIteratorIterator(
                            new \RecursiveDirectoryIterator($fullPath),
                            \RecursiveIteratorIterator::LEAVES_ONLY
                        );

                        foreach ($files as $name => $file) {
                            if (!$file->isDir()) {
                                $filePathName = $file->getRealPath();

                                // Skip old backup files inside storage/app/backups
                                if (strpos($filePathName, 'storage/app/backups') !== false) {
                                    continue;
                                }

                                $relativePath = substr($filePathName, strlen($rootPath) + 1);
                                $zip->addFile($filePathName, $relativePath);
                            }
                        }
                    } else {
                        $zip->addFile($fullPath, $folder);
                    }
                }
            }

            $zip->close();
        }

        $zipPath = storage_path('app/backups/' . $fileName);
        $fileSize = $this->humanFileSize(filesize($zipPath));
        $systemBackup = new SystemBackup();
        $systemBackup->name = 'System Backup';
        $systemBackup->filename = $fileName;
        $systemBackup->filesize = $fileSize;
        $systemBackup->save();

        return response()->json([
            'success' => true,
            'message' => 'Backup created successfully!',
            'download_url' => route('backup.download', ['filename' => $fileName]),
        ]);
    }

    private function humanFileSize($bytes, $decimals = 2)
    {
        $size = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . $size[$factor];
    }

    public function downloadBackup($filename)
    {
        $filePath = storage_path('app/backups/' . $filename);

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->download($filePath)->deleteFileAfterSend(false);
    }

    public function deleteBackup(Request $request)
    {
        // Sanitize filename (prevent directory traversal)
        $filename = basename($request->filename);

        $filePath = storage_path('app/backups/' . $filename);

        if (!file_exists($filePath)) {
            return ResponseHelper::sendResponse([], 'File not found!', false, 404);
        }

        try {
            $backup = SystemBackup::where('filename', $filename)->first();
            if($backup){
                $backup->delete();
            }
            unlink($filePath);
            return ResponseHelper::sendResponse([], 'Backup deleted successfully');
        } catch (\Throwable $e) {
            return ResponseHelper::sendResponse([], 'Error deleting file', false, 500);
        }
    }
}
