<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Str;

class BunnyOptimizer
{
 public static function optimize($path, $type = null)
    {
        $base = env('BUNNY_CDN_URL') . $path;

        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        // Detect type if not provided
        if (!$type) {
            if (in_array($ext, ['jpg','jpeg','png','webp'])) {
                $type = 'image';
            } elseif (in_array($ext, ['mp4','mov','mkv'])) {
                $type = 'video';
            } elseif (in_array($ext, ['mp3','m4a','wav','aac'])) {
                $type = 'audio';
            } else {
                $type = 'other';
            }
        }

        switch ($type) {
            case 'image':
                return $base . "?width=400&quality=60&webp=1";

            case 'video':
                return $base . "?video_quality=480&codec=h265&bitrate=800k";

            case 'audio':
                return $base . "?audio_bitrate=64";

            default:
                return $base;
        }
    }

    // 👇 ADD THIS: Get file size from CDN without downloading
    public static function getCDNFileSize($path)
    {
        $url = env('BUNNY_CDN_URL') . $path;

        $headers = @get_headers($url, 1);

        if (!$headers || !isset($headers['Content-Length'])) {
            return null;
        }

        $bytes = (int) $headers['Content-Length'];

        return self::formatBytes($bytes);
    }

    // 👇 Formatter: convert bytes to KB/MB
    private static function formatBytes($bytes)
    {
        $sizes = ['B', 'KB', 'MB', 'GB'];

        if ($bytes == 0) return "0 B";

        $i = floor(log($bytes, 1024));

        return round($bytes / pow(1024, $i), 2) . ' ' . $sizes[$i];
    }
}
