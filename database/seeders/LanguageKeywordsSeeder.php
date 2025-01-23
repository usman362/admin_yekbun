<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\LanguageDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageKeywordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = Language::select(['_id', 'code'])->get();

        $homekeywords = [
            ['keyword' => 'languages', 'translated' => 'Languages'],
            ['keyword' => 'privacyAndTerms', 'translated' => 'Privacy & Terms'],
            ['keyword' => 'signIn', 'translated' => 'Sign In'],
            ['keyword' => 'typeYourEmail', 'translated' => 'Type your E-Mail'],
            ['keyword' => 'typeYourPasswordHere', 'translated' => 'Type Your password Here'],
            ['keyword' => 'rememberMe', 'translated' => 'Remember Me'],
            ['keyword' => 'lostDevice', 'translated' => 'Lost Device'],
            ['keyword' => 'addNewDevice', 'translated' => 'Add New Device'],
            ['keyword' => 'password', 'translated' => 'Password'],
            ['keyword' => 'forgotPassword', 'translated' => 'Forgot Password'],
            ['keyword' => 'loginError', 'translated' => 'Login Error'],
            ['keyword' => 'theEmailAddressYouProvidedDoesNotCorrespondWithTheDeviceId', 'translated' => 'The email address you provided does not correspond with the device ID.'],
            ['keyword' => 'newDevice', 'translated' => 'New Device'],
            ['keyword' => 'setupANewDevice', 'translated' => 'Setup a new device'],
            ['keyword' => 'emailVerification', 'translated' => 'Email Verification'],
            ['keyword' => 'send', 'translated' => 'Send'],
            ['keyword' => 'weWillSendAMailToTheEmailAddressWithACodeCheckSpamFolder', 'translated' => 'We will send a mail to the email address with a Code “Check Spam Folder”'],
            ['keyword' => 'emailSentTo', 'translated' => 'E-Mail sent to'],
            ['keyword' => 'codeVerification', 'translated' => 'Code Verification'],
            ['keyword' => 'anAuthenticationCodeHasBeenSentTo', 'translated' => 'An authentication code has been sent to'],
            ['keyword' => 'iDidntReceiveCode', 'translated' => "I didn't receive code?"],
            ['keyword' => 'resendCode', 'translated' => 'Resend Code'],
            ['keyword' => 'secLeft', 'translated' => 'Sec left'],
            ['keyword' => 'verifyNow', 'translated' => 'Verify Now'],
            ['keyword' => 'changeDevice', 'translated' => 'Change Device'],
            ['keyword' => 'start', 'translated' => 'Start'],
            ['keyword' => 'connecting', 'translated' => 'Connecting'],
            ['keyword' => 'summary', 'translated' => 'Summary'],
            ['keyword' => 'status', 'translated' => 'Status'],
            ['keyword' => 'startNow', 'translated' => 'Start Now'],
            ['keyword' => 'yourNewDevice', 'translated' => 'Your new Device'],
            ['keyword' => 'yourOldDevice', 'translated' => 'Your Old Device'],
            ['keyword' => 'deviceId', 'translated' => 'Device ID'],
            ['keyword' => 'deviceRegistration', 'translated' => 'Device Registration'],
            ['keyword' => 'disconnectOldDevice', 'translated' => 'Disconnect old Device'],
            ['keyword' => 'takeMeToSignIn', 'translated' => 'Take me to Sign in'],
            ['keyword' => 'close', 'translated' => 'Close'],
            ['keyword' => 'selectGender', 'translated' => 'Select Gender'],
            ['keyword' => 'imFemale', 'translated' => "I'm Female"],
            ['keyword' => 'imMale', 'translated' => "I'm Male"],
            ['keyword' => 'back', 'translated' => 'Back'],
            ['keyword' => 'next', 'translated' => 'Next'],
            ['keyword' => 'error', 'translated' => 'Error'],
            ['keyword' => 'failedToGetCurrentLocationPleaseMakeSureLocationServicesAreEnabled', 'translated' => 'Failed to get current location. Please make sure location services are enabled.'],
            ['keyword' => 'pleaseEnterAnAddressBeforeProceeding', 'translated' => 'Please enter an address before proceeding.'],
            ['keyword' => 'selectCountry', 'translated' => 'Select Country'],
            ['keyword' => 'currentLocation', 'translated' => 'Current location'],
            ['keyword' => 'yourLocation', 'translated' => 'Your Location'],
            ['keyword' => 'yourCurrentLocation', 'translated' => 'Your current location'],
            ['keyword' => 'cameraNotAvailable', 'translated' => 'Camera not available'],
            ['keyword' => 'aboutYou', 'translated' => 'About You'],
            ['keyword' => 'yourFirstname', 'translated' => 'Your Firstname'],
            ['keyword' => 'yourLastname', 'translated' => 'Your Lastname'],
            ['keyword' => 'yourUsername', 'translated' => 'Your Username'],
            ['keyword' => 'anErrorOccurredWhileSubmittingTheFormPleaseTryAgainLater', 'translated' => 'An error occurred while submitting the form. Please try again later.'],
            ['keyword' => 'anUnknownErrorOccurred', 'translated' => 'An unknown error occurred'],
            ['keyword' => 'step', 'translated' => 'Step'],
            ['keyword' => 'yourStatus', 'translated' => 'Your Status'],
            ['keyword' => 'single', 'translated' => 'Single'],
            ['keyword' => 'engaged', 'translated' => 'Engaged'],
            ['keyword' => 'married', 'translated' => 'Married'],
            ['keyword' => 'yourBirthday', 'translated' => 'Your Birthday'],
            ['keyword' => 'information', 'translated' => 'Information'],
            ['keyword' => 'uMustBeAtLeast16YearOld', 'translated' => 'You must be at least 16 years old'],
            ['keyword' => 'confirm', 'translated' => 'Confirm'],
            ['keyword' => 'yourOrigin', 'translated' => 'Your Origin'],
            ['keyword' => 'pleaseSelect', 'translated' => 'Please Select'],
            ['keyword' => 'imKurdish', 'translated' => "I'm Kurdish"],
            ['keyword' => 'imNotKurdish', 'translated' => "I'm not Kurdish"],
            ['keyword' => 'selectYourProvince', 'translated' => 'Select your Province'],
            ['keyword' => 'selectYourCity', 'translated' => 'Select your City'],
            ['keyword' => 'kurdistan', 'translated' => 'Kurdistan'],
            ['keyword' => 'yourEmailAddress', 'translated' => 'Your E-Mail Address'],
            ['keyword' => 'emailAddress', 'translated' => 'E-Mail Address'],
            ['keyword' => 'enterYourEmail', 'translated' => 'Enter Your E-Mail'],
            ['keyword' => 'repeatYourEmail', 'translated' => 'Repeat your E-Mail'],
            ['keyword' => 'confirmYourEmail', 'translated' => 'Confirm Your E-Mail'],
            ['keyword' => 'thisEmailAlreadyExists', 'translated' => 'This E-Mail already exists'],
            ['keyword' => 'loginNow', 'translated' => 'Login now'],
            ['keyword' => 'emailDoesntMatch', 'translated' => "E-Mail doesn't match"],
            ['keyword' => 'yourPhoneNumber', 'translated' => 'Your Phone Number'],
            ['keyword' => 'typeYourNumber', 'translated' => 'Type your number'],
            ['keyword' => 'createAPassword', 'translated' => 'Create a Password'],
            ['keyword' => 'enterAPassword', 'translated' => 'Enter a Password'],
            ['keyword' => 'repeatAPassword', 'translated' => 'Repeat a Password'],
            ['keyword' => 'rewriteYourPassword', 'translated' => 'Rewrite your password'],
            ['keyword' => 'hasAtLeast810Characters', 'translated' => 'Has at least 8-10 Characters'],
            ['keyword' => 'hasAnUppercaseLetterOrSymbol', 'translated' => 'Has an uppercase letter or symbol'],
            ['keyword' => 'hasANumbers', 'translated' => 'Has a number'],
            ['keyword' => 'hasPasswordMatched', 'translated' => 'Has password matched'],
            ['keyword' => 'acceptPolicyAndTerms', 'translated' => 'Accept policy and terms'],
            ['keyword' => 'tüBexirHatiUserName', 'translated' => 'Tü Bexir Hati User Name'],
            ['keyword' => 'fromLocation', 'translated' => 'From location'],
            ['keyword' => 'kurdistanRojava10111Qamishlo', 'translated' => 'Kurdistan - Rojava - 10111 Qamishlo'],
            ['keyword' => 'completeYourAccount', 'translated' => 'Complete your Account'],
            ['keyword' => 'accountConfirmation', 'translated' => 'Account Confirmation'],
            ['keyword' => 'anEmailHasBeenSentToYouFollowDirectionInTheEmailToConfirmYourAccount', 'translated' => 'An e-mail has been sent to you. Follow the directions in the e-mail to confirm your Account'],
            ['keyword' => 'pleaseEnterTheOtpCodeYouReceivedThroughEmail', 'translated' => 'Please enter the OTP code you received through email.'],
            ['keyword' => 'accountConfirmedSuccessfully', 'translated' => 'Account confirmed successfully!'],
            ['keyword' => 'unexpectedResponseFromTheServerPleaseTryAgainLater', 'translated' => 'Unexpected response from the server. Please try again later.'],
            ['keyword' => 'anErrorOccurredWhileProcessingYourRequest', 'translated' => 'An error occurred while processing your request.'],
            ['keyword' => 'noResponseFromServerPleaseCheckYourInternetConnection', 'translated' => 'No response from the server. Please check your internet connection.'],
            ['keyword' => 'anUnexpectedErrorOccurredPleaseTryAgainLater', 'translated' => 'An unexpected error occurred. Please try again later.'],
            ['keyword' => 'confirmYourAccount', 'translated' => 'Confirm your Account'],
            ['keyword' => 'weWillSendAMailToTheEmailAddressYouRegisteredToActivateYourAccount', 'translated' => 'We will send a mail to the e-mail address you registered to activate your Account'],
            ['keyword' => 'didntReceiveCode', 'translated' => "Didn't receive code?"],
            ['keyword' => 'resentNow', 'translated' => 'Resent Now'],
            ['keyword' => 'accountCreated', 'translated' => 'Account Created!'],
            ['keyword' => 'yourAccountHadBeedCreatedSuccessfully', 'translated' => 'Your account had been created successfully.'],
            ['keyword' => 'pleaseSignInToUseYourAccountAndEnjoy', 'translated' => 'Please sign in to use your account and enjoy'],
        ];

        foreach ($languages as $language) {
            foreach ($homekeywords as $keyword) {
                LanguageDetail::updateOrCreate(['keyword' => $keyword['keyword']], [
                    'language_id' => $language->id,
                    'section_name' => 'Home Section',
                    'keyword' => $keyword['keyword'],
                    'translated' => $language->code == 'en' ? $keyword['translated'] : '',
                ]);
            }
        }
    }
}
