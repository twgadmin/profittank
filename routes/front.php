<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('deploy', function() {
    if ($_SERVER['SERVER_ADDR'] != '127.0.0.1') {
        $output = shell_exec('cd ' . __DIR__ . '/../ && git pull && php artisan optimize:clear && php artisan migrate && composer dump-autoload');
        echo '<pre>';
        print_r($output);echo '<br>';
        echo '</pre>';
        die();
    }
});

Auth::routes();
Route::get('/', 'HomeController@newHome')->name('home');
Route::get('new-channels-settings', 'HomeController@channelsettings')->name('new-channels-settings');
// Route::get('login-form', 'Auth\LoginController@showLoginForm')->name('login-form');
Route::get('/html-view', 'HomeController@htmlview');



// the profitank urls
// Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');

// Route::get('/profit-generator-category', 'HomeController@GetQuestionbyCategory')->name('profit-generator-category')->middleware('auth');

// post urls
// Route::post('profit-calulcations', 'HomeController@storeAnswers')->name('profit-calulcations')->middleware('auth');
// Route::post('/dashboard', 'HomeController@storeAnswers')->name('dashboard')->middleware('auth');

// ajax post apis 
// Route::post('ajaxGetprogress', 'HomeController@progressbar')->name('ajaxGetprogress');
// Route::post('ajaxGetProfitIncrease', 'HomeController@ajaxGetProfitIncrease')->name('ajaxGetProfitIncrease');
// Route::get('ajaxGetProfitIncrease', 'HomeController@ajaxGetProfitIncrease')->name('ajaxGetProfitIncrease');

# Password reset routes
// Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
// Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

// New Routes starts from here...
Route::get('/welcome', 'HomeController@index')->name('welcome')->middleware('auth');
// Route::get('new-home', 'HomeController@newHome');

Route::get('transactions', 'HomeController@transactions')->name('transactions')->middleware('auth');

Route::get('update-card', 'HomeController@updateCard')->name('update-card')->middleware('auth');

Route::post('update-card-details', 'HomeController@updateCardDetails')->name('update-card-details')->middleware('auth');

# Single-User Routes...
Route::get('su-dashboard', 'HomeController@singleUserDashboard')->name('index')->middleware('auth');
Route::get('dashboard', 'HomeController@singleUserDashboardIframe')->name('single-user-dashboard')->middleware('auth');

# Channel-Partner Routes...
Route::get('channel-dashboard', 'HomeController@channelPartnerDashboard')->name('channel-dashboard')->middleware('auth');

# Distributor-User Routes...
Route::get('distributor-dashboard', 'HomeController@distributorDashboard')->name('distributor')->middleware('auth');

# Charts (iFrame) Routes..
Route::get('map-chart', 'HomeController@mapChart')->name('map-chart')->middleware('auth');
Route::get('month-chart', 'HomeController@monthChart')->name('month-chart')->middleware('auth');
Route::get('saving-chart', 'HomeController@savingChart')->name('saving-chart')->middleware('auth');
Route::get('master-onboarding', 'HomeController@masterOnboarding')->name('master-onboarding')->middleware('auth');
/*Route::post('active-channel-ajax', 'HomeController@activateChannel')->name('active-channel-ajax')->middleware('auth');*/

Route::get('subscriptions', 'HomeController@subscriptions')->name('subscriptions')->middleware('auth');

Route::get('subscribe-plan/{id?}', 'HomeController@subscribePlan')->name('subscribe-plan')->middleware('auth');

Route::post('subscribe/{id?}', 'HomeController@subscribe')->name('subscribe')->middleware('auth');

Route::get('messages/{user_id?}/{user_name?}', 'HomeController@messages')->name('messages')->middleware('auth');

Route::post('messages/{user_id?}/{user_name?}', 'HomeController@sendMessage')->name('sendMessage')->middleware('auth');

Route::get('user-messages-ajax/{user_id?}/{user_name?}', 'HomeController@userMessagesAjax')->name('user-messages-ajax')->middleware('auth');



Route::post('activate-channel-submit', 'HomeController@postActivateChannel')->name('activate-channel-submit')->middleware('auth');

// Route::get('activate-channel', function () {
//     return view('frontend/activate-channel/index');
// });


Route::get('profile', 'HomeController@profile')->name('profile')->middleware('auth');

Route::post('profile-update', 'HomeController@profileUpdate')->name('profile-update')->middleware('auth');

// Route::get('profile', function () {
//     return view('frontend/profile/index');
// });

Route::get('process-complete', function () {
    return view('frontend/process-complete');
});

Route::get('activate-channel/{channel_id?}/{identifier?}', 'HomeController@activateChannel')->name('activate_channel')->middleware('auth');
Route::get('cost-segregation-questions', function () {
    return view('frontend/cost-segregation-questions/index');
});


/*Route::get('health-care', function () {
    return view('frontend/health-care/index');
});

Route::get('merchant-processing', function () {
    return view('frontend/merchant-processing/index');
});
Route::get('peo', function () {
    return view('frontend/peo/index');
});

Route::get('property-tax', function () {
    return view('frontend/property-tax/index');
});

Route::get('r-and-d-credits', function () {
    return view('frontend/r-and-d-credits/index');
});*/


/*Route::get('telecom', function () {
    return view('frontend/telecom/index');
});
Route::get('utilities', function () {
    return view('frontend/utilities/index');
});

Route::get('workers-com', function () {
    return view('frontend/workers-comp/index');
});*/


Route::get('channel-partner-dashboard-wotc', function () {
    return view('frontend/channel-partner-dashboard-wotc');
});
Route::get('invite', function () {
    return view('frontend/invite');
});

Route::get('pt-analytics', function () {
    return view('frontend/pt-analytics');
});

Route::get('email-template', function () {
    return view('emails/frontend/email-template');
});

Route::get('profit-generator','CalculatorController@getCalculator')->name('profit-generator')->middleware('auth');
// Get next step
Route::post('/getNextStep','CalculatorController@moveNextStep');
Route::post('getPrevStep','CalculatorController@movePrevStep');
Route::post('addBusinessId','CalculatorController@addBusinessID');
Route::get('getNextFinalStep','CalculatorController@getNextFinalStep')->name('getNextFinalStep')->middleware('auth');
Route::get('download-customer-channel-question/{id?}', 'HomeController@downloadCustomerChannelQuestion')->name('download-customer-channel-question')->middleware('auth');
Route::get('download-customer-channel-documents/{id?}', 'HomeController@downloadCustomerChannelDocuments')->name('download-customer-channel-documents')->middleware('auth');

// Final Step
Route::any('final-result','CalculatorController@FinalResult')->name('final-result');


