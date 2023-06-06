<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;


use Illuminate\Database\Eloquent\Factories\Factory;

Route::get('/clear', function () {
    $output = new \Symfony\Component\Console\Output\BufferedOutput();
    Artisan::call('optimize:clear', array(), $output);
    return $output->fetch();
})->name('/clear');


Route::get('queue-work', function () {
    return Illuminate\Support\Facades\Artisan::call('queue:work', ['--stop-when-empty' => true]);
});

Route::get('schedule-run', function () {
    return Illuminate\Support\Facades\Artisan::call('schedule:run');
});

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['guest']], function () {
    Route::get('register/{sponsor?}', 'Auth\RegisterController@sponsor')->name('register.sponsor');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/check', 'User\VerificationController@check')->name('check');
    Route::get('/resend_code', 'User\VerificationController@resendCode')->name('resendCode');
    Route::post('/mail-verify', 'User\VerificationController@mailVerify')->name('mailVerify');
    Route::post('/sms-verify', 'User\VerificationController@smsVerify')->name('smsVerify');
    Route::post('twoFA-Verify', 'User\VerificationController@twoFAverify')->name('twoFA-Verify');
    Route::middleware('userCheck')->group(function () {

        Route::get('/dashboard', 'User\HomeController@index')->name('home');


        Route::get('makeEscrow', 'User\HomeController@makeEscrow')->name('makeEscrow');
        Route::post('makeEscrow', 'User\HomeController@saveEscrow')->name('saveEscrow');
        Route::get('/myEscrow', 'User\HomeController@myEscrow')->name('myEscrow');
        Route::post('/escrow-confirmation/{id}', 'User\HomeController@escrowConfirmation')->name('escrowConfirmation');
        Route::post('/escrow-release/{id}', 'User\HomeController@escrowRelease')->name('escrowRelease');
        Route::post('/escrow-report/{id}', 'User\HomeController@escrowToReport')->name('escrowToReport');

        Route::get('/escrow/reports/{id}', 'User\HomeController@reports')->name('escrow.reports');


        Route::get('myContactList', 'User\HomeController@myContactList')->name('myContactList');
        Route::get('acceptRequest/{id}', 'User\HomeController@acceptRequest')->name('acceptRequest');
        Route::get('rejectRequest/{id}', 'User\HomeController@rejectRequest')->name('rejectRequest');
        Route::get('blockConnection/{id}', 'User\HomeController@blockConnection')->name('blockConnection');
        Route::get('unblockConnection/{id}', 'User\HomeController@unblockConnection')->name('unblockConnection');
        Route::post('checkContact', 'User\HomeController@checkContact')->name('checkContact');


        Route::get('add-fund', 'User\HomeController@addFund')->name('addFund');
        Route::post('add-fund', 'PaymentController@addFundRequest')->name('addFund.request');
        Route::get('addFundConfirm', 'PaymentController@depositConfirm')->name('addFund.confirm');
        Route::post('addFundConfirm', 'PaymentController@fromSubmit')->name('addFund.fromSubmit');


        //transaction
        Route::get('/transaction', 'User\HomeController@transaction')->name('transaction');
        Route::get('/transaction-search', 'User\HomeController@transactionSearch')->name('transaction.search');
        Route::get('fund-history', 'User\HomeController@fundHistory')->name('fund-history');
        Route::get('fund-history-search', 'User\HomeController@fundHistorySearch')->name('fund-history.search');

        Route::get('/profile', 'User\HomeController@profile')->name('profile');
        Route::post('/updateProfile', 'User\HomeController@updateProfile')->name('updateProfile');
        Route::put('/updateInformation', 'User\HomeController@updateInformation')->name('updateInformation');
        Route::post('/updatePassword', 'User\HomeController@updatePassword')->name('updatePassword');

        // TWO-FACTOR SECURITY
        Route::get('/twostep-security', 'User\HomeController@twoStepSecurity')->name('twostep.security');
        Route::post('twoStep-enable', 'User\HomeController@twoStepEnable')->name('twoStepEnable');
        Route::post('twoStep-disable', 'User\HomeController@twoStepDisable')->name('twoStepDisable');

        Route::group(['prefix' => 'ticket', 'as' => 'ticket.'], function () {
            Route::get('/', 'User\SupportController@index')->name('list');
            Route::get('/create', 'User\SupportController@create')->name('create');
            Route::post('/create', 'User\SupportController@store')->name('store');
            Route::get('/view/{ticket}', 'User\SupportController@ticketView')->name('view');
            Route::put('/reply/{ticket}', 'User\SupportController@reply')->name('reply');
            Route::get('/download/{ticket}', 'User\SupportController@download')->name('download');
        });

        Route::get('push-notification-show', 'SiteNotificationController@show')->name('push.notification.show');
        Route::get('push.notification.readAll', 'SiteNotificationController@readAll')->name('push.notification.readAll');
        Route::get('push-notification-readAt/{id}', 'SiteNotificationController@readAt')->name('push.notification.readAt');


        Route::get('push-chat-show/{id}', 'ChatNotificationController@show')->name('push.chat.show');
        Route::post('push-chat-newMessage', 'ChatNotificationController@newMessage')->name('push.chat.newMessage');


        Route::get('/payout', 'User\HomeController@payoutMoney')->name('payout.money');
        Route::post('/payout', 'User\HomeController@payoutMoneyRequest')->name('payout.moneyRequest');
        Route::get('/payout/preview', 'User\HomeController@payoutPreview')->name('payout.preview');
        Route::post('/payout/preview', 'User\HomeController@payoutRequestSubmit')->name('payout.submit');


        Route::get('payout-history', 'User\HomeController@payoutHistory')->name('payout.history');
        Route::get('payout-history-search', 'User\HomeController@payoutHistorySearch')->name('payout.history.search');


    });
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'Admin\LoginController@showLoginForm')->name('login');
    Route::post('/', 'Admin\LoginController@login')->name('login');
    Route::post('/logout', 'Admin\LoginController@logout')->name('logout');


    Route::get('/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('password.update');


    Route::group(['middleware' => 'auth:admin'], function () {


        Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('dashboard');

        /*====== Manage Plan=======*/
        Route::get('/escrow', 'Admin\ManageEscrowController@index')->name('escrow.index');
        Route::get('/escrow/search', 'Admin\ManageEscrowController@search')->name('escrow.search');

        Route::get('/escrow/pending', 'Admin\ManageEscrowController@pending')->name('escrow.pending');
        Route::get('/escrow/hold', 'Admin\ManageEscrowController@hold')->name('escrow.hold');
        Route::get('/escrow/completed', 'Admin\ManageEscrowController@completed')->name('escrow.completed');
        Route::get('/escrow/disputed', 'Admin\ManageEscrowController@disputed')->name('escrow.disputed');
        Route::get('/escrow/resolved', 'Admin\ManageEscrowController@resolved')->name('escrow.resolved');
        Route::get('/escrow/rejected', 'Admin\ManageEscrowController@rejected')->name('escrow.rejected');

        Route::get('/escrow/details/{id}', 'Admin\ManageEscrowController@details')->name('escrow.details');
        Route::put('/escrow/resolve/{id}', 'Admin\ManageEscrowController@resolve')->name('escrow.resolve');

        Route::get('/profile', 'Admin\DashboardController@profile')->name('profile');
        Route::put('/profile', 'Admin\DashboardController@profileUpdate')->name('profileUpdate');
        Route::get('/password', 'Admin\DashboardController@password')->name('password');
        Route::put('/password', 'Admin\DashboardController@passwordUpdate')->name('passwordUpdate');


        Route::get('push-chat-show/{id}', 'ChatNotificationController@showByAdmin')->name('push.chat.show');
        Route::post('push-chat-newMessage', 'ChatNotificationController@newMessageByAdmin')->name('push.chat.newMessage');


        Route::get('push-notification-show', 'SiteNotificationController@showByAdmin')->name('push.notification.show');
        Route::get('push.notification.readAll', 'SiteNotificationController@readAllByAdmin')->name('push.notification.readAll');
        Route::get('push-notification-readAt/{id}', 'SiteNotificationController@readAt')->name('push.notification.readAt');
        Route::match(['get', 'post'], 'pusher-config', 'SiteNotificationController@pusherConfig')->name('pusher.config');


        /*=====Payment Log=====*/
        Route::get('payment-methods', 'Admin\PaymentMethodController@index')->name('payment.methods');
        Route::post('payment-methods/deactivate', 'Admin\PaymentMethodController@deactivate')->name('payment.methods.deactivate');
        Route::get('payment-methods/deactivate', 'Admin\PaymentMethodController@deactivate')->name('payment.methods.deactivate');
        Route::post('sort-payment-methods', 'Admin\PaymentMethodController@sortPaymentMethods')->name('sort.payment.methods');
        Route::get('payment-methods/edit/{id}', 'Admin\PaymentMethodController@edit')->name('edit.payment.methods');
        Route::put('payment-methods/update/{id}', 'Admin\PaymentMethodController@update')->name('update.payment.methods');


        // Manual Methods
        Route::get('payment-methods/manual', 'Admin\ManualGatewayController@index')->name('deposit.manual.index');
        Route::get('payment-methods/manual/new', 'Admin\ManualGatewayController@create')->name('deposit.manual.create');
        Route::post('payment-methods/manual/new', 'Admin\ManualGatewayController@store')->name('deposit.manual.store');
        Route::get('payment-methods/manual/edit/{id}', 'Admin\ManualGatewayController@edit')->name('deposit.manual.edit');
        Route::put('payment-methods/manual/update/{id}', 'Admin\ManualGatewayController@update')->name('deposit.manual.update');



        Route::get('payment/pending', 'Admin\PaymentLogController@pending')->name('payment.pending');
        Route::put('payment/action/{id}', 'Admin\PaymentLogController@action')->name('payment.action');
        Route::get('payment/log', 'Admin\PaymentLogController@index')->name('payment.log');
        Route::get('payment/search', 'Admin\PaymentLogController@search')->name('payment.search');




        /*====Manage Users ====*/
        Route::get('/users', 'Admin\UsersController@index')->name('users');
        Route::get('/users/search', 'Admin\UsersController@search')->name('users.search');
        Route::post('/users-active', 'Admin\UsersController@activeMultiple')->name('user-multiple-active');
        Route::post('/users-inactive', 'Admin\UsersController@inactiveMultiple')->name('user-multiple-inactive');
        Route::get('/user/edit/{id}', 'Admin\UsersController@userEdit')->name('user-edit');
        Route::post('/user/update/{id}', 'Admin\UsersController@userUpdate')->name('user-update');
        Route::post('/user/password/{id}', 'Admin\UsersController@passwordUpdate')->name('userPasswordUpdate');
        Route::post('/user/balance-update/{id}', 'Admin\UsersController@userBalanceUpdate')->name('user-balance-update');

        Route::get('/user/send-email/{id}', 'Admin\UsersController@sendEmail')->name('send-email');
        Route::post('/user/send-email/{id}', 'Admin\UsersController@sendMailUser')->name('user.email-send');
        Route::get('/user/transaction/{id}', 'Admin\UsersController@transaction')->name('user.transaction');
        Route::get('/user/fundLog/{id}', 'Admin\UsersController@funds')->name('user.fundLog');
        Route::get('/user/payoutLog/{id}', 'Admin\UsersController@payoutLog')->name('user.withdrawal');
        Route::get('/user/escrowLog/{id}', 'Admin\UsersController@escrowLog')->name('user.escrow');


        Route::get('/email-send', 'Admin\UsersController@emailToUsers')->name('email-send');
        Route::post('/email-send', 'Admin\UsersController@sendEmailToUsers')->name('email-send.store');


        /*==========Payout Settings============*/
        Route::get('/payout-log', 'Admin\PayoutRecordController@index')->name('payout-log');
        Route::get('/payout-log/search', 'Admin\PayoutRecordController@search')->name('payout-log.search');
        Route::get('/payout-request', 'Admin\PayoutRecordController@request')->name('payout-request');
        Route::put('/payout-action/{id}', 'Admin\PayoutRecordController@action')->name('payout-action');

        Route::get('/payout-method', 'Admin\PayoutGatewayController@index')->name('payout-method');
        Route::get('/payout-method/create', 'Admin\PayoutGatewayController@create')->name('payout-method.create');
        Route::post('/payout-method/create', 'Admin\PayoutGatewayController@store')->name('payout-method.store');
        Route::get('/payout-method/{id}', 'Admin\PayoutGatewayController@edit')->name('payout-method.edit');
        Route::put('/payout-method/{id}', 'Admin\PayoutGatewayController@update')->name('payout-method.update');


        /* ====== Transaction Log =====*/
        Route::get('/transaction', 'Admin\LogController@transaction')->name('transaction');
        Route::get('/transaction-search', 'Admin\LogController@transactionSearch')->name('transaction.search');


        Route::get('/logo-seo', 'Admin\BasicController@logoSeo')->name('logo-seo');
        Route::put('/logoUpdate', 'Admin\BasicController@logoUpdate')->name('logoUpdate');
        Route::put('/seoUpdate', 'Admin\BasicController@seoUpdate')->name('seoUpdate');
        Route::get('/breadcrumb', 'Admin\BasicController@breadcrumb')->name('breadcrumb');
        Route::put('/breadcrumb', 'Admin\BasicController@breadcrumbUpdate')->name('breadcrumbUpdate');


        Route::get('/basic-controls', 'Admin\BasicController@index')->name('basic-controls');
        Route::post('/basic-controls', 'Admin\BasicController@updateConfigure')->name('basic-controls.update');

        Route::get('/email-controls', 'Admin\EmailTemplateController@emailControl')->name('email-controls');
        Route::post('/email-controls', 'Admin\EmailTemplateController@emailConfigure')->name('email-controls.update');


        Route::get('/email-template', 'Admin\EmailTemplateController@show')->name('email-template.show');
        Route::get('/email-template/edit/{id}', 'Admin\EmailTemplateController@edit')->name('email-template.edit');
        Route::post('/email-template/update/{id}', 'Admin\EmailTemplateController@update')->name('email-template.update');


        /*========Sms control ========*/
        Route::match(['get', 'post'], '/sms-controls', 'Admin\SmsTemplateController@smsConfig')->name('sms.config');
        Route::get('/sms-template', 'Admin\SmsTemplateController@show')->name('sms-template');
        Route::get('/sms-template/edit/{id}', 'Admin\SmsTemplateController@edit')->name('sms-template.edit');
        Route::post('/sms-template/update/{id}', 'Admin\SmsTemplateController@update')->name('sms-template.update');


        Route::get('/notify-config', 'Admin\NotifyController@notifyConfig')->name('notify-config');
        Route::post('/notify-config', 'Admin\NotifyController@notifyConfigUpdate')->name('notify-config.update');
        Route::get('/notify-template', 'Admin\NotifyController@show')->name('notify-template.show');
        Route::get('/notify-template/edit/{id}', 'Admin\NotifyController@edit')->name('notify-template.edit');
        Route::post('/notify-template/update/{id}', 'Admin\NotifyController@update')->name('notify-template.update');


        /* ===== Support Ticket ====*/
        Route::get('tickets/{status?}', 'Admin\TicketController@tickets')->name('ticket');
        Route::get('tickets/view/{id}', 'Admin\TicketController@ticketReply')->name('ticket.view');
        Route::put('ticket/reply/{id}', 'Admin\TicketController@ticketReplySend')->name('ticket.reply');
        Route::get('ticket/download/{ticket}', 'Admin\TicketController@ticketDownload')->name('ticket.download');
        Route::post('ticket/delete', 'Admin\TicketController@ticketDelete')->name('ticket.delete');

        /* ===== Subscriber =====*/
        Route::get('subscriber', 'Admin\SubscriberController@index')->name('subscriber.index');
        Route::post('subscriber/remove', 'Admin\SubscriberController@remove')->name('subscriber.remove');
        Route::get('subscriber/send-email', 'Admin\SubscriberController@sendEmailForm')->name('subscriber.sendEmail');
        Route::post('subscriber/send-email', 'Admin\SubscriberController@sendEmail')->name('subscriber.mail');


        /* ===== ADMIN Language SETTINGS ===== */
        Route::get('language', 'Admin\LanguageController@index')->name('language.index');
        Route::get('language/create', 'Admin\LanguageController@create')->name('language.create');
        Route::post('language/create', 'Admin\LanguageController@store')->name('language.store');
        Route::get('language/{language}', 'Admin\LanguageController@edit')->name('language.edit');
        Route::put('language/{language}', 'Admin\LanguageController@update')->name('language.update');
        Route::delete('language/{language}', 'Admin\LanguageController@delete')->name('language.delete');
        Route::get('/language/keyword/{id}', 'Admin\LanguageController@keywordEdit')->name('language.keywordEdit');
        Route::put('/language/keyword/{id}', 'Admin\LanguageController@keywordUpdate')->name('language.keywordUpdate');
        Route::post('/language/importJson', 'Admin\LanguageController@importJson')->name('language.importJson');
        Route::post('store-key/{id}', 'Admin\LanguageController@storeKey')->name('language.storeKey');
        Route::put('update-key/{id}', 'Admin\LanguageController@updateKey')->name('language.updateKey');
        Route::delete('delete-key/{id}', 'Admin\LanguageController@deleteKey')->name('language.deleteKey');


        /* ===== ADMIN TEMPLATE SETTINGS ===== */
        Route::get('template/{section}', 'Admin\TemplateController@show')->name('template.show');
        Route::put('template/{section}/{language}', 'Admin\TemplateController@update')->name('template.update');
        Route::get('contents/{content}', 'Admin\ContentController@index')->name('content.index');
        Route::get('content-create/{content}', 'Admin\ContentController@create')->name('content.create');
        Route::put('content-create/{content}/{language?}', 'Admin\ContentController@store')->name('content.store');
        Route::get('content-show/{content}/{name?}', 'Admin\ContentController@show')->name('content.show');
        Route::put('content-update/{content}/{language?}', 'Admin\ContentController@update')->name('content.update');
        Route::delete('contents/{id}', 'Admin\ContentController@contentDelete')->name('content.delete');

    });

});


Route::match(['get', 'post'], 'success', 'PaymentController@success')->name('success');
Route::match(['get', 'post'], 'failed', 'PaymentController@failed')->name('failed');
Route::match(['get', 'post'], 'payment/{code}/{trx?}/{type?}', 'PaymentController@gatewayIpn')->name('ipn');


Route::get('/language/{code?}', 'FrontendController@language')->name('language');


Route::get('/blog-details/{slug}/{id}', 'FrontendController@blogDetails')->name('blogDetails');
Route::get('/blog', 'FrontendController@blog')->name('blog');

Route::get('/', 'FrontendController@index')->name('home');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/faq', 'FrontendController@faq')->name('faq');


Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('/contact', 'FrontendController@contactSend')->name('contact.send');

Route::post('/subscribe', 'FrontendController@subscribe')->name('subscribe');

Route::get('/{getLink}/{content_id}', 'FrontendController@getLink')->name('getLink');




