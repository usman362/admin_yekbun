<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\BazarController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\VotingController;
use App\Http\Controllers\Api\MultimediaController;
use App\Http\Controllers\Admin\Donation\DonationController as DonationDonationController;
use App\Http\Controllers\Api\FanPageController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\PolicyAndTermsController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\DiamondUserController;
use App\Http\Controllers\Api\FlaggedUserController;
use App\Http\Controllers\Api\PremiumUserController;
use App\Http\Controllers\Api\NewsCategoryController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\StandardUserController;
use App\Http\Controllers\Api\EventCategoryController;
use App\Http\Controllers\Api\ManageFanPageController;
use App\Http\Controllers\Api\MediaCategoryController;
use App\Http\Controllers\Api\VotingCategoryController;
use App\Http\Controllers\Api\HistoryCategoryController;
use App\Http\Controllers\Api\UploadMovieCategoryController;
use App\Http\Controllers\Api\UploadMovieController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BazarSubCategoryController;
use App\Http\Controllers\Api\TwoFactorController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\TranslationController;
use App\Http\Controllers\Api\AccountSettingController;
use App\Http\Controllers\Api\AdminActivityController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\FeedBackgroundImageController;
use App\Http\Controllers\Api\UserSettingController;
use App\Http\Controllers\Api\RingtoneController;
use App\Http\Controllers\Api\UploadMediaController;
use App\Http\Controllers\Api\CollectionController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\UpgradeAccountController;
use App\Http\Controllers\Api\StripeController;
use App\Http\Controllers\Api\AnimationEmojiController;
use App\Http\Controllers\Api\MarketServiceContorller;
use App\Http\Controllers\Api\ReactionController;
use App\Http\Controllers\Api\PostGalleryController;
use App\Http\Controllers\Api\AvatarsController;
use App\Http\Controllers\Api\EmojiFeedController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\Api\FeedsController;
use App\Http\Controllers\Api\ReportCommentsController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\UserRolesController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\VotingReactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/getfeeds', [AvatarsController::class, 'getfeeds']);
Route::post('/postfeed', [AvatarsController::class, 'postfeed']);

Route::get('/ping', function () {
    return response()->json(['status' => 'ok']);
});
// Authentication
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register-verify-device', [AuthController::class, 'verifyDevice']);
Route::post('/register-device', [AuthController::class, 'registerDevice']);
Route::post('forgot-password', [AuthController::class, 'forgot_password']);
// Route::post('change-password', [AuthController::class, 'change_password']);
Route::post('/reset', [AuthController::class, 'reset'])->name('password.reset');
Route::post('/reset/password', [AuthController::class, 'resetpassword'])->name('reset.complete');
Route::post('/user-otp-code', [AuthController::class, 'getCode'])->name('get.userCode');
Route::post('/reset/resend', [AuthController::class, 'reset_resend'])->name('reset.resend');
Route::post('2fa', [TwoFactorController::class, 'store'])->name('2fa.post');
Route::post('2fa/reset', [TwoFactorController::class, 'resend'])->name('2fa.resend');
Route::get('/user-imei', [AuthController::class, 'userImei']);
Route::post('/check-email-exists', [AuthController::class, 'existsEmail']);

//User Profile

// Account Setting  Controller

Route::post('/send-old-email-code', [AccountSettingController::class, 'send_old_email_code'])->name('send-old-email-code');
Route::post('/send-new-email-code', [AccountSettingController::class, 'send_new_email_code'])->name('send-new-email-code');
Route::post('/change-email', [AccountSettingController::class, 'change_email'])->name('change-email');
Route::post('/resend-email', [AccountSettingController::class, 'resend_email_code'])->name('resend-email');
Route::post('/upgrade-account', [AccountsettingController::class, 'upgrade_account'])->name('upgrade-account');

Route::get('public-feeds', [FeedsController::class, 'public_index']);
Route::get('voting-public', [VotingController::class, 'votingPublic']);
Route::get('/get-artists-public', [MultimediaController::class, 'getArtistsPublic']);
Route::get('/get-all-songs-public', [MultimediaController::class, 'getAllSongsPublic']);
Route::get('/get-all-videos-public', [MultimediaController::class, 'getAllClipsPublic']);

