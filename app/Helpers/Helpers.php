<?php

namespace App\Helpers;

use App\Models\Emoji;
use App\Models\LanguageDetail;
use Config;
use App\Models\Text;
use App\Models\Translation;
use App\Services\BunnyCDNService;
use Exception;
use Illuminate\Support\Str;

class Helpers
{
    public static function appClasses()
    {

        $data = config('custom.custom');


        // default data array
        $DefaultData = [
            'myLayout' => 'vertical',
            'myTheme' => 'theme-default',
            'myStyle' => 'light',
            'myRTLSupport' => true,
            'myRTLMode' => true,
            'hasCustomizer' => true,
            'showDropdownOnHover' => true,
            'displayCustomizer' => true,
            'menuFixed' => true,
            'menuCollapsed' => false,
            'navbarFixed' => true,
            'footerFixed' => false,
            'menuFlipped' => false,
            // 'menuOffcanvas' => false,
            'customizerControls' => [
                'rtl',
                'style',
                'layoutType',
                'showDropdownOnHover',
                'layoutNavbarFixed',
                'layoutFooterFixed',
                'themes',
            ],
            //   'defaultLanguage'=>'en',
        ];

        // if any key missing of array from custom.php file it will be merge and set a default value from dataDefault array and store in data variable
        $data = array_merge($DefaultData, $data);

        // All options available in the template
        $allOptions = [
            'myLayout' => ['vertical', 'horizontal', 'blank'],
            'menuCollapsed' => [true, false],
            'hasCustomizer' => [true, false],
            'showDropdownOnHover' => [true, false],
            'displayCustomizer' => [true, false],
            'myStyle' => ['light', 'dark'],
            'myTheme' => ['theme-default', 'theme-bordered', 'theme-semi-dark'],
            'myRTLSupport' => [true, false],
            'myRTLMode' => [true, false],
            'menuFixed' => [true, false],
            'navbarFixed' => [true, false],
            'footerFixed' => [true, false],
            'menuFlipped' => [true, false],
            // 'menuOffcanvas' => [true, false],
            'customizerControls' => [],
            // 'defaultLanguage'=>array('en'=>'en','fr'=>'fr','de'=>'de','pt'=>'pt'),
        ];

        //if myLayout value empty or not match with default options in custom.php config file then set a default value
        foreach ($allOptions as $key => $value) {
            if (array_key_exists($key, $DefaultData)) {
                if (gettype($DefaultData[$key]) === gettype($data[$key])) {
                    // data key should be string
                    if (is_string($data[$key])) {
                        // data key should not be empty
                        if (isset($data[$key]) && $data[$key] !== null) {
                            // data key should not be exist inside allOptions array's sub array
                            if (!array_key_exists($data[$key], $value)) {
                                // ensure that passed value should be match with any of allOptions array value
                                $result = array_search($data[$key], $value, 'strict');
                                if (empty($result) && $result !== 0) {
                                    $data[$key] = $DefaultData[$key];
                                }
                            }
                        } else {
                            // if data key not set or
                            $data[$key] = $DefaultData[$key];
                        }
                    }
                } else {
                    $data[$key] = $DefaultData[$key];
                }
            }
        }
        //layout classes
        $layoutClasses = [
            'layout' => $data['myLayout'],
            'theme' => $data['myTheme'],
            'style' => $data['myStyle'],
            'rtlSupport' => $data['myRTLSupport'],
            'rtlMode' => $data['myRTLMode'],
            'textDirection' => $data['myRTLMode'],
            'menuCollapsed' => $data['menuCollapsed'],
            'hasCustomizer' => $data['hasCustomizer'],
            'showDropdownOnHover' => $data['showDropdownOnHover'],
            'displayCustomizer' => $data['displayCustomizer'],
            'menuFixed' => $data['menuFixed'],
            'navbarFixed' => $data['navbarFixed'],
            'footerFixed' => $data['footerFixed'],
            'menuFlipped' => $data['menuFlipped'],
            // 'menuOffcanvas' => $data['menuOffcanvas'],
            'customizerControls' => $data['customizerControls'],
        ];

        // sidebar Collapsed
        if ($layoutClasses['menuCollapsed'] == true) {
            $layoutClasses['menuCollapsed'] = 'layout-menu-collapsed';
        }

        // Menu Fixed
        if ($layoutClasses['menuFixed'] == true) {
            $layoutClasses['menuFixed'] = 'layout-menu-fixed';
        }

        // Navbar Fixed
        if ($layoutClasses['navbarFixed'] == true) {
            $layoutClasses['navbarFixed'] = 'layout-navbar-fixed';
        }

        // Footer Fixed
        if ($layoutClasses['footerFixed'] == true) {
            $layoutClasses['footerFixed'] = 'layout-footer-fixed';
        }

        // Menu Flipped
        if ($layoutClasses['menuFlipped'] == true) {
            $layoutClasses['menuFlipped'] = 'layout-menu-flipped';
        }

        // Menu Offcanvas
        // if ($layoutClasses['menuOffcanvas'] == true) {
        //   $layoutClasses['menuOffcanvas'] = 'layout-menu-offcanvas';
        // }

        // RTL Supported template
        if ($layoutClasses['rtlSupport'] == true) {
            $layoutClasses['rtlSupport'] = '/rtl';
        }

        // RTL Layout/Mode
        if ($layoutClasses['rtlMode'] == true) {
            $layoutClasses['rtlMode'] = 'rtl';
            $layoutClasses['textDirection'] = 'rtl';
        } else {
            $layoutClasses['rtlMode'] = 'ltr';
            $layoutClasses['textDirection'] = 'ltr';
        }

        // Show DropdownOnHover for Horizontal Menu
        if ($layoutClasses['showDropdownOnHover'] == true) {
            $layoutClasses['showDropdownOnHover'] = 'true';
        } else {
            $layoutClasses['showDropdownOnHover'] = 'false';
        }

        // To hide/show display customizer UI, not js
        if ($layoutClasses['displayCustomizer'] == true) {
            $layoutClasses['displayCustomizer'] = 'true';
        } else {
            $layoutClasses['displayCustomizer'] = 'false';
        }

        return $layoutClasses;
    }

