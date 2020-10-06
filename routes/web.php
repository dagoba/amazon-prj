<?php

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckUserVerified;
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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {

    Route::get('/', 'PublicPages\WelcomeController@index')->name('welcome');
    // Route::get('/about-project','PublicPages\AboutprojectController@index')->name('about-project');
    Route::get('/how-it-works','PublicPages\HowitworksController@index')->name('how-it-works');
    Route::get('/reviews', 'PublicPages\ReviewsController@index')->name('reviews');
    Route::get('/about', 'PublicPages\AboutController@index')->name('about');
    Route::get('/affileate-program', 'PublicPages\AffileateprogramController@index')->name('affileate-program');
    Route::get('/contact', 'PublicPages\ContactController@index')->name('contact');

    Auth::routes();

    Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail');

    Route::group(['middleware'=>['auth', CheckUserVerified::class]], function(){
        // User panel
        Route::get('/cabinet', 'Cabinet\CabinetController@index')->name('cabinet');
        Route::post('/cabinet/edit-profile', 'Cabinet\CabinetController@editProfile')->name('editprofile');
        Route::post('/cabinet/upload-avatar', 'Cabinet\CabinetController@uploadAvatar')->name('upload-avatar');
        Route::get('/cabinet/balance', 'Cabinet\BalanceController@index')->name('balance');
        Route::get('/cabinet/referrals', 'Cabinet\ReferralsController@index')->name('referrals');
        Route::get('/cabinet/all-shops', 'Cabinet\AllshopsController@index')->name('all-shops');
        Route::post('/cabinet/all-shops/pleace-a-bet', 'Cabinet\AllshopsController@pleaceABet')->name('pleace-a-bet');
        Route::get('/cabinet/your-assets', 'Cabinet\YourassetsController@index')->name('your-assets');
        Route::get('/cabinet/add-tickets', 'Cabinet\AddTicketsController@index')->name('add-tickets');
        Route::post('/cabinet/add-tickets', 'Cabinet\AddTicketsController@addTicket')->name('add-tickets');
        Route::get('/cabinet/active-tickets', 'Cabinet\ActiveTicketsController@index')->name('active-tickets');
        Route::post('/cabinet/closed-ticket', 'Cabinet\ActiveTicketsController@closedTicked')->name('closed-ticket');
        Route::get('/cabinet/active-tickets/{id}', 'Cabinet\ActiveTicketMessagesController@index');
        Route::post('/cabinet/add-message', 'Cabinet\ActiveTicketMessagesController@addMessage')->name('add-message');
        Route::post('/cabinet/add-new-message', 'Cabinet\ActiveTicketMessagesController@addNewMessage')->name('add-new-message');
        Route::get('/cabinet/closed-tickets', 'Cabinet\ClosedTicketsController@index')->name('closed-tickets');
        Route::get('/cabinet/change-password', 'Cabinet\ChangepasswordController@index')->name('change-password');
        Route::post('/cabinet/change-password', 'Cabinet\ChangepasswordController@postCredentials')->name('change-password');
        Route::get('/cabinet/balance/deposit', 'Cabinet\BalanceDepositController@index')->name('balance-deposit');
        Route::post('/cabinet/balance/deposit', 'Cabinet\BalanceDepositController@depositBalance')->name('balance-deposit');
        Route::get('/cabinet/balance/withdrawal', 'Cabinet\BalanceWithdrawalController@index')->name('balance-withdrawal');
        Route::post('/cabinet/balance/withdrawal', 'Cabinet\BalanceWithdrawalController@withdrawalBalance')->name('balance-withdrawal');
        Route::get('/cabinet/certificate', 'Cabinet\CertificateController@index')->name('certificate');

        // Admin panel
        Route::get('/admin', 'AdminPanel\AdminController@index')->name('admin');
        Route::get('/admin/amz', 'AdminPanel\AmzController@index')->name('admin-amz');
        Route::post('/admin/amz', 'AdminPanel\AmzController@addAmz')->name('admin-amz');

        Route::get('/admin/new-tikets', 'AdminPanel\NewTicketsController@index')->name('admin-new-tickets');
        Route::post('/admin/new-tikets', 'AdminPanel\NewTicketsController@toDirect')->name('admin-new-tickets');
        Route::get('/admin/my-tikets', 'AdminPanel\MyTicketsController@index')->name('admin-my-tickets');
        Route::get('/admin/message-tikets/{id}', 'AdminPanel\MyTicketsMessageController@index');
        Route::post('/admin/add-message', 'AdminPanel\MyTicketsMessageController@addMessage')->name('admin-add-message');
        Route::get('/admin/all-tikets', 'AdminPanel\AllTicketsController@index')->name('admin-all-tickets');
        Route::get('/admin/closed-tikets', 'AdminPanel\ClosedTicketsController@index')->name('admin-closed-tickets');

        Route::get('/admin/add-shops', 'AdminPanel\AddShopsController@index')->name('admin-add-shops');
        Route::post('/admin/add-shops', 'AdminPanel\AddShopsController@addShop')->name('admin-add-shops');
        Route::get('/admin/all-shops', 'AdminPanel\AllShopsController@index')->name('admin-all-shops');
        Route::post('/admin/closed-shop', 'AdminPanel\AllShopsController@closedShop')->name('admin-closed-shop');
        Route::get('/admin/shop/{id}/all-users', 'AdminPanel\AllUsersShopController@index');
        Route::get('/admin/edit-shop/{id}', 'AdminPanel\EditShopsController@index');
        Route::post('/admin/edit-shop/', 'AdminPanel\EditShopsController@editShop')->name('admin-edit-shop');
        Route::get('/admin/closed-shops','AdminPanel\ClosedShopsController@index')->name('admin-closed-shops');
        Route::post('/admin/activate-shops','AdminPanel\ClosedShopsController@activateShop')->name('activate-shops');

        Route::get('/admin/all-users', 'AdminPanel\AllUsersController@index')->name('admin-all-users');
        Route::post('/admin/closed-user', 'AdminPanel\AllUsersController@closedUser')->name('closed-user');
        Route::get('/admin/user/{id}/balance', 'AdminPanel\UserBalanceController@index');
        Route::post('/admin/arbitrary-balance-change', 'AdminPanel\UserBalanceController@arbitraryBalanceChange')->name('arbitrary-balance-change');

        Route::post('/admin/user/change-balance', 'AdminPanel\UserBalanceController@changeBalance')->name('change-balance');
        Route::get('/admin/user/{id}/edit', 'AdminPanel\EditingUserController@index');
        Route::post('/admin/editing-user', 'AdminPanel\EditingUserController@userEdit')->name('editing-user');
        Route::get('/admin/add-user', 'AdminPanel\AddUserController@index')->name('add-user');
        Route::post('/admin/add-user', 'AdminPanel\AddUserController@addUser')->name('add-user');
        Route::get('/admin/closed-users','AdminPanel\ClosedUsersController@index')->name('closed-users');
        Route::post('/admin/activate-users','AdminPanel\ClosedUsersController@activateUser')->name('activate-user');

        Route::get('/admin/users/deposit', 'AdminPanel\UsersDepositController@index')->name('users-deposit');
        Route::post('/admin/users/deposit', 'AdminPanel\UsersDepositController@depositBalance')->name('users-deposit');
        Route::get('/admin/users/withdrawal', 'AdminPanel\UsersWithdrawalController@index')->name('users-withdrawal');
        Route::post('/admin/users/withdrawal', 'AdminPanel\UsersWithdrawalController@withdrawalBalance')->name('users-withdrawal');
    });

});

// Payment
// - advcash
Route::post('/payment/advcash/status','BillPayment\AdvCashController@status')->name('adv-status');
// Route::get('/payment/advcash','BillPaymentController@advcash')->name('advcash');
// - PerfectMoney
Route::post('/payment/perfectmoney/success','BillPayment\PerfectMoneyController@success')->name('pm-success');
Route::post('/payment/perfectmoney/error','BillPayment\PerfectMoneyController@error')->name('pm-error');
Route::post('/payment/perfectmoney/status','BillPayment\PerfectMoneyController@status')->name('pm-status');
// - PayPal
// Route::post('/payment/paypal/success','BillPayment\PayPalController@success')->name('paypal-success');
// Route::post('/payment/paypal/error','BillPayment\PayPalController@error')->name('paypal-error');
Route::post('/payment/paypal/status','BillPayment\PayPalController@status')->name('paypal-status');

// - Payeer
Route::post('/payment/payeer/status','BillPayment\PayeerController@status')->name('paypal-status');

// - Btc
Route::get('/payment/btc/status','BillPayment\BtcController@status')->name('btc-status');