Route::middleware('jwt.custom')->group(function () {

    Route::post('/change-password', [AccountSettingController::class, 'change_password'])
        ->name('change-password');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/get-my-details', [AuthController::class, 'getMyDetails']);
    Route::delete('/delete-my-account', [AuthController::class, 'deleteMyAccount']);
    Route::post('/user/profile/store', [UserProfileController::class, 'store'])->name('user_profile.store');

    Route::resource('voting', VotingController::class)->only(['index', 'store', 'show', 'destroy', 'update']);
    Route::get('/voting/{voting_id}/reactions', [VotingReactionController::class, 'index']);
    Route::post('/voting/reaction', [VotingReactionController::class, 'store']);
    Route::delete('/voting/reaction/{id}', [VotingReactionController::class, 'destroy']);
    Route::post('/accept-privacy-policy', [AuthController::class, 'acceptPrivacyPolicy']);

    Route::get('feeds/{id}/comments', [FeedsController::class, 'getComments']);
    Route::post('feeds/{id}/comments', [FeedsController::class, 'storeComments']);
    Route::post('comments/{id}/edit', [FeedsController::class, 'editComments']);
    Route::post('feeds/{id}/likes', [FeedsController::class, 'feedLike']);
    Route::post('comments/{id}/likes', [FeedsController::class, 'commentLike']);
    Route::delete('comments/{id}/delete', [FeedsController::class, 'commentDelete']);
    Route::get('comments/{id}/report', [ReportCommentsController::class, 'index']);
    Route::post('comments/{id}/report', [ReportCommentsController::class, 'store']);
    Route::post('feed/{id}/report', [ReportCommentsController::class, 'reportfeedstore']);

    //Feeds Section
    Route::get('feeds', [FeedsController::class, 'index']);
    Route::post('feeds', [FeedsController::class, 'store']);
    Route::post('search-feeds-users', [FeedsController::class, 'search_user']);
    Route::post('feeds-permission/{id}', [FeedsController::class, 'change_permission']);
    Route::delete('feeds/{id}', [FeedsController::class, 'delete']);
    Route::get('get-feeds-statistics/{id}', [FeedsController::class, 'get_statistics']);

    Route::post('send-users-request', [UsersController::class, 'sendRequest']);
    Route::post('accept-users-request', [UsersController::class, 'acceptRequest']);
    Route::post('user-online/{id}', [UsersController::class, 'store_user_online']);
    Route::get('get-users-list', [UsersController::class, 'users_list']);
    Route::get('get-users-details/{id}', [UsersController::class, 'users_details']);
    Route::get('get-friends-list/{id}', [UsersController::class, 'freind_list']);
    Route::post('update-friends-list', [UsersController::class, 'update_freind_list']);
    Route::get('get-family-list/{id}', [UsersController::class, 'family_list']);
    Route::get('unfriend-user/{id}', [UsersController::class, 'unfriend_user']);
    Route::get('get-requests-list/{id}', [UsersController::class, 'request_list']);
    Route::get('user-visitor/{id}', [UsersController::class, 'vistor']);
    Route::get('get-user-visitor/{id}', [UsersController::class, 'get_vistor']);
    Route::post('update-fcm-token', [UsersController::class, 'updateDeviceToken']);
    Route::post('send-fcm-notification', [UsersController::class, 'sendNotification']);
    Route::post('my-service', [UsersController::class, 'storeMyService']);
    Route::post('my-network', [UsersController::class, 'storeMyNetwork']);
    Route::post('my-notification', [UsersController::class, 'storeMyNotification']);

    Route::get('/get-artist-songs/{id}', [MultimediaController::class, 'getSongByArtists']);
    Route::get('/get-artist-videos/{id}', [MultimediaController::class, 'getClipsByArtists']);
    Route::get('/get-popular-artists', [MultimediaController::class, 'getPopularArtists']);
    Route::get('/get-artists-details/{id}', [MultimediaController::class, 'getArtistDetail']);
    Route::get('get-favorite-artists', [MultimediaController::class, 'getFavArtists']);
    Route::post('store-artist-song-views/{id}', [MultimediaController::class, 'store_artist_song_views']);
    Route::post('store-artist-video-views/{id}', [MultimediaController::class, 'store_artist_video_views']);
    Route::post('store-artist-favorites/{id}', [MultimediaController::class, 'store_artist_favorites']);




    //Playlist
    Route::get('/get-artists', [MultimediaController::class, 'getArtists']);
    Route::get('/get-all-songs', [MultimediaController::class, 'getAllSongs']);
    Route::get('/get-all-videos', [MultimediaController::class, 'getAllClips']);
    Route::get('/play-music/{id}',[MultimediaController::class, 'playMusic']);
    Route::get('/play-video/{id}',[MultimediaController::class, 'playVideo']);
    Route::get('get-songs-playlist', [MultimediaController::class, 'getSongsPlaylist']);
    Route::get('get-playlist/{id}', [MultimediaController::class, 'getPlaylistDetail']);
    Route::post('edit-playlist/{id}', [MultimediaController::class, 'editPlaylist']);
    Route::post('store-songs-playlist', [MultimediaController::class, 'storeSongsPlaylist']);
    Route::get('get-clips-playlist', [MultimediaController::class, 'getClipsPlaylist']);
    Route::post('store-clips-playlist', [MultimediaController::class, 'storeClipsPlaylist']);
    Route::post('move-playlist-music/{id}', [MultimediaController::class, 'movePlaylist']);
    Route::delete('delete-playlist-music/{id}', [MultimediaController::class, 'deletePlaylist']);
    Route::delete('delete-playlist-group/{id}', [MultimediaController::class, 'deletePlaylistGroup']);
});

