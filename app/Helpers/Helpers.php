<?php

namespace App\Helpers;

use App\Models\LanguageDetail;
use Config;
use App\Models\Text;
use App\Models\Translation;
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

    public static function languages_keywords($language_id, $code = null)
    {
        $homekeywords = [
            ['keyword' => 'languages', 'translated' => 'Languages', 'section_name' => 'Home Page Languages'],
            ['keyword' => 'privacyAndTerms', 'translated' => 'Privacy & Terms', 'section_name' => 'Home Page App Policy'],
            ['keyword' => 'signIn', 'translated' => 'Sign In', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'typeYourEmail', 'translated' => 'Type your E-Mail', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'typeYourPasswordHere', 'translated' => 'Type Your password Here', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'rememberMe', 'translated' => 'Remember Me', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'lostDevice', 'translated' => 'Lost Device', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'addNewDevice', 'translated' => 'Add New Device', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'password', 'translated' => 'Password', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'forgotPassword', 'translated' => 'Forgot Password', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'loginError', 'translated' => 'Login Error', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'theEmailAddressYouProvidedDoesNotCorrespondWithTheDeviceIdAssociatedWithTheAccount', 'translated' => 'The email address you provided does not correspond with the device ID associated with the account', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'newDevice', 'translated' => 'New Device', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'setupANewDevice', 'translated' => 'Setup a new device', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'emailVerification', 'translated' => 'Email Verification', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'send', 'translated' => 'Send', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'weWillSendAMailToTheEmailAddressWithACodeCheckSpamFolder', 'translated' => 'We will send a mail to the email address with a Code “Check Spam Folder”', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'emailSentTo', 'translated' => 'E-Mail sent to', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'codeVerification', 'translated' => 'Code Verification', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'anAuthenticationCodeHasBeenSentTo', 'translated' => 'An authentication code has been sent to', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'iDidntReceiveCode', 'translated' => "I didn't receive code?", 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'resendCode', 'translated' => 'Resend Code', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'secLeft', 'translated' => 'Sec left', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'verifyNow', 'translated' => 'Verify Now', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'changeDevice', 'translated' => 'Change Device', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'start', 'translated' => 'Start', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'connecting', 'translated' => 'Connecting', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'summary', 'translated' => 'Summary', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'status', 'translated' => 'Status', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'startNow', 'translated' => 'Start Now', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'yourNewDevice', 'translated' => 'Your new Device', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'yourOldDevice', 'translated' => 'Your Old Device', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'deviceId', 'translated' => 'Device ID', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'deviceRegistration', 'translated' => 'Device Registration', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'disconnectOldDevice', 'translated' => 'Disconnect old Device', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'takeMeToSignIn', 'translated' => 'Take me to Sign in', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'close', 'translated' => 'Close', 'section_name' => 'Home Page Sign In'],
            ['keyword' => 'selectGender', 'translated' => 'Select Gender', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'imFemale', 'translated' => "I'm Female", 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'imMale', 'translated' => "I'm Male", 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'back', 'translated' => 'Back', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'next', 'translated' => 'Next', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'error', 'translated' => 'Error', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'failedToGetCurrentLocationPleaseMakeSureLocationServicesAreEnabled', 'translated' => 'Failed to get current location. Please make sure location services are enabled.', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'pleaseEnterAnAddressBeforeProceeding', 'translated' => 'Please enter an address before proceeding.', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'selectCountry', 'translated' => 'Select Country', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'currentLocation', 'translated' => 'Current location', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'yourLocation', 'translated' => 'Your Location', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'yourCurrentLocation', 'translated' => 'Your current location', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'cameraNotAvailable', 'translated' => 'Camera not available', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'aboutYou', 'translated' => 'About You', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'yourFirstname', 'translated' => 'Your Firstname', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'yourLastname', 'translated' => 'Your Lastname', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'yourUsername', 'translated' => 'Your Username', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'anErrorOccurredWhileSubmittingTheFormPleaseTryAgainLater', 'translated' => 'An error occurred while submitting the form. Please try again later.', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'anUnknownErrorOccurred', 'translated' => 'An unknown error occurred', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'step', 'translated' => 'Step', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'yourStatus', 'translated' => 'Your Status', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'single', 'translated' => 'Single', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'engaged', 'translated' => 'Engaged', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'married', 'translated' => 'Married', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'yourBirthday', 'translated' => 'Your Birthday', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'information', 'translated' => 'Information', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'uMustBeAtLeast16YearOld', 'translated' => 'You must be at least 16 years old', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'confirm', 'translated' => 'Confirm', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'yourOrigin', 'translated' => 'Your Origin', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'pleaseSelect', 'translated' => 'Please Select', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'imKurdish', 'translated' => "I'm Kurdish", 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'imNotKurdish', 'translated' => "I'm not Kurdish", 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'selectYourProvince', 'translated' => 'Select your Province', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'selectYourCity', 'translated' => 'Select your City', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'kurdistan', 'translated' => 'Kurdistan', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'yourEmailAddress', 'translated' => 'Your E-Mail Address', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'emailAddress', 'translated' => 'E-Mail Address', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'enterYourEmail', 'translated' => 'Enter Your E-Mail', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'repeatYourEmail', 'translated' => 'Repeat your E-Mail', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'confirmYourEmail', 'translated' => 'Confirm Your E-Mail', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'thisEmailAlreadyExists', 'translated' => 'This E-Mail already exists', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'loginNow', 'translated' => 'Login now', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'emailDoesntMatch', 'translated' => "E-Mail doesn't match", 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'yourPhoneNumber', 'translated' => 'Your Phone Number', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'typeYourNumber', 'translated' => 'Type your number', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'createAPassword', 'translated' => 'Create a Password', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'enterAPassword', 'translated' => 'Enter a Password', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'repeatAPassword', 'translated' => 'Repeat a Password', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'rewriteYourPassword', 'translated' => 'Rewrite your password', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'hasAtLeast810Characters', 'translated' => 'Has at least 8-10 Characters', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'hasAnUppercaseLetterOrSymbol', 'translated' => 'Has an uppercase letter or symbol', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'hasANumbers', 'translated' => 'Has a number', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'hasPasswordMatched', 'translated' => 'Has password matched', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'acceptPolicyAndTerms', 'translated' => 'Accept policy and terms', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'tüBexirHatiUserName', 'translated' => 'Tü Bexir Hati User Name', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'fromLocation', 'translated' => 'From location', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'kurdistanRojava10111Qamishlo', 'translated' => 'Kurdistan - Rojava - 10111 Qamishlo', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'completeYourAccount', 'translated' => 'Complete your Account', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'accountConfirmation', 'translated' => 'Account Confirmation', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'anEmailHasBeenSentToYouFollowDirectionInTheEmailToConfirmYourAccount', 'translated' => 'An e-mail has been sent to you. Follow the directions in the e-mail to confirm your Account', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'pleaseEnterTheOtpCodeYouReceivedThroughEmail', 'translated' => 'Please enter the OTP code you received through email.', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'accountConfirmedSuccessfully', 'translated' => 'Account confirmed successfully!', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'unexpectedResponseFromTheServerPleaseTryAgainLater', 'translated' => 'Unexpected response from the server. Please try again later.', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'anErrorOccurredWhileProcessingYourRequest', 'translated' => 'An error occurred while processing your request.', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'noResponseFromServerPleaseCheckYourInternetConnection', 'translated' => 'No response from the server. Please check your internet connection.', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'anUnexpectedErrorOccurredPleaseTryAgainLater', 'translated' => 'An unexpected error occurred. Please try again later.', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'confirmYourAccount', 'translated' => 'Confirm your Account', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'weWillSendAMailToTheEmailAddressYouRegisteredToActivateYourAccount', 'translated' => 'We will send a mail to the e-mail address you registered to activate your Account', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'didntReceiveCode', 'translated' => "Didn't receive code?", 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'resentNow', 'translated' => 'Resent Now', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'accountCreated', 'translated' => 'Account Created!', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'yourAccountHadBeedCreatedSuccessfully', 'translated' => 'Your account had been created successfully.', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'pleaseSignInToUseYourAccountAndEnjoy', 'translated' => 'Please sign in to use your account and enjoy', 'section_name' => 'Home Page Sign Up'],
            ['keyword' => 'search', 'translated' => 'Search', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'enterYourFirstname', 'translated' => 'Enter Your Firstname', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'enterYourLastname', 'translated' => 'Enter Your Lastname', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'enterYourUsername', 'translated' => 'Enter Your Username', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'acceptPolicyAnd', 'translated' => 'Accept policy and', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'terms', 'translated' => 'terms', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'pleaseEnterAValidEmail', 'translated' => 'Please enter a valid email.', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'failedToResetDevicePleaseTryAgain', 'translated' => 'Failed to reset device. Please try again.', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'weWillSendAMailToTheEmailAddressYouRegisteredToRegainYourPassword', 'translated' => 'We will send a mail to the email address you registered to regain your password.', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'passwordResetEmailSent', 'translated' => 'Password Reset Email Sent', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'anEmailHasBeenSentToYouFollowDirectionsInTheEmailToResetYourPassword', 'translated' => 'An email has been sent to you. Follow directions in the email to reset your password.', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'invalidCode', 'translated' => 'Invalid Code', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'pleaseEnterThe4DigitOtpCode', 'translated' => 'Please enter the 4-digit OTP code', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'success', 'translated' => 'Success', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'otpVerifiedSuccessfully', 'translated' => 'OTP verified successfully!', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'otpVerificationFailed', 'translated' => 'OTP verification failed', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'failedToVerifyOtpPleaseTryAgain', 'translated' => 'Failed to verify OTP. Please try again.', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'resendDisabled', 'translated' => 'Resend Disabled', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'pleaseWaitUntilTheTimerEndsToResendTheCode', 'translated' => 'Please wait until the timer ends to resend the code.', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'verification', 'translated' => 'Verification', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'passwordHasBeenSuccessfullyReset', 'translated' => 'Password has been successfully reset.', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'passwordResetFailed', 'translated' => 'Password reset failed', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'noResponseFromTheServerPleaseTryAgain', 'translated' => 'No response from the server. Please try again.', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'somethingWentWrongPleaseTryAgainLater', 'translated' => 'Something went wrong. Please try again later.', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'createPassword', 'translated' => 'Create Password', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'chooseASecurePasswordThatWillBeEasyForYouToRemember', 'translated' => 'Choose a secure password that will be easy for you to remember.', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'confirmYourPasswordHere', 'translated' => 'Confirm your password here', 'section_name' => 'Home Page Landing Page'],
        ];

        $kurdishkeywords = [
            ['translated' => 'Ziman'],
            ['translated' => 'Nepênî û Merc'],
            ['translated' => 'Têkevin'],
            ['translated' => 'E-nameya xwe binivîse'],
            ['translated' => 'Şîfreya xwe li vir binivîse'],
            ['translated' => 'Min Bîne Bîra Xwe'],
            ['translated' => 'Amûra Wenda'],
            ['translated' => 'Amûrek Nû Zêde Bike'],
            ['translated' => 'Şîfre'],
            ['translated' => 'Şîfre Ji Bîr Kir'],
            ['translated' => 'Çewtiya Têketinê'],
            ['translated' => 'Navnîşana e-nameya ku we peyda kiriye bi nasnameya cîhaza ku bi hesabê ve girêdayî ye re têkildar nabe'],
            ['translated' => 'Amûra Nû'],
            ['translated' => 'Amûrek nû saz bike'],
            ['translated' => 'Verastkirina E-nameyê'],
            ['translated' => 'Bişîne'],
            ['translated' => 'Em ê e-nameyek bi kodek ji navnîşana e-nameyê re bişînin "Pelê Spam Kontrol Bikin"'],
            ['translated' => 'E-name ji bo şandin'],
            ['translated' => 'Verastkirina Kodê'],
            ['translated' => 'Kodek rastnivîsandinê ji bo hate şandin'],
            ['translated' => 'Min kod nestand?'],
            ['translated' => 'Kodê Ji Nû Ve Bişîne'],
            ['translated' => 'Çirk çûn'],
            ['translated' => 'Niha Verast Bike'],
            ['translated' => 'Amûrê Biguherîne'],
            ['translated' => 'Destpêk'],
            ['translated' => 'Girêdan'],
            ['translated' => 'Kurte'],
            ['translated' => 'Rewş'],
            ['translated' => 'Niha Dest Pê Bike'],
            ['translated' => 'Amûra weya nû'],
            ['translated' => 'Amûra weya kevn'],
            ['translated' => 'Nasnameya Amûrê'],
            ['translated' => 'Qeydkirina Amûrê'],
            ['translated' => 'Amûra kevn qut bike'],
            ['translated' => 'Min Bibe Têketinê'],
            ['translated' => 'Bigire'],
            ['translated' => 'Zayend Hilbijêre'],
            ['translated' => 'Ez Jinim'],
            ['translated' => 'Ez Nêrim'],
            ['translated' => 'Paş'],
            ['translated' => 'Piştî'],
            ['translated' => 'Çewtî'],
            ['translated' => 'Bi destxistina cîhê heyî biser neket. Ji kerema xwe pê ewle bine ku karûbarên cîhê çalak in.'],
            ['translated' => 'Ji kerema xwe berî ku hûn bidomînin navnîşek binivîsin.'],
            ['translated' => 'Welat Hilbijêre'],
            ['translated' => 'Cihê niha'],
            ['translated' => 'Cihê we'],
            ['translated' => 'Cihê weya niha'],
            ['translated' => 'Kamera ne berdest e'],
            ['translated' => 'Derbarê We'],
            ['translated' => 'Navê We'],
            ['translated' => 'Paşnavê We'],
            ['translated' => 'Navê Bikarhênerê We'],
            ['translated' => 'Di dema şandina formê de çewtiyek çêbû. Ji kerema xwe paşê dîsa biceribînin.'],
            ['translated' => 'Çewtiyek nenas çêbû'],
            ['translated' => 'Gav'],
            ['translated' => 'Rewşa We'],
            ['translated' => 'Yekane'],
            ['translated' => 'Nişanî'],
            ['translated' => 'Zewicî'],
            ['translated' => 'Rojbûna We'],
            ['translated' => 'Agahî'],
            ['translated' => 'Divê hûn herî kêm 16 salî bin'],
            ['translated' => 'Erêkirin'],
            ['translated' => 'Esilê We'],
            ['translated' => 'Ji Kerema Xwe Hilbijêrin'],
            ['translated' => 'Ez Kurdim'],
            ['translated' => 'Ez Ne Kurdim'],
            ['translated' => 'Parêzgeha Xwe Hilbijêrin'],
            ['translated' => 'Bajarê Xwe Hilbijêrin'],
            ['translated' => 'Kurdistan'],
            ['translated' => 'Navnîşana E-nameya We'],
            ['translated' => 'Navnîşana E-nameyê'],
            ['translated' => 'E-nameya Xwe Binivîse'],
            ['translated' => 'E-nameya Xwe Dubare Bike'],
            ['translated' => 'E-nameya Xwe Erê Bike'],
            ['translated' => 'Ev E-name jixwe heye'],
            ['translated' => 'Niha Têkeve'],
            ['translated' => 'E-name li hev nake'],
            ['translated' => 'Hejmara Telefona We'],
            ['translated' => 'Hejmara xwe binivîse'],
            ['translated' => 'Şîfreyek Biafirîne'],
            ['translated' => 'Şîfreyek binivîse'],
            ['translated' => 'Şîfreyek dubare bike'],
            ['translated' => 'Şîfreya xwe ji nû ve binivîse'],
            ['translated' => 'Bi kêmanî 8-10 tîpan heye'],
            ['translated' => 'Tîpek mezin an sembolek heye'],
            ['translated' => 'Hejmarek heye'],
            ['translated' => 'Şîfre li hev kir'],
            ['translated' => 'Siyaseta û mercan qebûl bike'],
            ['translated' => 'Navê Bikarhêner Tü Bexir Hati'],
            ['translated' => 'Ji cîh'],
            ['translated' => 'Kurdistan - Rojava - 10111 Qamişlo'],
            ['translated' => 'Hesaba xwe temam bike'],
            ['translated' => 'Tesdîqkirina Hesabê'],
            ['translated' => 'E-nameyek ji we re hatiye şandin. Ji bo tesdîqkirina Hesabê xwe rêwerzên di e-nameyê de bişopînin'],
            ['translated' => 'Ji kerema xwe koda OTP-ê ya ku we bi e-nameyê wergirtiye binivîsin.'],
            ['translated' => 'Hesab bi serkeftî hate tesdîqkirin!'],
            ['translated' => 'Ji serverê bersivek nediyar hat. Ji kerema xwe paşê dîsa biceribînin.'],
            ['translated' => 'Di dema pêvajoykirina daxwaza we de çewtiyek çêbû.'],
            ['translated' => 'Ji serverê tu bersiv tune. Ji kerema xwe pêwendiya xweya înternetê kontrol bikin.'],
            ['translated' => 'Çewtiyek nediyar çêbû. Ji kerema xwe paşê dîsa biceribînin.'],
            ['translated' => 'Hesaba xwe tesdîq bike'],
            ['translated' => 'Em ê e-nameyek ji navnîşana e-nameya ku we qeyd kiriye bişînin da ku Hesaba we çalak bikin'],
            ['translated' => 'Kod negihaşt?'],
            ['translated' => 'Niha Ji Nû Ve Hate Şandin'],
            ['translated' => 'Hesab Hate Afirandin!'],
            ['translated' => 'Hesaba we bi serkeftî hate afirandin.'],
            ['translated' => 'Ji kerema xwe têkevin da ku hûn hesaba xwe bikar bînin û kêfê bikin'],
            ['translated' => 'Lêgerîn'],
            ['translated' => 'Navê xwe binivîse'],
            ['translated' => 'Paşnavê xwe binivîse'],
            ['translated' => 'Navê bikarhênerê xwe binivîse'],
            ['translated' => 'Rêzokê qebûl bike û'],
            ['translated' => 'Merc'],
            ['translated' => 'Ji kerema xwe e-nameya rast binivîse.'],
            ['translated' => 'Ji nû ve saz kirina amûrê têk çû. Ji kerema xwe dîsa biceribîne.'],
            ['translated' => 'Em e-nameyek bişînin ser navnîşana e-nameyê ku te qeydkirî ye da ku şîfreyê xwe vegerî.'],
            ['translated' => 'E-nameya şîfreya nû vehatî bişînin.'],
            ['translated' => 'E-nameyek hat şandin we. Beramber rêzekan li e-nameyê şîfreyê xwe nû bike.'],
            ['translated' => 'Koda nederbasdar'],
            ['translated' => 'Ji kerema xwe koda OTP ya 4 hejmarî binivîse'],
            ['translated' => 'Serkeftin'],
            ['translated' => 'OTP bi serketî hat pejirandin!'],
            ['translated' => 'Pejirandina OTP têk çû'],
            ['translated' => 'Pejirandina OTP têk çû. Ji kerema xwe dîsa biceribîne.'],
            ['translated' => 'Nûve şandin hat asteng kirin'],
            ['translated' => 'Ji kerema xwe hinga ku demjimêr qedîm dibe bisekine da ku koda nûve bişînî.'],
            ['translated' => 'Pejirandin'],
            ['translated' => 'Şîfre bi serketî nûvehat saz kirin.'],
            ['translated' => 'Nûve kirina şîfreyê têk çû'],
            ['translated' => 'Ji serverê bersiv tune. Ji kerema xwe dîsa biceribîne.'],
            ['translated' => 'Tiştek xelet çû. Ji kerema xwe paşê biceribîne.'],
            ['translated' => 'Şîfre çêbikin'],
            ['translated' => 'Şîfreyek ewle hilbijêre ku te bikar bi hêsanî bîbîne.'],
            ['translated' => 'Li vir şîfreyê xwe piştrast bike'],
        ];

        // Validate that the arrays match in length
        if (count($homekeywords) !== count($kurdishkeywords)) {
            throw new Exception('Keyword arrays do not match in length.');
        }

        try {
            foreach ($homekeywords as $key => $keyword) {
                $translated = $code === 'ku' ? $kurdishkeywords[$key]['translated'] : ($code == 'en' ? $keyword['translated'] : '');

                LanguageDetail::create([
                    'language_id' => $language_id,
                    'section_name' => $keyword['section_name'],
                    'keyword' => $keyword['keyword'],
                    'translated' => $translated ?? '',
                ]);
            }
            return 'success';
        } catch (\Exception $e) {
            // Log or handle errors if necessary
            return 'Error: ' . $e->getMessage();
        }
    }
}