    public static function updatePageConfig($pageConfigs)
    {
        $demo = 'custom';
        if (isset($pageConfigs)) {
            if (count($pageConfigs) > 0) {
                foreach ($pageConfigs as $config => $val) {
                    Config::set('custom.' . $demo . '.' . $config, $val);
                }
            }
        }
    }

    public static function translate($txt, $language_id)
    {

        $text = Text::where('text', $txt)->first();
        if (!$text) {
            Text::create([
                'text' => $txt
            ]);
            return $txt;
        }
        $translation = Translation::where('text_id', $text->id)->where('language_id', $language_id)->first();
        return $translation->translation;
    }

    public static function fileUpload($uploadedFile, $folder = null)
    {

        // Generate a unique name for the file, or use the original file name
        $uniqueName = $uploadedFile->getClientOriginalName();

        // Get the folder name from the request or use 'files' as the default folder
        $folder = $folder ?? 'files';

        // Store the file in the 'public' disk (configured in config/filesystems.php)
        $filePath = $uploadedFile->storeAs("/{$folder}", $uniqueName, "public");

        return $filePath;
    }

    public static function fileCDNUpload($uploadedFile, $folder = 'files')
    {
        $bunny = new BunnyCDNService();
        $folder = trim($folder, '/');

        // -------------------------------
        // STEP 1: Move original uploaded file to temp
        // -------------------------------
        $ext = strtolower($uploadedFile->getClientOriginalExtension());
        $tempLocalPath = storage_path('app/uploads/' . uniqid() . '.' . $ext);

        // Move original file into our temp path
        $uploadedFile->move(dirname($tempLocalPath), basename($tempLocalPath));

        // -------------------------------
        // STEP 2: Conversion
        // -------------------------------
        $finalLocalFile = $tempLocalPath; // default

        if ($ext === 'mp3') {

            $convertedPath = str_replace('.mp3', '.m4a', $tempLocalPath);
            if (static::convertToM4A($tempLocalPath, $convertedPath)) {
                unlink($tempLocalPath);
                $finalLocalFile = $convertedPath;
            }

        } elseif ($ext === 'mp4') {

            $convertedPath = str_replace('.mp4', '_h265.mp4', $tempLocalPath);
            if (static::convertToH265($tempLocalPath, $convertedPath)) {
                unlink($tempLocalPath);
                $finalLocalFile = $convertedPath;
            }

        }

        // -------------------------------
        // STEP 3: Generate Filename
        // -------------------------------
        $uniqueName = $uploadedFile->getClientOriginalName();

        // -------------------------------
        // STEP 4: Upload to Bunny CDN
        // -------------------------------
        $content = file_get_contents($finalLocalFile);
        $mime    = mime_content_type($finalLocalFile);

        $cdnPath = $bunny->upload(
            $folder,
            $uniqueName,
            $content,
            $mime
        );

        // -------------------------------
        // STEP 5: Cleanup
        // -------------------------------
        if (file_exists($finalLocalFile)) {
            unlink($finalLocalFile);
        }

        $cleanedcdnPath = Str::after($cdnPath, env('BUNNY_CDN_URL'));
        return $cleanedcdnPath;
    }