Route::post('send-test-notification', [UsersController::class, 'testNotification']);

Route::get("/admin-activity/system-info", [AdminActivityController::class, 'getSystemInfo']);
Route::get("/admin-activity/donation", [AdminActivityController::class, 'getDonations']);
Route::get("/admin-activity/surveys", [AdminActivityController::class, 'getSurveys']);
Route::get("/admin-activity/greetings", [AdminActivityController::class, 'getGreetings']);

Route::post("/admin-activity/system-info", [AdminActivityController::class, 'store_systemInfo']);
Route::post("/admin-activity/donation", [AdminActivityController::class, 'store_donation']);
Route::post("/admin-activity/surveys", [AdminActivityController::class, 'store_surveys']);
Route::post("/admin-activity/greetings", [AdminActivityController::class, 'store_greetings']);

Route::get("/admin-activity/get-feeds", [AdminActivityController::class, 'getpopFeeds']);
Route::post("/admin-activity/delete-feeds", [AdminActivityController::class, 'delete_pops']);

Route::get('countries', [CountryController::class, 'index'])->name('countries.index');
Route::post('countries', [CountryController::class, 'store'])->name('countries.store');
Route::put('countries/{id}', [CountryController::class, 'update'])->name('countries.update');
Route::delete('countries/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');

//provinces
Route::get('provinces', [RegionController::class, 'index'])->name('provinces.index');
Route::post('provinces', [RegionController::class, 'store'])->name('provinces.store');
Route::put('provinces/{id}', [RegionController::class, 'update'])->name('provinces.update');
Route::delete('provinces/{id}', [RegionController::class, 'destroy'])->name('provinces.destroy');

Route::get('kurdish-peoples', [CountryController::class, 'kurdishPeoples'])->name('kurdish.peoples');

//Cities
Route::get('cities', [CityController::class, 'index'])->name('cities.index');
Route::post('cities', [CityController::class, 'store'])->name('cities.store');
Route::put('cities/{id}', [CityController::class, 'update'])->name('cities.update');
Route::delete('cities/{id}', [CityController::class, 'destroy'])->name('cities.destroy');
Route::get('get-cities', [CityController::class, 'getCities']);


//Emojis Section
Route::get('emojis', [EmojiFeedController::class, 'index']);
Route::post('emojis', [EmojiFeedController::class, 'store']);

//News Feed Section
Route::post('news-feeds', [FeedsController::class, 'news_store']);
Route::get('news-feeds', [FeedsController::class, 'news']);

//Event Section
Route::post('events', [FeedsController::class, 'store_event']);
Route::get('events', [FeedsController::class, 'index']);

Route::get('policy_and_terms', [PolicyAndTermsController::class, 'index'])->name('policy_and_terms.index');
Route::post('policy_and_terms', [PolicyAndTermsController::class, 'store'])->name('policy_and_terms.store');
Route::post('policy_and_terms/saveFileds', [PolicyAndTermsController::class, 'saveFileds'])->name(
    'policy_and_terms.saveFileds'
);
Route::delete('policy_and_terms/{id}', [PolicyAndTermsController::class, 'destroy'])->name(
    'policy_and_terms.destroy'
);

Route::get('languages', [LanguageController::class, 'index'])->name('languages.index');
Route::get('languages-list', [LanguageController::class, 'languagesList'])->name('languages.list');
Route::post('languages', [LanguageController::class, 'store'])->name('languages.store');
Route::post('languages/{id}', [LanguageController::class, 'update'])->name('languages.update');
Route::delete('languages/{id}', [LanguageController::class, 'destroy'])->name('languages.destroy');
Route::get('languages/{id}/keywords', [LanguageController::class, 'keywords'])->name('languages.keywords');
Route::get('languages/{id}/keywords/{keyword}', [LanguageController::class, 'keyword'])->name('languages.keyword');

Route::get('app-setting/appinfo', [SettingsController::class, 'app_info']);

