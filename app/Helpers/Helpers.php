<?php

namespace App\Helpers;

use App\Models\LanguageDetail;
use Config;
use App\Models\Text;
use App\Models\Translation;
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
        $uniqueName = uniqid() . '___' . str_replace(' ', '_', $uploadedFile->getClientOriginalName());

        // Get the folder name from the request or use 'files' as the default folder
        $folder = $folder ?? 'files';

        // Store the file in the 'public' disk (configured in config/filesystems.php)
        $filePath = $uploadedFile->storeAs("/{$folder}", $uniqueName, "public");

        return $filePath;
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

    public static function languages_keywords($language_id)
    {
        $homekeywords = [
            ['keyword' => 'languages', 'translated' => ''],
            ['keyword' => 'privacyAndTerms', 'translated' => ''],
            ['keyword' => 'signIn', 'translated' => ''],
            ['keyword' => 'typeYourEmail', 'translated' => ''],
            ['keyword' => 'typeYourPasswordHere', 'translated' => ''],
            ['keyword' => 'rememberMe', 'translated' => ''],
            ['keyword' => 'lostDevice', 'translated' => ''],
            ['keyword' => 'addNewDevice', 'translated' => ''],
            ['keyword' => 'password', 'translated' => ''],
            ['keyword' => 'forgotPassword', 'translated' => ''],
            ['keyword' => 'loginError', 'translated' => ''],
            ['keyword' => 'theEmailAddressYouProvidedDoesNotCorrespondWithTheDeviceIdAssociatedWithTheAccount', 'translated' => ''],
            ['keyword' => 'newDevice', 'translated' => ''],
            ['keyword' => 'setupANewDevice', 'translated' => ''],
            ['keyword' => 'emailVerification', 'translated' => ''],
            ['keyword' => 'send', 'translated' => ''],
            ['keyword' => 'weWillSendAMailToTheEmailAddressWithACodeCheckSpamFolder', 'translated' => ''],
            ['keyword' => 'emailSentTo', 'translated' => ''],
            ['keyword' => 'codeVerification', 'translated' => ''],
            ['keyword' => 'anAuthenticationCodeHasBeenSentTo', 'translated' => ''],
            ['keyword' => 'iDidntReceiveCode', 'translated' => ''],
            ['keyword' => 'resendCode', 'translated' => ''],
            ['keyword' => 'secLeft', 'translated' => ''],
            ['keyword' => 'verifyNow', 'translated' => ''],
            ['keyword' => 'changeDevice', 'translated' => ''],
            ['keyword' => 'start', 'translated' => ''],
            ['keyword' => 'connecting', 'translated' => ''],
            ['keyword' => 'summary', 'translated' => ''],
            ['keyword' => 'status', 'translated' => ''],
            ['keyword' => 'startNow', 'translated' => ''],
            ['keyword' => 'yourNewDevice', 'translated' => ''],
            ['keyword' => 'yourOldDevice', 'translated' => ''],
            ['keyword' => 'deviceId', 'translated' => ''],
            ['keyword' => 'deviceRegistration', 'translated' => ''],
            ['keyword' => 'disconnectOldDevice', 'translated' => ''],
            ['keyword' => 'takeMeToSignIn', 'translated' => ''],
            ['keyword' => 'close', 'translated' => ''],
            ['keyword' => 'selectGender', 'translated' => ''],
            ['keyword' => 'imFemale', 'translated' => ""],
            ['keyword' => 'imMale', 'translated' => ""],
            ['keyword' => 'back', 'translated' => ''],
            ['keyword' => 'next', 'translated' => ''],
            ['keyword' => 'error', 'translated' => ''],
            ['keyword' => 'failedToGetCurrentLocationPleaseMakeSureLocationServicesAreEnabled', 'translated' => ''],
            ['keyword' => 'pleaseEnterAnAddressBeforeProceeding', 'translated' => ''],
            ['keyword' => 'selectCountry', 'translated' => ''],
            ['keyword' => 'currentLocation', 'translated' => ''],
            ['keyword' => 'yourLocation', 'translated' => ''],
            ['keyword' => 'yourCurrentLocation', 'translated' => ''],
            ['keyword' => 'cameraNotAvailable', 'translated' => ''],
            ['keyword' => 'aboutYou', 'translated' => ''],
            ['keyword' => 'yourFirstname', 'translated' => ''],
            ['keyword' => 'yourLastname', 'translated' => ''],
            ['keyword' => 'yourUsername', 'translated' => ''],
            ['keyword' => 'anErrorOccurredWhileSubmittingTheFormPleaseTryAgainLater', 'translated' => ''],
            ['keyword' => 'anUnknownErrorOccurred', 'translated' => ''],
            ['keyword' => 'step', 'translated' => ''],
            ['keyword' => 'yourStatus', 'translated' => ''],
            ['keyword' => 'single', 'translated' => ''],
            ['keyword' => 'engaged', 'translated' => ''],
            ['keyword' => 'married', 'translated' => ''],
            ['keyword' => 'yourBirthday', 'translated' => ''],
            ['keyword' => 'information', 'translated' => ''],
            ['keyword' => 'uMustBeAtLeast16YearOld', 'translated' => ''],
            ['keyword' => 'confirm', 'translated' => ''],
            ['keyword' => 'yourOrigin', 'translated' => ''],
            ['keyword' => 'pleaseSelect', 'translated' => ''],
            ['keyword' => 'imKurdish', 'translated' => ""],
            ['keyword' => 'imNotKurdish', 'translated' => ""],
            ['keyword' => 'selectYourProvince', 'translated' => ''],
            ['keyword' => 'selectYourCity', 'translated' => ''],
            ['keyword' => 'kurdistan', 'translated' => ''],
            ['keyword' => 'yourEmailAddress', 'translated' => ''],
            ['keyword' => 'emailAddress', 'translated' => ''],
            ['keyword' => 'enterYourEmail', 'translated' => ''],
            ['keyword' => 'repeatYourEmail', 'translated' => ''],
            ['keyword' => 'confirmYourEmail', 'translated' => ''],
            ['keyword' => 'thisEmailAlreadyExists', 'translated' => ''],
            ['keyword' => 'loginNow', 'translated' => ''],
            ['keyword' => 'emailDoesntMatch', 'translated' => ''],
            ['keyword' => 'yourPhoneNumber', 'translated' => ''],
            ['keyword' => 'typeYourNumber', 'translated' => ''],
            ['keyword' => 'createAPassword', 'translated' => ''],
            ['keyword' => 'enterAPassword', 'translated' => ''],
            ['keyword' => 'repeatAPassword', 'translated' => ''],
            ['keyword' => 'rewriteYourPassword', 'translated' => ''],
            ['keyword' => 'hasAtLeast810Characters', 'translated' => ''],
            ['keyword' => 'hasAnUppercaseLetterOrSymbol', 'translated' => ''],
            ['keyword' => 'hasANumbers', 'translated' => ''],
            ['keyword' => 'hasPasswordMatched', 'translated' => ''],
            ['keyword' => 'acceptPolicyAndTerms', 'translated' => ''],
            ['keyword' => 'tüBexirHatiUserName', 'translated' => ''],
            ['keyword' => 'fromLocation', 'translated' => ''],
            ['keyword' => 'kurdistanRojava10111Qamishlo', 'translated' => ''],
            ['keyword' => 'completeYourAccount', 'translated' => ''],
            ['keyword' => 'accountConfirmation', 'translated' => ''],
            ['keyword' => 'anEmailHasBeenSentToYouFollowDirectionInTheEmailToConfirmYourAccount', 'translated' => ''],
            ['keyword' => 'pleaseEnterTheOtpCodeYouReceivedThroughEmail', 'translated' => ''],
            ['keyword' => 'accountConfirmedSuccessfully', 'translated' => ''],
            ['keyword' => 'unexpectedResponseFromTheServerPleaseTryAgainLater', 'translated' => ''],
            ['keyword' => 'anErrorOccurredWhileProcessingYourRequest', 'translated' => ''],
            ['keyword' => 'noResponseFromServerPleaseCheckYourInternetConnection', 'translated' => ''],
            ['keyword' => 'anUnexpectedErrorOccurredPleaseTryAgainLater', 'translated' => ''],
            ['keyword' => 'confirmYourAccount', 'translated' => ''],
            ['keyword' => 'weWillSendAMailToTheEmailAddressYouRegisteredToActivateYourAccount', 'translated' => ''],
            ['keyword' => 'didntReceiveCode', 'translated' => ""],
            ['keyword' => 'resentNow', 'translated' => ''],
            ['keyword' => 'accountCreated', 'translated' => ''],
            ['keyword' => 'yourAccountHadBeedCreatedSuccessfully', 'translated' => ''],
            ['keyword' => 'pleaseSignInToUseYourAccountAndEnjoy', 'translated' => ''],
            ['keyword' => 'search', 'translated' => ''],
            ['keyword' => 'enterYourFirstname', 'translated' => ''],
            ['keyword' => 'enterYourLastname', 'translated' => ''],
            ['keyword' => 'enterYourUsername', 'translated' => ''],
            ['keyword' => 'acceptPolicyAnd', 'translated' => ''],
            ['keyword' => 'terms', 'translated' => ''],
            ['keyword' => 'pleaseEnterAValidEmail', 'translated' => ''],
            ['keyword' => 'failedToResetDevicePleaseTryAgain', 'translated' => ''],
            ['keyword' => 'weWillSendAMailToTheEmailAddressYouRegisteredToRegainYourPassword', 'translated' => ''],
            ['keyword' => 'passwordResetEmailSent', 'translated' => ''],
            ['keyword' => 'anEmailHasBeenSentToYouFollowDirectionsInTheEmailToResetYourPassword', 'translated' => ''],
            ['keyword' => 'invalidCode', 'translated' => ''],
            ['keyword' => 'pleaseEnterThe4DigitOtpCode', 'translated' => ''],
            ['keyword' => 'success', 'translated' => ''],
            ['keyword' => 'otpVerifiedSuccessfully', 'translated' => ''],
            ['keyword' => 'otpVerificationFailed', 'translated' => ''],
            ['keyword' => 'failedToVerifyOtpPleaseTryAgain', 'translated' => ''],
            ['keyword' => 'resendDisabled', 'translated' => ''],
            ['keyword' => 'pleaseWaitUntilTheTimerEndsToResendTheCode', 'translated' => ''],
            ['keyword' => 'verification', 'translated' => ''],
            ['keyword' => 'passwordHasBeenSuccessfullyReset', 'translated' => ''],
            ['keyword' => 'passwordResetFailed', 'translated' => ''],
            ['keyword' => 'noResponseFromTheServerPleaseTryAgain', 'translated' => ''],
            ['keyword' => 'somethingWentWrongPleaseTryAgainLater', 'translated' => ''],
            ['keyword' => 'createPassword', 'translated' => ''],
            ['keyword' => 'chooseASecurePasswordThatWillBeEasyForYouToRemember', 'translated' => ''],
            ['keyword' => 'confirmYourPasswordHere', 'translated' => ''],
        ];

        foreach ($homekeywords as $keyword) {
            LanguageDetail::create([
                'language_id' => $language_id,
                'section_name' => 'Home Section',
                'keyword' => $keyword['keyword'],
                'translated' => $keyword['translated'],
            ]);
        }
        return 'success';
    }
}