    public static function fileCDNUpload2($uploadedFile, $folder = 'files')
    {
        $bunny = new BunnyCDNService();
        $folder = trim($folder, '/');

        // -------------------------------
        // STEP 1: Move original uploaded file to temp
        // -------------------------------
        $ext = strtolower($uploadedFile->extension());

        $tempLocalPath = storage_path('app/uploads/' . uniqid() . '.' . $ext);

        // Move original file into our temp path
        $uploadedFile->move(dirname($tempLocalPath), basename($tempLocalPath));

        // -------------------------------
        // STEP 2: Conversion
        // -------------------------------
        $finalLocalFile = $tempLocalPath; // default

        if ($ext === 'mp3') {

            $convertedPath = str_replace('.mp3', '.m4a', $tempLocalPath);
            if (static::convertToM4A($tempLocalPath, $convertedPath)) {
                unlink($tempLocalPath);
                $finalLocalFile = $convertedPath;
            }

        } elseif ($ext === 'mp4') {

            $convertedPath = str_replace('.mp4', '_h265.mp4', $tempLocalPath);
            if (static::convertToH265($tempLocalPath, $convertedPath)) {
                unlink($tempLocalPath);
                $finalLocalFile = $convertedPath;
            }

        }

        // -------------------------------
        // STEP 3: Generate Filename
        // -------------------------------
        $uniqueName = basename($uploadedFile);

        // -------------------------------
        // STEP 4: Upload to Bunny CDN
        // -------------------------------
        $content = file_get_contents($finalLocalFile);
        $mime    = mime_content_type($finalLocalFile);

        $cdnPath = $bunny->upload(
            $folder,
            $uniqueName,
            $content,
            $mime
        );

        // -------------------------------
        // STEP 5: Cleanup
        // -------------------------------
        if (file_exists($finalLocalFile)) {
            unlink($finalLocalFile);
        }

        $cleanedcdnPath = Str::after($cdnPath, env('BUNNY_CDN_URL'));
        return $cleanedcdnPath;
    }

    public static function formatDuration($durationInSeconds)
    {
        // Convert the duration to an integer to handle whole seconds
        $seconds = (int) round($durationInSeconds);

        // Calculate minutes and remaining seconds
        $minutes = floor($seconds / 60);
        $remainingSeconds = $seconds % 60;

        // Format the result as mm:ss
        return sprintf("%02d:%02d", $minutes, $remainingSeconds);
    }

    // Example implementation of array_in (if not already defined):
    public static function array_in($needle, $haystack)
    {
        return is_array($haystack) && in_array($needle, $haystack);
    }

    public static function showEmojibyName($name = null)
    {
        try {
            $emoji = Emoji::where('name', $name)->first();
            return asset('storage/' . $emoji->image);
        } catch (Exception $e) {
            return null;
        }
    }

    public static function convertToM4A($inputPath, $outputPath)
    {
        $cmd = "ffmpeg -i \"$inputPath\" -vn -c:a aac -b:a 64k -movflags +faststart \"$outputPath\" -y";
        exec($cmd, $output, $returnCode);
        return $returnCode === 0;
    }

    // Convert MP4 (H.264) → MP4 (H.265 HEVC)
    public static function convertToH265($inputPath, $outputPath)
    {
        // $cmd = "ffmpeg -i {$inputPath} -c:v libx265 -crf 28 -preset fast -c:a aac {$outputPath} -y";
        // $cmd = "ffmpeg -i {$inputPath} -vcodec libx264 -crf 28 -preset fast -acodec aac {$outputPath}";
        $cmd = "ffmpeg -y -i {$inputPath} \
                -map 0:v:0 -map 0:a? \
                -c:v libx264 \
                -profile:v baseline \
                -level 3.1 \
                -pix_fmt yuv420p \
                -x264-params keyint=48:min-keyint=48:scenecut=0 \
                -crf 23 \
                -preset medium \
                -c:a aac -b:a 128k \
                -movflags +faststart \
                {$outputPath}";
        exec($cmd, $output, $returnCode);
        return $returnCode === 0;
    }
}
