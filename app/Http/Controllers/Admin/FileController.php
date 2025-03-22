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
        // dd($request);

        if (!$request->hasFile('file')) {
            return response('', 400);
        }

        // $path = $request->file->store("/" . $request->folder?? 'files', "public");

        // Get the uploaded file from the request
        $uploadedFile = $request->file('file');

        // Generate a unique name for the file, or use the original file name
        $uniqueName = uniqid() . '___' . str_replace(' ', '_', $uploadedFile->getClientOriginalName());

        // Get the folder name from the request or use 'files' as the default folder
        $folder = $request->folder ?? 'files';

        // Store the file in the 'public' disk (configured in config/filesystems.php)
        $filePath = $uploadedFile->storeAs("/{$folder}", $uniqueName, "public");

        $fileSize = $this->formatSizeUnits($uploadedFile->getSize());
        // $filtered_path = url('/') . '/storage/' .  $filePath;
        $durationType = '';
        try {
            $audio = new \wapmorgan\Mp3Info\Mp3Info($request->file('file'), true);
            $durationInSeconds = $audio->duration;
            $durationType = 'audio';
        } catch (\Exception $e) {
            $durationInSeconds = '';
            $durationType = 'video';
        }

        if ($durationType == 'video') {
            // Initialize FFMpeg
            $ffmpeg = FFMpeg::create();
            // Open the media file (you need to get the real path of the uploaded file)
            $media = $ffmpeg->open($request->file('file'));
            // Get the format of the file to retrieve metadata, including the duration
            $format = $media->getFormat();
            // Get duration in seconds (or any other format you want)
            $duration = $format->get('duration'); // Duration is in seconds

            $durationInSeconds = $duration;
        }

        if ($durationInSeconds !== '') {
            // Format duration in minutes:seconds
            $formattedDuration = Helpers::formatDuration($durationInSeconds);
        }

        return [
            'status' => true,
            'path' => $filePath,
            'size' => $fileSize,
            'duration' => $formattedDuration ?? '',
        ];
    }

    public function delete(Request $request)
    {
        if (!$request->path) {
            return response('', 400);
        }
        unlink(public_path('storage/' . $request->path));
        if (Storage::delete($request->path)) {
            return [
                'status' => true
            ];
        } else {
            return [
                'status' => false
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

    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 0) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 0) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 0) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