// Posts
Route::resource('posts', PostController::class)->except(['create', 'edit']);

// Flagged users
Route::resource('flagged-users', FlaggedUserController::class)->except(['create', 'edit']);
// Reports
Route::resource('reports', ReportController::class)->except(['create', 'edit']);

// Organizations
Route::resource('organizations', OrganizationController::class)->except(['create', 'edit']);
// Donations
Route::resource('donations', DonationController::class)->except(['create', 'edit']);

// Events
// Route::resource('events', EventController::class)->except(['create', 'edit']);
// Event Categories
Route::resource('event-categories', EventCategoryController::class)->except(['create', 'edit']);
// Tickets
Route::resource('tickets', TicketController::class)->except(['create', 'edit']);

// Users
Route::prefix('/users')
    ->group(function () {
        Route::post('{id}/block/', [StandardUserController::class, 'block'])->name('block');
        Route::post('{id}/warn/', [StandardUserController::class, 'warn'])->name('warn');
        Route::post('{id}/upgrade/', [StandardUserController::class, 'upgrade'])->name('upgrade');
        Route::resource('educated', StandardUserController::class);
        Route::resource('cultivated', PremiumUserController::class);
        Route::resource('academic', DiamondUserController::class);
    });

Route::prefix('user-roles')
    ->group(function () {
        Route::get('/educated', [UserRolesController::class, 'educated'])->name('educated');
        Route::get('/cultivated', [UserRolesController::class, 'cultivated'])->name('cultivated');
        Route::get('/academic', [UserRolesController::class, 'academic'])->name('academic');
    });

