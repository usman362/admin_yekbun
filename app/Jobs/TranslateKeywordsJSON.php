<?php

namespace App\Jobs;

use App\Models\LanguageDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Str;

class TranslateKeywordsJSON implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $languageId;
    public $langCode;
    public $keywords;
    public $mainSection;
    public $sectionName;
    public $json;

    public function __construct($languageId, $langCode,$mainSection,$sectionName,$json)
    {
        $this->languageId = $languageId;
        $this->mainSection = $mainSection;
        $this->sectionName = $sectionName;
        $this->json = $json;
        $this->langCode = Str::lower($langCode);
    }

    public function handle(): void
    {
        $homekeywords = [

            // Home Page Languages
            ['keyword' => 'Languages', 'translated' => 'Languages', 'main_section' => 'Home Page', 'section_name' => 'Home Page Languages'],
            // Home Page App Policy
            ['keyword' => 'Privacy & Terms', 'translated' => 'Privacy & Terms', 'main_section' => 'Home Page', 'section_name' => 'Home Page App Policy'],
            // Home Page Landing Page
            ['keyword' => 'Advertisment', 'translated' => 'Advertisment', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'History', 'translated' => 'History', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Latest Artist', 'translated' => 'Latest Artist', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Top 5 songs', 'translated' => 'Top 5 songs', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'User Feeds fetch failed!', 'translated' => 'User Feeds fetch failed!', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Latest Artist fetch failed!', 'translated' => 'Latest Artist fetch failed!', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Songs fetch failed!', 'translated' => 'Songs fetch failed!', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'History fetch failed!', 'translated' => 'History fetch failed!', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Votes fetch failed!', 'translated' => 'Votes fetch failed!', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Latest Video Clips', 'translated' => 'Latest Video Clips', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'AI Videos', 'translated' => 'AI Videos', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'See all', 'translated' => 'See all', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Latest Surveys', 'translated' => 'Latest Surveys', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'User Clips', 'translated' => 'User Clips', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Market', 'translated' => 'Market', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Shops', 'translated' => 'Shops', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Events', 'translated' => 'Events', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Donations', 'translated' => 'Donations', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Dear Guest', 'translated' => 'Dear Guest', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'To get access to our Content u have to Create account or Sign up', 'translated' => 'To get access to our Content u have to Create account or Sign up', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Create Account', 'translated' => 'Create Account', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Join to us, and enjoy our Platform', 'translated' => 'Join to us, and enjoy our Platform', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Sign In', 'translated' => 'Sign In', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Please use your Login Details for Access', 'translated' => 'Please use your Login Details for Access', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Close', 'translated' => 'Close', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Select Your Language', 'translated' => 'Select Your Language', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],
            ['keyword' => 'Submit', 'translated' => 'Submit', 'main_section' => 'Home Page', 'section_name' => 'Home Page Landing Page'],

            // Home Page SignIn
            ['keyword' => 'Email and Password are required.', 'translated' => 'Email and Password are required.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Login Successful! You are now logged in.', 'translated' => 'Login Successful! You are now logged in.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Invalid email or password.', 'translated' => 'Invalid email or password.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Network Error. Please check your internet connection.', 'translated' => 'Network Error. Please check your internet connection.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'An unexpected error occurred.', 'translated' => 'An unexpected error occurred.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Email is required.', 'translated' => 'Email is required.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Please enter a valid email address.', 'translated' => 'Please enter a valid email address.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Email sent successfully!', 'translated' => 'Email sent successfully!', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Failed to send email.', 'translated' => 'Failed to send email.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Error sending email. Please try again.', 'translated' => 'Error sending email. Please try again.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Error verifying OTP. Please try again.', 'translated' => 'Error verifying OTP. Please try again.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Type your E-Mail', 'translated' => 'Type your E-Mail', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Type Your password Here', 'translated' => 'Type Your password Here', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Remember Me', 'translated' => 'Remember Me', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Lost Device', 'translated' => 'Lost Device', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Add New Device', 'translated' => 'Add New Device', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Password', 'translated' => 'Password', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Forgot Password', 'translated' => 'Forgot Password', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Login Error', 'translated' => 'Login Error', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'The email address you provided does not correspond with the device ID associated with the account', 'translated' => 'The email address you provided does not correspond with the device ID associated with the account', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'New Device', 'translated' => 'New Device', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'setupANewDevice', 'translated' => 'setupANewDevice', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Email Verification', 'translated' => 'Email Verification', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Send', 'translated' => 'Send', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'We will send a mail to the email address with a Code “Check Spam Folder”', 'translated' => 'We will send a mail to the email address with a Code “Check Spam Folder”', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Code Verification', 'translated' => 'Code Verification', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'An authentication code has been sent to', 'translated' => 'An authentication code has been sent to', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => "I didn't receive code?", 'translated' => "I didn't receive code?", 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Resend Code', 'translated' => 'Resend Code', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Sec left', 'translated' => 'Sec left', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Verify Now', 'translated' => 'Verify Now', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Congratulations!', 'translated' => 'Congratulations!', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Devices upgraded successfully.', 'translated' => 'Devices upgraded successfully.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Change Device', 'translated' => 'Change Device', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Your new Device', 'translated' => 'Your new Device', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Your Old Device', 'translated' => 'Your Old Device', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Device ID', 'translated' => 'Device ID', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Take me to Sign in', 'translated' => 'Take me to Sign in', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Connecting the Server', 'translated' => 'Connecting the Server', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Connecting the DB', 'translated' => 'Connecting the DB', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],
            ['keyword' => 'Request Changes', 'translated' => 'Request Changes', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignIn'],



            // Lost Device
            ['keyword' => 'Please enter a valid email.', 'translated' => 'Please enter a valid email.', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'Failed to reset device. Please try again.', 'translated' => 'Failed to reset device. Please try again.', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'We will send a mail to the email address you registered to regain your password.', 'translated' => 'We will send a mail to the email address you registered to regain your password.', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'Password Reset Email Sent', 'translated' => 'Password Reset Email Sent', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'An email has been sent to you. Follow directions in the email to reset your password.', 'translated' => 'An email has been sent to you. Follow directions in the email to reset your password.', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'Invalid Code', 'translated' => 'Invalid Code', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'Please enter the 4-digit OTP code', 'translated' => 'Please enter the 4-digit OTP code', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'Success', 'translated' => 'Success', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'OTP verified successfully!', 'translated' => 'OTP verified successfully!', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'otpVerificationFailed', 'translated' => 'otpVerificationFailed', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'Failed to verify OTP. Please try again.', 'translated' => 'Failed to verify OTP. Please try again.', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'Resend Disabled', 'translated' => 'Resend Disabled', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'Please wait until the timer ends to resend the code.', 'translated' => 'Please wait until the timer ends to resend the code.', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'Verification', 'translated' => 'Verification', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'Error', 'translated' => 'Error', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => "Didn't receive code?", 'translated' => "Didn't receive code?", 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],
            ['keyword' => 'Resent Now', 'translated' => 'Resent Now', 'main_section' => 'Lost Device', 'section_name' => 'Lost Device'],



            // Home Page SignUp
            ['keyword' => 'Password has been successfully reset.', 'translated' => 'Password has been successfully reset.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Password reset failed', 'translated' => 'Password reset failed', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'No response from the server. Please try again.', 'translated' => 'No response from the server. Please try again.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Something went wrong. Please try again later.', 'translated' => 'Something went wrong. Please try again later.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Create Password', 'translated' => 'Create Password', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Choose a secure password that will be easy for you to remember.', 'translated' => 'Choose a secure password that will be easy for you to remember.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Confirm your password here', 'translated' => 'Confirm your password here', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Has at least 8 - 10 Characters', 'translated' => 'Has at least 8 - 10 Characters', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Has an uppercase letter or symbol', 'translated' => 'Has an uppercase letter or symbol', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Has a Numbers', 'translated' => 'Has a Numbers', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Has password matched', 'translated' => 'Has password matched', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Select Gender', 'translated' => 'Select Gender', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => "I'm Female", 'translated' => "I'm Female", 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'imMale', 'translated' => 'imMale', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Back', 'translated' => 'Back', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Next', 'translated' => 'Next', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Create Account Error', 'translated' => 'Create Account Error', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'This device is already linked to an existing account. Creating a new account is not possible. You have the following options:', 'translated' => 'This device is already linked to an existing account. Creating a new account is not possible. You have the following options:', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Mail & Password need it', 'translated' => 'Mail & Password need it', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'E-Mail need it', 'translated' => 'E-Mail need it', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Camera not available', 'translated' => 'Camera not available', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Enter Your Fullname', 'translated' => 'Enter Your Fullname', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Enter Your Username', 'translated' => 'Enter Your Username', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Your Status', 'translated' => 'Your Status', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'single', 'translated' => 'single', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Engaged', 'translated' => 'Engaged', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'married', 'translated' => 'married', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Your Birthday', 'translated' => 'Your Birthday', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Information', 'translated' => 'Information', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'uMustBeAtLeast16YearOld', 'translated' => 'uMustBeAtLeast16YearOld', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Confirm', 'translated' => 'Confirm', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Your Origin', 'translated' => 'Your Origin', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Please Select', 'translated' => 'Please Select', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => "I'm Kurdish", 'translated' => "I'm Kurdish", 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => "I'm not Kurdish", 'translated' => "I'm not Kurdish", 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Select your Province', 'translated' => 'Select your Province', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Select your City', 'translated' => 'Select your City', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Kurdistan', 'translated' => 'Kurdistan', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Registration successful!', 'translated' => 'Registration successful!', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'This device is already registered.', 'translated' => 'This device is already registered.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Registration failed. Please try again.', 'translated' => 'Registration failed. Please try again.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Invalid data provided.', 'translated' => 'Invalid data provided.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Server error occurred. Please try again.', 'translated' => 'Server error occurred. Please try again.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Network error. Please check your connection.', 'translated' => 'Network error. Please check your connection.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'An unexpected error occurred. Please try again.', 'translated' => 'An unexpected error occurred. Please try again.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Your Address', 'translated' => 'Your Address', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Country & City', 'translated' => 'Country & City', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Select Contry & city', 'translated' => 'Select Contry & city', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Policy & Terms', 'translated' => 'Policy & Terms', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Your E-Mail Address', 'translated' => 'Your E-Mail Address', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'E-Mail Address', 'translated' => 'E-Mail Address', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Enter Your E-Mail', 'translated' => 'Enter Your E-Mail', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Repeat your E-Mail', 'translated' => 'Repeat your E-Mail', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Confirm Your E-Mail', 'translated' => 'Confirm Your E-Mail', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'This E-Mail already exists', 'translated' => 'This E-Mail already exists', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => "E-Mail doesn't match", 'translated' => "E-Mail doesn't match", 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Create a Password', 'translated' => 'Create a Password', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Enter a Password', 'translated' => 'Enter a Password', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Repeat a Password', 'translated' => 'Repeat a Password', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Rewrite your password', 'translated' => 'Rewrite your password', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'acceptPolicyAnd', 'translated' => 'acceptPolicyAnd', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'terms', 'translated' => 'terms', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'From location', 'translated' => 'From location', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Complete your Account', 'translated' => 'Complete your Account', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Account Confirmation', 'translated' => 'Account Confirmation', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'An e-mail has been sent to you Follow direction in the e-mail to confirm your Account', 'translated' => 'An e-mail has been sent to you Follow direction in the e-mail to confirm your Account', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Please enter the OTP code you received through email.', 'translated' => 'Please enter the OTP code you received through email.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Account confirmed successfully!', 'translated' => 'Account confirmed successfully!', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Unexpected response from the server. Please try again later.', 'translated' => 'Unexpected response from the server. Please try again later.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'An error occurred while processing your request.', 'translated' => 'An error occurred while processing your request.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'No response from server. Please check your internet connection.', 'translated' => 'No response from server. Please check your internet connection.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'An unexpected error occurred. Please try again later.', 'translated' => 'An unexpected error occurred. Please try again later.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Confirm your Account', 'translated' => 'Confirm your Account', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'We will send a mail to the e-mail address you registered to Activate your Account', 'translated' => 'We will send a mail to the e-mail address you registered to Activate your Account', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Account Created!', 'translated' => 'Account Created!', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Your account had beed created successfully.', 'translated' => 'Your account had beed created successfully.', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Please sign in to use your account and enjoy', 'translated' => 'Please sign in to use your account and enjoy', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],
            ['keyword' => 'Welcome to you', 'translated' => 'Welcome to you', 'main_section' => 'Home Page', 'section_name' => 'Home Page SignUp'],


            // ['keyword' => 'settingsOverview', 'translated' => 'Settings Overview', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'accountStatus', 'translated' => 'Account Status', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'information', 'translated' => 'Information', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'accountIsActive', 'translated' => 'Account is Active', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'accountIsInactive', 'translated' => 'Account is Inactive', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'fastAccess', 'translated' => 'Fast Access', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'setting', 'translated' => 'Setting', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'appSettings', 'translated' => 'App Settings', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'office', 'translated' => 'Office', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'myOffice', 'translated' => 'My Office', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'notifications', 'translated' => 'Notifications', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'profile', 'translated' => 'Profile', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'appProfile', 'translated' => 'App Profile', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'fastSetting', 'translated' => 'Fast Setting', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'bazar', 'translated' => 'Bazar', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'privacy', 'translated' => 'Privacy', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'orders', 'translated' => 'Orders', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'password', 'translated' => 'Password', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'playMusic', 'translated' => 'Play Music', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'ringtone', 'translated' => 'RingTone', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'ads', 'translated' => 'Ads', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'email', 'translated' => 'E-mail', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'manageMyItems', 'translated' => 'Manage my Items', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'manageMyProfile', 'translated' => 'Manage My Profile', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'managePassword', 'translated' => 'Manage Password', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'managePlayer', 'translated' => 'Manage Player', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'manageRingtone', 'translated' => 'Manage Ringtone', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'manageMyAds', 'translated' => 'Manage My Ads', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'manageEmail', 'translated' => 'Manage E-Mail', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'myChannels', 'translated' => 'My Channels', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'myStorage', 'translated' => 'My Storage', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'used', 'translated' => 'Used', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'storage', 'translated' => 'Storage', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'images', 'translated' => 'Images', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'videos', 'translated' => 'Videos', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'yekbunSupport', 'translated' => 'Yekbun Support', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'yekbun', 'translated' => 'Yekbun', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'appPolicy', 'translated' => 'App Policy', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'contacts', 'translated' => 'Contacts', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'aboutUs', 'translated' => 'About Us', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'currently', 'translated' => 'Currently', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'upgradeTo', 'translated' => 'Upgrade to', 'main_section' => 'Settings', 'section_name' => 'Settings Overview'],
            // ['keyword' => 'profileSettings', 'translated' => 'Profile Settings', 'main_section' => 'Settings', 'section_name' => 'App Settings'],
            // ['keyword' => 'myAccount', 'translated' => 'My Account', 'main_section' => 'Settings', 'section_name' => 'App Settings'],
            // ['keyword' => 'manageMyAccounts', 'translated' => 'Manage My Accounts', 'main_section' => 'Settings', 'section_name' => 'App Settings'],
            // ['keyword' => 'myPrivacy', 'translated' => 'My Privacy', 'main_section' => 'Settings', 'section_name' => 'App Settings'],
            // ['keyword' => 'manageMyPrivacy', 'translated' => 'Manage My Privacy', 'main_section' => 'Settings', 'section_name' => 'App Settings'],
            // ['keyword' => 'myNotifications', 'translated' => 'My Notifications', 'main_section' => 'Settings', 'section_name' => 'App Settings'],
            // ['keyword' => 'manageNotificationAndRingtone', 'translated' => 'Manage Notification & Ringtone', 'main_section' => 'Settings', 'section_name' => 'App Settings'],
            // ['keyword' => 'myNetwork', 'translated' => 'My Network', 'main_section' => 'Settings', 'section_name' => 'App Settings'],
            // ['keyword' => 'manageTheConnections', 'translated' => 'Manage the Connections', 'main_section' => 'Settings', 'section_name' => 'App Settings'],
            // ['keyword' => 'myStorage', 'translated' => 'My Storage', 'main_section' => 'Settings', 'section_name' => 'App Settings'],
            // ['keyword' => 'manageTheStorage', 'translated' => 'Manage the Storage', 'main_section' => 'Settings', 'section_name' => 'App Settings'],
            // ['keyword' => 'newViolate', 'translated' => 'New Violate', 'main_section' => 'Settings', 'section_name' => 'App Profile'],
            // ['keyword' => 'wereNotAllowedBadFeedsOnPlatform', 'translated' => 'We re not Allowed Bad Feeds on Platform', 'main_section' => 'Settings', 'section_name' => 'App Profile'],
            // ['keyword' => 'latestFeeds', 'translated' => 'Latest Feeds', 'main_section' => 'Settings', 'section_name' => 'App Profile'],
            // ['keyword' => 'seeAll', 'translated' => 'See All', 'main_section' => 'Settings', 'section_name' => 'App Profile'],
            // ['keyword' => 'addACommentHere', 'translated' => 'Add a Comment Here', 'main_section' => 'Settings', 'section_name' => 'App Profile'],
            // ['keyword' => 'myPhotos', 'translated' => 'My Photos', 'main_section' => 'Settings', 'section_name' => 'App Profile'],
            // ['keyword' => 'myVideos', 'translated' => 'My Videos', 'main_section' => 'Settings', 'section_name' => 'App Profile'],
            // ['keyword' => 'latestReels', 'translated' => 'Latest Reels', 'main_section' => 'Settings', 'section_name' => 'App Profile'],
            // ['keyword' => 'wishesAndThanks', 'translated' => 'Wishes & Thanks', 'main_section' => 'Settings', 'section_name' => 'App Profile'],
            // ['keyword' => 'latestStories', 'translated' => 'Latest Stories', 'main_section' => 'Settings', 'section_name' => 'App Profile'],

            // // my account
            // ['keyword' => 'My account', 'translated' => 'My account', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'User Name', 'translated' => 'User Name', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'My Information', 'translated' => 'My Information', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'Nick Name', 'translated' => 'Nick Name', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'Status', 'translated' => 'Status', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'My Email', 'translated' => 'My Email', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'Manage Email', 'translated' => 'Manage Email', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'My Password', 'translated' => 'My Password', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'Manage My Password', 'translated' => 'Manage My Password', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'My Residence', 'translated' => 'My Residence', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'My Living and birth location', 'translated' => 'My Living and birth location', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'My Profile', 'translated' => 'My Profile', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'Close My Profile', 'translated' => 'Close My Profile', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'Yekbun Support', 'translated' => 'Yekbun Support', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'Yekbun Terms', 'translated' => 'Yekbun Terms', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'Yekbun Contacts', 'translated' => 'Yekbun Contacts', 'main_section' => 'Settings', 'section_name' => 'My Account'],
            // ['keyword' => 'Yekbun About us', 'translated' => 'Yekbun About us', 'main_section' => 'Settings', 'section_name' => 'My Account'],

            // // My account information
            // ['keyword' => 'My Account INformation', 'translated' => 'My Account INformation', 'main_section' => 'Settings', 'section_name' => 'My Account Information'],
            // ['keyword' => 'Profile Setting', 'translated' => 'Profile Setting', 'main_section' => 'Settings', 'section_name' => 'My Account Information'],
            // ['keyword' => 'Edit my nick name', 'translated' => 'Edit my nick name', 'main_section' => 'Settings', 'section_name' => 'My Account Information'],
            // ['keyword' => 'Edit my nick name', 'translated' => 'Edit my nick name', 'main_section' => 'Settings', 'section_name' => 'My Account Information'],
            // ['keyword' => 'Information', 'translated' => 'Information', 'main_section' => 'Settings', 'section_name' => 'My Account Information'],
            // ['keyword' => 'Status Setting', 'translated' => 'Status Setting', 'main_section' => 'Settings', 'section_name' => 'My Account Information'],
            // ['keyword' => 'Single', 'translated' => 'Single', 'main_section' => 'Settings', 'section_name' => 'My Account Information'],
            // ['keyword' => 'Engagment', 'translated' => 'Engagment', 'main_section' => 'Settings', 'section_name' => 'My Account Information'],
            // ['keyword' => 'Married', 'translated' => 'Married', 'main_section' => 'Settings', 'section_name' => 'My Account Information'],
            // ['keyword' => 'Save', 'translated' => 'Save', 'main_section' => 'Settings', 'section_name' => 'My Account Information'],

            // // My account Email

            // ['keyword' => 'My Account - My  Email', 'translated' => 'My Account - My  Email', 'main_section' => 'Settings', 'section_name' => 'My Account My Email'],
            // ['keyword' => 'Your Current Email', 'translated' => 'Your Current Email', 'main_section' => 'Settings', 'section_name' => 'My Account My Email'],
            // ['keyword' => 'Email setting', 'translated' => 'Email setting', 'main_section' => 'Settings', 'section_name' => 'My Account My Email'],
            // ['keyword' => 'Your Old Email', 'translated' => 'Your Old Email', 'main_section' => 'Settings', 'section_name' => 'My Account My Email'],
            // ['keyword' => 'Your new Email', 'translated' => 'Your new Email', 'main_section' => 'Settings', 'section_name' => 'My Account My Email'],
            // ['keyword' => 'type your Email here', 'translated' => 'Your new Email', 'main_section' => 'Settings', 'section_name' => 'My Account My Email'],
            // ['keyword' => 'Repeat new Email', 'translated' => 'Repeat new Email', 'main_section' => 'Settings', 'section_name' => 'My Account My Email'],
            // ['keyword' => 'type your Email here', 'translated' => 'Your new Email', 'main_section' => 'Settings', 'section_name' => 'My Account My Email'],
            // ['keyword' => 'Submit', 'translated' => 'Submit', 'main_section' => 'Settings', 'section_name' => 'My Account My Email'],
            // ['keyword' => 'An Authentication code has been sent to', 'translated' => 'An Authentication code has been sent to', 'main_section' => 'Settings', 'section_name' => 'My Account My Email'],
            // ['keyword' => 'I didnot received the code', 'translated' => 'I didnot received the code', 'main_section' => 'Settings', 'section_name' => 'My Account My Email'],
            // ['keyword' => 'Resend Code', 'translated' => 'Resend Code', 'main_section' => 'Settings', 'section_name' => 'My Account My Email'],
            // ['keyword' => 'Verify now', 'translated' => 'Verify now', 'main_section' => 'Settings', 'section_name' => 'My Account My Email'],
            // // My account Email
            // ['keyword' => 'My Account - My password', 'translated' => 'My Account - My password', 'main_section' => 'Settings', 'section_name' => 'My Account My Password'],
            // ['keyword' => 'Password Setting', 'translated' => 'Password Setting', 'main_section' => 'Settings', 'section_name' => 'My Account My Password'],
            // ['keyword' => 'Your Old Password', 'translated' => 'Your Old Password', 'main_section' => 'Settings', 'section_name' => 'My Account My Password'],
            // ['keyword' => 'Password will be visible here', 'translated' => 'Password will be visible here', 'main_section' => 'Settings', 'section_name' => 'My Account My Password'],
            // ['keyword' => 'New  Password', 'translated' => 'New  Password', 'main_section' => 'Settings', 'section_name' => 'My Account My Password'],
            // ['keyword' => 'has atleast 8-10 characters  ', 'translated' => 'has atleast 8-10 characters', 'main_section' => 'Settings', 'section_name' => 'My Account My Password'],
            // ['keyword' => 'has an upper case or lower  ', 'translated' => 'has an upper case or lower', 'main_section' => 'Settings', 'section_name' => 'My Account My Password'],
            // ['keyword' => 'has a numbers ', 'translated' => 'has a numbers', 'main_section' => 'Settings', 'section_name' => 'My Account My Password'],
            // ['keyword' => 'Continue ', 'translated' => 'Continue', 'main_section' => 'Settings', 'section_name' => 'My Account My Password'],
            // // My account Resedence

            // ['keyword' => 'My Account - My Residence', 'translated' => 'My Account - My Residence', 'main_section' => 'Settings', 'section_name' => 'My Account My Residence'],
            // ['keyword' => 'Residence', 'translated' => 'Residence', 'main_section' => 'Settings', 'section_name' => 'My Account My Residence'],
            // ['keyword' => 'state zip code,city', 'translated' => 'state zip code,city', 'main_section' => 'Settings', 'section_name' => 'My Account My Residence'],
            // ['keyword' => 'Change your location here', 'translated' => 'Change your location here', 'main_section' => 'Settings', 'section_name' => 'My Account My Residence'],
            // ['keyword' => 'Select  country ', 'translated' => 'Change your location here', 'main_section' => 'Settings', 'section_name' => 'My Account My Residence'],
            // ['keyword' => 'Search  ', 'translated' => 'Search', 'main_section' => 'Settings', 'section_name' => 'My Account My Residence'],

            // //setting privacy

            // ['keyword' => 'setting privacy', 'translated' => 'setting privacy', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'my profile image', 'translated' => 'my profile image', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'profile image privacy', 'translated' => 'profile image privacy', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'for public', 'translated' => 'for public', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'Friends only', 'translated' => 'Friends only', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'family only', 'translated' => 'family only', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'Everyone can see', 'translated' => 'Everyone can see', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'Contact permission', 'translated' => 'Contact permission', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'privacy setting', 'translated' => 'privacy setting', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'user request', 'translated' => 'user request', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'Get greeting', 'translated' => 'Get greeting ', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'recived friend request ', 'translated' => 'recived friend request', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'recived user greeting', 'translated' => 'recived user greeting', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'Visiblities', 'translated' => 'Visiblities', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],
            // ['keyword' => 'List me in Search', 'translated' => 'List me in Search', 'main_section' => 'Settings', 'section_name' => 'Setting Privacy'],

            // //setting Notification

            // ['keyword' => 'Setting Notification', 'translated' => 'Setting Notification', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'Notification', 'translated' => 'Notification', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'calls', 'translated' => 'calls', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'message', 'translated' => 'message', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'Ringtone', 'translated' => 'Ringtone', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'Admin Feed', 'translated' => 'Admin Feed', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'New Music', 'translated' => 'New Music', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'New history', 'translated' => 'New history', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'New votes', 'translated' => 'New votes', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'New videos', 'translated' => 'New videos', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'New events', 'translated' => 'New events', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'New Donation', 'translated' => 'New Donation', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'New clips', 'translated' => 'New clips', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'New wishes', 'translated' => 'New wishes', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'New emotions', 'translated' => 'New emotions', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'Info Banner', 'translated' => 'Info Banner', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'None', 'translated' => 'None', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'Banner', 'translated' => 'Banner', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],
            // ['keyword' => 'Alert', 'translated' => 'Alert', 'main_section' => 'Settings', 'section_name' => 'Setting Notification'],

            // //Manage Ringtone
            // ['keyword' => 'Manage Ringtone', 'translated' => 'Manage Ringtone', 'main_section' => 'Settings', 'section_name' => 'Manage Ringtone'],
            // ['keyword' => 'select Ringtone ', 'translated' => 'select Ringtone', 'main_section' => 'Settings', 'section_name' => 'Manage Ringtone'],
            // ['keyword' => 'save & close', 'translated' => 'save & close', 'main_section' => 'Settings', 'section_name' => 'Manage Ringtone'],

            // //Setting my network
            // ['keyword' => 'Setting My Network', 'translated' => 'Setting My Network', 'main_section' => 'Settings', 'section_name' => 'Setting My Network'],
            // ['keyword' => 'Network', 'translated' => 'Network', 'main_section' => 'Settings', 'section_name' => 'Setting My Network'],
            // ['keyword' => 'Live Stream', 'translated' => 'Live Stream', 'main_section' => 'Settings', 'section_name' => 'Setting My Network'],
            // ['keyword' => 'Play Music', 'translated' => 'Play Music', 'main_section' => 'Settings', 'section_name' => 'Setting My Network'],
            // ['keyword' => 'Play Video', 'translated' => 'Play Video', 'main_section' => 'Settings', 'section_name' => 'Setting My Network'],
            // ['keyword' => 'Audio Call', 'translated' => 'Audio Call', 'main_section' => 'Settings', 'section_name' => 'Setting My Network'],
            // ['keyword' => 'Interview', 'translated' => 'Interview', 'main_section' => 'Settings', 'section_name' => 'Setting My Network'],
            // ['keyword' => 'wifi 5g', 'translated' => 'wifi 5g', 'main_section' => 'Settings', 'section_name' => 'Setting My Network'],
            // //Setting my storage
            // ['keyword' => 'Setting My Storage', 'translated' => 'Setting My Storage', 'main_section' => 'Settings', 'section_name' => 'Setting My Storage'],
            // ['keyword' => 'yekbun  Storage', 'translated' => 'yekbun  Storage', 'main_section' => 'Settings', 'section_name' => 'Setting My Storage'],
            // ['keyword' => 'In development will be avaialble soon', 'translated' => 'In development will be avaialble soon', 'main_section' => 'Settings', 'section_name' => 'Setting My Storage'],

            // //Setting policy and terms
            // ['keyword' => 'Setting Policy & Terms', 'translated' => 'Setting Policy & Terms', 'main_section' => 'Settings', 'section_name' => 'Setting Policy & Terms'],
            // ['keyword' => 'Policy & Terms', 'translated' => 'Policy & Terms', 'main_section' => 'Settings', 'section_name' => 'Setting Policy & Terms'],

            // //Setting Contact us
            // ['keyword' => 'Setting Contact us', 'translated' => 'Setting Contact us', 'main_section' => 'Settings', 'section_name' => 'Setting Contact Us'],
            // ['keyword' => 'Contact Subject', 'translated' => 'Contact Subject', 'main_section' => 'Settings', 'section_name' => 'Setting Contact Us'],
            // ['keyword' => 'Online Shop', 'translated' => 'Online Shop', 'main_section' => 'Settings', 'section_name' => 'Setting Contact Us'],
            // ['keyword' => 'Servcies', 'translated' => 'Servcies', 'main_section' => 'Settings', 'section_name' => 'Setting Contact Us'],
            // ['keyword' => 'Ads', 'translated' => 'Ads', 'main_section' => 'Settings', 'section_name' => 'Setting Contact Us'],
            // ['keyword' => 'Account', 'translated' => 'Account', 'main_section' => 'Settings', 'section_name' => 'Setting Contact Us'],
            // ['keyword' => 'Payment', 'translated' => 'Payment', 'main_section' => 'Settings', 'section_name' => 'Setting Contact Us'],
            // ['keyword' => 'Else', 'translated' => 'Else', 'main_section' => 'Settings', 'section_name' => 'Setting Contact Us'],
            // ['keyword' => 'Type the Title', 'translated' => 'Type the Title', 'main_section' => 'Settings', 'section_name' => 'Setting Contact Us'],
            // ['keyword' => 'Type the Title here', 'translated' => 'Type the Title here', 'main_section' => 'Settings', 'section_name' => 'Setting Contact Us'],
            // ['keyword' => 'How we can help you', 'translated' => 'How we can help you', 'main_section' => 'Settings', 'section_name' => 'Setting Contact Us'],
            // ['keyword' => 'type here', 'translated' => 'type here', 'main_section' => 'Settings', 'section_name' => 'Setting Contact Us'],

            // //Setting About us

            // ['keyword' => 'Setting About Us', 'translated' => 'Setting About Us', 'main_section' => 'Settings', 'section_name' => 'Setting About Us'],
            // ['keyword' => 'About us', 'translated' => 'About us', 'main_section' => 'Settings', 'section_name' => 'Setting About Us'],
            // ['keyword' => 'Notes', 'translated' => 'Notes', 'main_section' => 'Settings', 'section_name' => 'Setting About Us'],

        ];

        foreach ($homekeywords as $keyword) {
            $translated = $keyword['translated'];

            if ($this->langCode !== 'en') {
                try {
                    $tr = new GoogleTranslate($this->langCode);
                    $translated = $tr->translate($keyword['translated']);
                } catch (\Exception $e) {
                    $translated = $keyword['translated'];
                }
            }

            LanguageDetail::create([
                'language_id'   => $this->languageId,
                'keyword'       => $keyword['keyword'],
                'translated'    => $translated,
                'main_section'  => $this->mainSection,
                'section_name'  => $this->sectionName,
            ]);
        }
    }
}
