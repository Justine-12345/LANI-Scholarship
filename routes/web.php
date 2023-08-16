<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */
// "Route" is called Faced
// Route::get('/xample', function () {
//     return view('lani.gcash');
// });

Route::get('/',['uses' => 'MainController@visitor' , 'as'=>'visitor']);
Route::get('/email_index',['uses' => 'MailController@index' , 'as'=>'email_index']);
Route::post('/email_send',['uses' => 'MailController@send' , 'as'=>'email_send']);
Route::post('/check',['uses' => 'MainController@check' , 'as'=>'check']);
Route::get('/logout',['uses' => 'MainController@logout' , 'as'=>'logout']);
//Function for validation of email for password resetting
Route::post('/validate_password',['uses' => 'MainController@validatepassword' , 'as'=>'validatepassword']);
//Function for reseting password
Route::post('/reset_password',['uses' => 'MainController@resetpassword' , 'as'=>'resetpassword']);

//*******Route Group Scholar*********
Route::group(['middleware'=>['AuthCheck']], function(){

Route::get('/login',['uses' => 'MainController@login' , 'as'=>'login']);
Route::get('/userhome',['uses' => 'MainController@home' , 'as'=>'userhome']);

//View for entering email for recovery
Route::get('/forgot_password',['uses' => 'MainController@forgotpassword' , 'as'=>'forgotpassword']);

//View if generated link recieve via email 
Route::get('/confirm_password/{token?}/{email?}', function($token = " " , $email = " "){
$data['token'] = $token;
$data['email'] = $email;
return View::make('auth.passwords.reset',$data);
});



Route::resource('application', ApplicationController::class);
Route::resource('scholar', ScholarController::class);
Route::resource('post', 'PostController');
Route::resource('comment', 'CommentController');

Route::get('/about',['uses' => 'MainController@about' , 'as'=>'about']);
Route::get('/scholar/announcement/section',['uses' => 'AnnouncementController@scholarAnnounce' , 'as'=>'scholarAnnounce']);

});
//********End route group scholar***************


Route::post('/checkAdmin',['uses' => 'MainControllerAdmin@check' , 'as'=>'checkAdmin']);
//Function for validation of email for password resetting
Route::post('/validate_passwordAdmin',['uses' => 'MainControllerAdmin@validatepassword' , 'as'=>'validatepasswordAdmin']);

Route::post('/register_admin',['uses' => 'MainControllerAdmin@registerAdmin' , 'as'=>'registerAdmin']);

//Function for reseting password
Route::post('/reset_passwordAdmin',['uses' => 'MainControllerAdmin@resetpassword' , 'as'=>'resetpasswordAdmin']);
Route::get('/logoutAdmin',['uses' => 'MainControllerAdmin@logout' , 'as'=>'logoutAdmin']);
//********Start route group admin***************
Route::group(['middleware'=>['AdminAuth']], function(){
Route::resource('announcement', 'AnnouncementController');
Route::resource('entry', 'EntryController');
Route::resource('admin', 'AdminController');
Route::resource('transaction', 'TransactionController');

Route::get('/login/admin/',['uses' => 'MainControllerAdmin@login' , 'as'=>'loginAdmin']);

//View for entering email for recovery
Route::get('/forgot_passwordAdmin',['uses' => 'MainControllerAdmin@forgotpassword' , 'as'=>'forgotpasswordAdmin']);

//View if generated link recieve via email 
Route::get('/confirm_passwordAdmin/{token?}/{email?}', function($token = " " , $email = " "){
$data['token'] = $token;
$data['email'] = $email;
return View::make('auth.passwords.resetAdmin',$data);
});
Route::get('/userhomeAdmin',['uses' => 'MainControllerAdmin@home' , 'as'=>'userhomeAdmin']);

Route::post('/admin/sort',['uses' => 'AdminController@sort' , 'as'=>'sort']);
Route::get('/admin/add_member/{id}',['uses' => 'AdminController@accept' , 'as'=>'accept']);
Route::get('/admin/postAdmin/allPost',['uses' => 'PostController@indexAdmin' , 'as'=>'indexAdmin']);
Route::get('/admin/scholar/profile/{id}',['uses' => 'ScholarController@showToAdmin' , 'as'=>'showToAdmin']);
Route::post('/admin/scholar/sort',['uses' => 'ScholarController@sort' , 'as'=>'scholarSort']);
Route::get('/admin/add_scholar/{id}',['uses' => 'ScholarController@accept' , 'as'=>'acceptScholar']);
Route::resource('submission', 'SubmissionController');
Route::get('/scholar_status/{type}/',['uses' => 'AdminPanelController@scholarStatus' , 'as'=>'scholarStatus']);
Route::get('/no_of_application/{id}','AdminPanelController@noOfApplication');

Route::get('/admin/about/section',['uses' => 'MainControllerAdmin@about' , 'as'=>'aboutAdmin']);
Route::get('/admin/tras/findQR/{id}',['uses' => 'TransactionController@find' , 'as'=>'find']);
Route::get('/admin/tras/gcash/{id}',['uses' => 'TransactionController@gcash' , 'as'=>'gcash']);
});
//********End route group admin***************


//Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
?>