<?php

use Illuminate\Support\Facades\Route;
// use Image;
use Intervention\Image\ImageManagerStatic as Image;
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

Route::get('/', function () {
    return view('main_site.home');
});


Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";

});

Route::get('simple-qr-code', function () {
  
        $img = Image::make(public_path('assets/images/bg.png'));  
        $img->text('The quick brown fox jumps over the lazy dog.', 200, 200);

       $img->text('Hello coderMen', 500, 300, function($font) {  
          // $font->file(public_path('path/font.ttf'));  
          $font->size(1000);  
          $font->color('#fff');  
          $font->align('center');  
          $font->valign('bottom');  
          $font->angle(0);  
      });  
       $img->save(public_path('assets/images/text_with_image.jpg')); 

         $img = Image::make(public_path('assets/images/bg.png'));  
       $img->text('This is a example ', 120, 100);  
       $img->save(public_path('assets/images/text_with_image.jpg'));   
    dd('Watermark create successfully.');


// print_r($img);
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/Index', 'Frentsite@index')->name('Index');
Route::get('/about-us', 'Frentsite@about')->name('about-us');
Route::get('/affiliate', 'Frentsite@affiliate')->name('affiliate');
Route::get('/faq', 'Frentsite@faq')->name('faq');
Route::get('/legal', 'Frentsite@legal')->name('legal');
Route::get('/bank', 'Frentsite@bank')->name('bank');
Route::get('/services', 'Frentsite@service')->name('services');
Route::get('/support', 'Frentsite@support')->name('support');
Route::get('/Cron', 'Cron@index')->name('Cron');
Route::get('/global-community', 'Cron@globaly_community')->name('global-community');
Route::get('/Generate-Roi', 'Cron@Generate_roi')->name('Generate-Roi');
Route::get('/matching-bonus', 'Cron@matching_bonus')->name('matching-bonus');
Route::get('/forgot-password', 'Account@forgot_password')->name('forgot-password');
Route::post('forgot_password_submit',['as'=>'forgot_password_submit','uses'=>'Account@forgot_password_submit']);


Route::post('registers',['as'=>'registers','uses'=>'Account@register']);
Route::get('register_sucess',['as'=>'register_sucess','uses'=>'Account@index']);
Route::post('login',['as'=>'login','uses'=>'Account@login']);
Route::get('logout',['as'=>'logout','uses'=>'Account@logout']);
Route::get('user-profile',['as'=>'user-profile','uses'=>'Profile@index']);
// Route::get('bank-details',['as'=>'bank-details','uses'=>'Profile@bank_details']);
Route::get('reward-status',['as'=>'reward-status','uses'=>'Bonus@reward_status']);
Route::get('viewMessage',['as'=>'viewMessage','uses'=>'HomeController@viewMessage']);
Route::get('AddUser',['as'=>'AddUser','uses'=>'HomeController@AddUser']);
Route::get('support-message',['as'=>'support-message','uses'=>'HomeController@support_message']);
Route::get('WelcomeLetter',['as'=>'WelcomeLetter','uses'=>'HomeController@WelcomeLetter']);
Route::get('generate-ticket',['as'=>'generate-ticket','uses'=>'HomeController@generate_ticket']);
Route::get('make-deposit',['as'=>'make-deposit','uses'=>'Activation@index']);
Route::get('deposit-list',['as'=>'deposit-list','uses'=>'Activation@deposit_list']);
Route::post('SubmitActivation',['as'=>'SubmitActivation','uses'=>'Activation@SubmitActivation']);
Route::match(['get','post'],'Get-Selected-pin',['as'=>'Get-Selected-pin','uses'=>'Activation@get_all_pins_filter']);
Route::get('direct-users',['as'=>'direct-users','uses'=>'Team@Index']);
Route::get('total-users',['as'=>'total-users','uses'=>'Team@level_team']);
Route::get('Right-users',['as'=>'Right-users','uses'=>'Team@RightLeft']);
Route::get('Left-users',['as'=>'Left-users','uses'=>'Team@LeftTeam']);
Route::get('User-tree',['as'=>'User-tree','uses'=>'Team@genealogy']);
Route::match(['get','post'],'change-password',['as'=>'change-password','uses'=>'Profile@change_password_post']);
Route::match(['get','post'],'ticket-submit',['as'=>'ticket-submit','uses'=>'HomeController@Generate_ticket_submit']);
Route::match(['get','post'],'change-password-transaction',['as'=>'change-password-transaction','uses'=>'Profile@change_trxpassword_post']);
Route::get('security',['as'=>'security','uses'=>'Profile@change_password']);

Route::match(['get','post'],'update-profile',['as'=>'update-profile','uses'=>'Profile@profile_update']);
Route::get('level-bonus',['as'=>'level-bonus','uses'=>'Bonus@index']);
Route::get('club-status',['as'=>'club-status','uses'=>'Bonus@club_status']);
Route::get('direct-bonus',['as'=>'direct-bonus','uses'=>'Bonus@direct_income']);
Route::get('payment-ledger',['as'=>'payment-ledger','uses'=>'Bonus@payment_ledger']);
Route::get('royal-bonus',['as'=>'royal-bonus','uses'=>'Bonus@royal_bonus']);
Route::get('global-community-bonus',['as'=>'global-community-bonus','uses'=>'Bonus@global_community_income']);
Route::get('roi-bonus',['as'=>'roi-bonus','uses'=>'Bonus@roi_income']);
Route::get('withdraw-request',['as'=>'withdraw-request','uses'=>'WithdrawController@Index']);
Route::get('user-task',['as'=>'user-task','uses'=>'TaskController@Index']);
Route::get('withdraw-report',['as'=>'withdraw-report','uses'=>'WithdrawController@withdraw_report']);
Route::match(['get','post'],'bank-update',['as'=>'bank-update','uses'=>'Profile@bank_profile_update']);
Route::match(['get','post'],'WithdrawRequest',['as'=>'WithdrawRequest','uses'=>'WithdrawController@WithdrawRequest']);
Route::match(['get','post'],'TaskSubmit',['as'=>'TaskSubmit','uses'=>'TaskController@SubmittaskBonus']);
Route::match(['get','post'],'Update-Task-Status',['as'=>'Update-Task-Status','uses'=>'TaskController@Update_Task_Status']);
Route::match(['get','post'],'UsrBinaryReport',['as'=>'UsrBinaryReport','uses'=>'BinaryReport@userReport']);
Route::get('Task-Report',['as'=>'Task-Report','uses'=>'TaskController@TaskReports']);
Route::get('Buy-Funds',['as'=>'Buy-Funds','uses'=>'BuyFundController@index']);
Route::get('Generate-pin',['as'=>'Generate-pin','uses'=>'GeneratepinController@index']);
Route::get('Used-pin',['as'=>'Used-pin','uses'=>'GeneratepinController@usedPin']);
Route::get('AvailablePin',['as'=>'AvailablePin','uses'=>'GeneratepinController@AvailablePin']);
Route::match(['get','post'],'Submit-BuyFund',['as'=>'Submit-BuyFund','uses'=>'Activation@SubmitBuyFund']);
Route::get('pintransfered',['as'=>'pintransfered','uses'=>'GeneratepinController@pintransfered']);
Route::get('transfer-pin',['as'=>'transfer-pin','uses'=>'GeneratepinController@transfer_pin']);
Route::match(['get','post'],'tranfer-pinsubmit',['as'=>'tranfer-pinsubmit','uses'=>'GeneratepinController@pin_transfer_submit']);
Route::match(['get','post'],'CompletePayment',['as'=>'CompletePayment','uses'=>'BuyFundController@CompletePayment']);
Route::match(['get','post'],'Submit-GeneratPin',['as'=>'Submit-GeneratPin','uses'=>'GeneratepinController@SubmitGeneratPin']);
// Route::post('CompletePayment', 'BuyFundController@CompletePayment');
Route::post('getUserName',['as'=>'getUserName','uses'=>'Account@getUserNameAjax']);
// admin routes

Route::get('admin-login',['as'=>'admin-login','uses'=>'Admin_login@Index']);
Route::get('/admin_sign_out', 'Admin_login@admin_sign_out')->name('admin_sign_out');
Route::post('admin_auth_post',['as'=>'admin_auth_post','uses'=>'Admin_login@admin_login']);

Route::group(['middleware' => ['admin']], function () 
{
Route::get('admin_dashboard',['as'=>'admin_dashboard','uses'=>'AdminDashboard@Index']);
Route::get('activeusers',['as'=>'activeusers','uses'=>'AdminDashboard@activeusers']);
Route::get('deposit-request',['as'=>'deposit-request','uses'=>'AdminDashboard@deposit_request']);
Route::get('activate-user',['as'=>'activate-user','uses'=>'AdminDashboard@activate_user_view']);
Route::match(['get','post'],'activate-admin',['as'=>'activate-admin','uses'=>'AdminDashboard@activate_admin_post']);
Route::match(['get','post'],'add-user-club',['as'=>'add-user-club','uses'=>'AdminDashboard@add_user_club']);
Route::match(['get','post'],'AddTask',['as'=>'AddTask','uses'=>'AdminDashboard@AddTask']);
Route::match(['get','post'],'AddLimit',['as'=>'AddLimit','uses'=>'AdminDashboard@AddLimit']);

Route::get('users-deposit',['as'=>'users-deposit','uses'=>'AdminDashboard@deposit_list']);
Route::get('users-taskRequest',['as'=>'users-taskRequest','uses'=>'AdminDashboard@task_request']);
Route::get('Add-TaskUrl',['as'=>'Add-TaskUrl','uses'=>'AdminDashboard@add_taskUrl']);
Route::get('users-task-Reports',['as'=>'users-task-Reports','uses'=>'AdminDashboard@task_report']);
Route::get('alluserlist',['as'=>'alluserlist','uses'=>'AdminDashboard@alluserlist']);
Route::get('edit_users',['as'=>'edit_users','uses'=>'AdminDashboard@edit_users']);
Route::match(['get','post'],'update-user-profile',['as'=>'update-user-profile','uses'=>'AdminDashboard@users_profile_update']);
Route::match(['get','post'],'admin_ticket_submit',['as'=>'admin_ticket_submit','uses'=>'AdminDashboard@admin_ticket_submit']);
Route::match(['get','post'],'close_ticket_',['as'=>'close_ticket_','uses'=>'AdminDashboard@close_ticket_']);
Route::get('pin_tranfers',['as'=>'pin_tranfers','uses'=>'AdminDashboard@pin_tranfers']);
Route::get('edit_users_link', ['as' => 'edit_users_link', 'uses' => 'AdminDashboard@edit_users_link']);
Route::get('block-users', ['as' => 'block-users', 'uses' => 'AdminDashboard@block_users']);
Route::get('block-submit', ['as' => 'block-submit', 'uses' => 'AdminDashboard@block_submit']);
Route::get('LevelBonus', ['as' => 'LevelBonus', 'uses' => 'AdminDashboard@usersLevel_bonus']);
Route::get('ReferalBonus', ['as' => 'ReferalBonus', 'uses' => 'AdminDashboard@direct_referal_bonus']);
Route::get('GlobalCommunity', ['as' => 'GlobalCommunity', 'uses' => 'AdminDashboard@globalComminuty_bonus']);
Route::get('payments-ledgers', ['as' => 'payments-ledgers', 'uses' => 'AdminDashboard@payment_ledger']);
Route::get('Add-fund-Report', ['as' => 'Add-fund-Report', 'uses' => 'AdminDashboard@add_fund_report']);
Route::get('support-query', ['as' => 'support-query', 'uses' => 'AdminDashboard@support_query']);
Route::get('get_support_msg', ['as' => 'get_support_msg', 'uses' => 'AdminDashboard@get_support_msg']);
Route::get('reply_support_msg', ['as' => 'reply_support_msg', 'uses' => 'AdminDashboard@reply_support_msg']);
Route::get('Generate-pin-Report', ['as' => 'Generate-pin-Report', 'uses' => 'AdminDashboard@generatePin_report']);
Route::get('Used-pin-Report', ['as' => 'Used-pin-Report', 'uses' => 'AdminDashboard@used_pin_report']);
Route::get('available-pin-Report', ['as' => 'available-pin-Report', 'uses' => 'AdminDashboard@available_pin_report']);
Route::get('tranfer-pin-Report', ['as' => 'tranfer-pin-Report', 'uses' => 'AdminDashboard@tranferPin_report']);
Route::match(['get','post'],'pin-transfer-submit',['as'=>'pin-transfer-submit','uses'=>'AdminDashboard@pin_transfer_submit']);

Route::get('RoiBonus', ['as' => 'RoiBonus', 'uses' => 'AdminDashboard@usersRoi_bonus']);
Route::get('withdraw-request-user', ['as' => 'withdraw-request-user', 'uses' => 'AdminDashboard@withdraw_request_user']);
Route::get('withdraw-history-user', ['as' => 'withdraw-history-user', 'uses' => 'AdminDashboard@withdraw_history_user']);
Route::get('withdraw_request_done', ['as' => 'withdraw_request_done', 'uses' => 'AdminDashboard@withdraw_request_done']);
Route::get('deposit_request_done', ['as' => 'deposit_request_done', 'uses' => 'AdminDashboard@deposit_request_done']);
Route::get('task_approved_done', ['as' => 'task_approved_done', 'uses' => 'AdminDashboard@task_approved_done']);
Route::get('change-admin-password', ['as' => 'change-admin-password', 'uses' => 'AdminDashboard@change_admin_password']);
Route::post('change-password-post', ['as' => 'change-password-post', 'uses' => 'AdminDashboard@change_password_post']);




});