// News
Route::resource('news', NewsController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::resource('news-category', NewsCategoryController::class)->only([
    'index',
    'store',
    'update',
    'show',
    'destroy',
]);

Route::resource('fan-page', FanPageController::class)->only(['index', 'store', 'show', 'destroy', 'update']);
Route::resource('manage-fanpage', ManageFanPageController::class)->only([
    'index',
    'store',
    'show',
    'destroy',
    'update',
]);

Route::resource('voting-category', VotingCategoryController::class)->only([
    'index',
    'store',
    'show',
    'destroy',
    'update',
]);
Route::resource('media-category', MediaCategoryController::class)->only([
    'index',
    'store',
    'show',
    'destroy',
    'update',
]);
Route::resource('media', MediaController::class)->only(['index', 'store', 'show', 'destroy', 'update']);
Route::resource('history-category', HistoryCategoryController::class)->only([
    'index',
    'store',
    'show',
    'destroy',
    'update',
]);

Route::resource('bazar-subcategory', BazarSubCategoryController::class)->only([
    'index',
    'store',
    'show',
    'destroy',
    'update',
]);

Route::resource('bazar', BazarController::class)->only(['index', 'store', 'show', 'destroy', 'update']);

Route::resource('movie-category', UploadMovieCategoryController::class)->only([
    'index',
    'store',
    'show',
    'destroy',
    'update',
]);
Route::resource('movie', UploadMovieController::class)->only(['index', 'store', 'show', 'destroy', 'update']);

//policy_and_terms

Route::apiResource('policy-and-terms', PolicyAndTermsController::class);
Route::post('saveFileds', [PolicyAndTermsController::class, 'saveFileds'])->name('policy_and_terms.saveFileds');
//Ringtone
Route::get('app-setting/message-ringtone', [RingtoneController::class, 'getMessage'])->name(
    'appsetting.message.ringtone'
);
Route::get('app-setting/call-ringtone', [RingtoneController::class, 'getCall'])->name('appsetting.call.ringtone');
Route::get('app-setting/notification-ringtone', [RingtoneController::class, 'getNotification'])->name('appsetting.notification.ringtone');
Route::get('app-setting/ringtone', [RingtoneController::class, 'index'])->name('appsetting.ringtone.index');

Route::post('app-setting/ringtone', [RingtoneController::class, 'store'])->name('appsetting.ringtone.store');

Route::delete('app-setting/ringtone/{id}', [RingtoneController::class, 'destroy'])->name(
    'appsetting.ringtone.destroy'
);

//Language
// Route::resource('/language', LanguageController::class);

/*--------------------------
 Donation
----------------------------*/
Route::post('/add_donation', [DonationDonationController::class, 'add_donation'])->name('create.donation');
Route::put('/edit_donation/{id}', [DonationDonationController::class, 'edit_donation'])->name('edit.donation');
Route::delete('/destroy_donation/{id}', [DonationDonationController::class, 'destroy_donation'])->name(
    'destroy.donation'
);

// Contact Us Controller
Route::post('/contact-us', [ContactUsController::class, 'contact_us'])->name('contact-us');

// Country Controller
// Route::get('province', [CountryController::class, 'province'])->name('province');
// Route::post('country/store', [CountryController::class, 'store'])->name('country.store');
// Route::put('country/store/update/yes', [CountryController::class, 'update'])->name('country.update');

Route::post('/searchlocation', [CountryController::class, 'search_location']);

// Privacy and Policy
// Route::get('privacy', [PrivacyAndPolicyController::class, 'privacy'])->name('privacy');
// Route::get('/single-privacy/{name}', [PrivacyAndPolicyController::class, 'single_privacy'])->name('single_privacy');

// Translation
Route::prefix('/translate')
    ->name('api.translate.')
    ->group(function () {
        Route::get('/languages', [TranslationController::class, 'fetch_languages'])->name('languages');
        Route::get('/{id}', [TranslationController::class, 'translate'])->name('translate');
    });

// User  Setting Controller
Route::post('/user-setting/{user_id}', [UserSettingController::class, 'index'])->name('user-setting');
Route::post('/user-setting/save', [UserSettingController::class, 'save'])
    ->name('user-setting-save')
    ->middleware('auth:sanctum');

// Ringtone Controller
Route::get('/ringtone', [RingtoneController::class, 'get'])->name('ringtone');

Route::post('/upload-media', [UploadMediaController::class, 'index']);

// Feed image background
Route::post('/upload-background', [FeedBackgroundImageController::class, 'upload'])->name('upload-background');
Route::get('/get-background', [FeedBackgroundImageController::class, 'get'])->name('get-background');

// collectoin feed
Route::post('/add-collection', [CollectionController::class, 'insert'])->name('add-collection');
Route::get('/get_collection/{user_id}', [CollectionController::class, 'get_collection'])->name('get-collection');
Route::delete('/remove-collection/{id}', [CollectionController::class, 'destroy'])->name('remove-collection');

// Paypal
Route::post('charge', [PaymentController::class, 'charge']);
Route::get('success', [PaymentController::class, 'success']);
Route::get('error', [PaymentController::class, 'error']);
Route::get('/payment-details/{payment_id}', [PaymentController::class, 'payment_details']);

// Stripe
Route::post('/stripe/checkout', [StripeController::class, 'index']);
Route::get('/stripe/update-transaction', [StripeController::class, 'update']);
Route::get('/stripe/update-success', [StripeController::class, 'success']);

Route::get('get_account_price', [UpgradeAccountController::class, 'price_upgrade'])->name('get_account_price');
Route::post('/account-upgrade', [UpgradeAccountController::class, 'account_upgrade'])
    ->name('account-upgrade')
    ->middleware('auth:sanctum');

// News
Route::get('/category-news/{id}', [NewsController::class, 'category_news']);
Route::get('/news-cover', [NewsController::class, 'cover_news']);
Route::get('/news-category', [NewsController::class, 'categories']);
Route::get('/news-detail/{id}', [NewsController::class, 'detail']);
Route::post('/news-search', [NewsController::class, 'search']);

// History
Route::get('/history', [HistoryController::class, 'index']);
Route::get('/category-history/{id}', [HistoryController::class, 'categorgy_history']);
Route::get('/history-cover', [HistoryController::class, 'cover_history']);
Route::get('/history-category', [HistoryController::class, 'categories']);
Route::get('/history-detail/{id}', [HistoryController::class, 'detail']);
Route::post('/history-search', [HistoryController::class, 'search']);

// Voting
Route::get('/voting-cover/{id?}', [VotingController::class, 'get_cover']);
Route::get('/fetch-voting/{id?}', [VotingController::class, 'fetch']);
Route::get('/fetch-voting/all/{id?}', [VotingController::class, 'fetch_all']);
Route::get('/voting-details/{id}/{user_id?}', [VotingController::class, 'get_details']);
Route::get('/voting-stats/{id}', [VotingController::class, 'get_statistics']);
Route::get('/voting-province-stats/{id}', [VotingController::class, 'get_province_statistics']);

//Animation Emojji
Route::get('/get-all-emoji/{userId?}/{type?}/{value?}', [AnimationEmojiController::class, 'get_all_emoji'])->name(
    'get-all-emoji'
);

// Reaction
Route::post('/store-reaction', [ReactionController::class, 'store_reaction'])->name('store-reaction');


// Market Service
Route::post('/market-services', [MarketServiceContorller::class, 'market_services'])->name('market-services');

// Post gallery
Route::post('/get-gallery', [PostGalleryController::class, 'get_gallery']);

Route::get('/user', function (Request $request) {
    return $request->user();
});
// });
