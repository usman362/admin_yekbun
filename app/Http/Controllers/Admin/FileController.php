<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response('', 400);
        }

        $bunny = new \App\Services\BunnyCDNService(); // our service

        $uploadedFile = $request->file('file');

        $extension = strtolower($uploadedFile->getClientOriginalExtension());

        // File categories
        $videoExtensions = ['mp4', 'mov', 'avi', 'mkv', 'webm'];
        $audioExtensions = ['mp3', 'wav', 'aac', 'm4a', 'flac'];
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp'];

        // dd($request->folder);
        // $folder = trim($request->folder ?? 'files', '/');

        if (in_array($extension, $videoExtensions)) {
            $folder = 'videos/'.$request->folder;
        } elseif (in_array($extension, $audioExtensions)) {
            $folder = 'audios/'.$request->folder;
        } elseif (in_array($extension, $imageExtensions)) {
            $folder = 'images/'.$request->folder;
        } else {
            $folder = 'files/'.$request->folder;
        }

        // Unique filename
        $uniqueName = uniqid() . '__' . str_replace(' ', '_', $uploadedFile->getClientOriginalName());

        // Temporary local storage path
        $ext = strtolower($uploadedFile->getClientOriginalExtension());
        $tempLocalPath = storage_path('app/uploads/' . uniqid() . '.' . $ext);

        // Move original uploaded file to temp
        $uploadedFile->move(dirname($tempLocalPath), basename($tempLocalPath));

        // ==============================
        // CONVERSION (AUDIO + VIDEO)
        // ==============================
        if ($ext === 'mp3') {
            $convertedPath = str_replace('.mp3', '.m4a', $tempLocalPath);
            Helpers::convertToM4A($tempLocalPath, $convertedPath);

            unlink($tempLocalPath);
            $finalLocalFile = $convertedPath;
        } elseif ($ext === 'mp4') {

            $convertedPath = str_replace('.mp4', '_h265.mp4', $tempLocalPath);
            Helpers::convertToH265($tempLocalPath, $convertedPath);

            unlink($tempLocalPath);
            $finalLocalFile = $convertedPath;
        }else{
            $finalLocalFile = $tempLocalPath;
        }

        // File size formatting
        $fileSize = $this->formatFileSizeMB(filesize($finalLocalFile));

        // ==============================
        // GET DURATION (audio/video)
        // ==============================
        try {
            $audio = new \wapmorgan\Mp3Info\Mp3Info($uploadedFile, true);
            $durationInSeconds = $audio->duration;
            $durationType = 'audio';
        } catch (\Exception $e) {
            $durationType = 'video';
            $durationInSeconds = '';
        }

        // If video and not json_files
        // if ($durationType === 'video' && $request->folder !== 'json_files') {
        //     if (env('FFMPEG')) {
        //         $ffmpeg = \FFMpeg\FFMpeg::create();
        //         $media = $ffmpeg->open($uploadedFile->getRealPath());
        //         $format = $media->getFormat();
        //         $durationInSeconds = $format->get('duration');
        //     } else {
        //         $durationInSeconds = 120; // fallback
        //     }
        // }
        $durationInSeconds = 120; // fallback

        $formattedDuration = $durationInSeconds ? Helpers::formatDuration($durationInSeconds) : '';

        // ==============================
        // Upload to BunnyCDN
        // ==============================
        $content = file_get_contents($finalLocalFile);
        $mime = mime_content_type($finalLocalFile);

        // Create folder if needed + upload
        $cdnUrl = $bunny->upload(
            $folder,
            $uniqueName,
            $content,
            $mime
        );

        // Delete local converted file
        unlink($finalLocalFile);

        return [
            'status' => true,
            'path' => $folder . '/' . $uniqueName,            // CDN URL
            'size' => $fileSize,
            'duration' => $formattedDuration,
        ];
    }

    public function delete(Request $request)
    {
        if (!$request->path) {
            return response([
                'status' => false,
                'message' => 'File path required.'
            ], 400);
        }

        $bunny = new \App\Services\BunnyCDNService();

        // Bunny paths look like: images/users/file.jpg
        $filePath = trim($request->path, '/');
        // dd($filePath);

        try {
            $deleted = $bunny->delete($filePath);

            return [
                'status' => $deleted,
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    public function upload_bg(Request $request)
    {
        $imagePath = $request->file('file')->store('public/images');
        $filtered_path = url('/') . '/storage/' . explode('/', $imagePath, 2)[1];
        return [
            'status' => true,
            'path' => $filtered_path
        ];
    }

    function formatFileSizeMB($bytes, $precision = 2)
    {
        return round($bytes / (1024 * 1024), $precision);
    }
}
