<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BunnyCDNService
{
    protected $zone;
    protected $key;
    protected $region;
    protected $cdnUrl;

    public function __construct()
    {
        $this->zone = env('BUNNY_STORAGE_ZONE');
        $this->key = env('BUNNY_STORAGE_KEY');
        $this->region = env('BUNNY_REGION', 'de');
        $this->cdnUrl = env('BUNNY_CDN_URL');
    }

    private function apiBase()
    {
        return "https://storage.bunnycdn.com/{$this->zone}";
    }

    private function headers()
    {
        return [
            'AccessKey' => $this->key
        ];
    }

    // ============================
    // Check if folder exists
    // ============================
    public function folderExists($folder)
    {
        $folder = trim($folder, '/');

        $response = Http::withHeaders($this->headers())
            ->get($this->apiBase() . '/' . $folder);

        return $response->successful(); // TRUE if folder exists
    }

    // ============================
    // Create folder
    // ============================
    public function createFolder($folder)
    {
        $folder = trim($folder, '/') . '/';

        $response = Http::withHeaders($this->headers())
            ->put($this->apiBase() . '/' . $folder);

        if ($response->failed()) {
            throw new \Exception("Unable to create folder: " . $response->body());
        }

        return true;
    }

    // ============================
    // Upload with auto-folder-create
    // ============================
    public function upload($folder, $filename, $content, $contentType)
    {
        // Auto-create folder if needed
        // if (!$this->folderExists($folder)) {
        //     $this->createFolder($folder);
        // }

        $path = trim($folder, '/') . '/' . $filename;

        $response = Http::withHeaders([
            'AccessKey'    => $this->key,
            'Content-Type' => $contentType
        ])
        ->withBody($content, $contentType)
        ->put($this->apiBase() . '/' . $path);

        if ($response->failed()) {
            throw new \Exception("Upload failed: " . $response->body());
        }

        return $this->cdnUrl . '/' . $path;
    }

    // Delete file
    public function delete($filePath)
    {
        $url = "https://storage.bunnycdn.com/{$this->zone}/{$filePath}";

        $response = Http::withHeaders([
            'AccessKey' => $this->key
        ])->delete($url);

        return $response->successful();
    }

    // Generate CDN URL
    public function url($filePath)
    {
        return $this->cdnUrl . '/' . $filePath;
    }
}
