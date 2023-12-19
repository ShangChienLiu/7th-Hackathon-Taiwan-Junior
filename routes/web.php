<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailController;

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


// Home - Mainpage
Route::get('/', function () {
    return view('mainpage');
});

// Rent
Route::resource('/rent', RentController::class);

// Volunterr
Route::get('/volunteer', [VolunteerController::class, 'index'])->name('volunteer');

Route::post('/volunteer/find', [VolunteerController::class, 'Find']);

Route::post('/volunteer/be', [VolunteerController::class, 'Be']);


// FAQ
Route::get('/faq', function () {
    return view('faq');
});

Auth::routes();

// Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
// Route::resource('user', UserController::class);('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::get('/dashboard/IT_eqpt/waited_check', [AdminController::class, 'IT_eqpt_waited_check'])->name('admin::waited_check');

Route::get('/dashboard/IT_eqpt/finished_check', [AdminController::class, 'IT_eqpt_finished_check'])->name('admin::finished_check');

Route::post('/dashboard/IT_eqpt/upload_progress', [AdminController::class, 'IT_eqpt_upload_progress'])->name('admin::upload_progress');

Route::get('/dashboard/FindVolunteer/waited_check', [AdminController::class, 'FindVolunteer_waited_check'])->name('FindVolunteer::waited_check');

Route::get('/dashboard/FindVolunteer/finished_check', [AdminController::class, 'FindVolunteer_finished_check'])->name('FindVolunteer::finished_check');

Route::post('/dashboard/FindVolunteer/upload_progress', [AdminController::class, 'FindVolunteer_upload_progress'])->name('FindVolunteer::upload_progress');

Route::get('/dashboard/BeVolunteer/waited_check', [AdminController::class, 'BeVolunteer_waited_check'])->name('BeVolunteer::waited_check');

Route::get('/dashboard/BeVolunteer/waited_level', [AdminController::class, 'BeVolunteer_waited_level'])->name('BeVolunteer::waited_level');

Route::post('/dashboard/BeVolunteer/upload_level', [AdminController::class, 'BeVolunteer_upload_level'])->name('BeVolunteer::upload_level');

Route::get('/dashboard/BeVolunteer/levelup', [AdminController::class, 'BeVolunteer_levelup'])->name('BeVolunteer::levelup');

Route::post('/dashboard/BeVolunteer/resign', [AdminController::class, 'BeVolunteer_resign'])->name('BeVolunteer::resign');

Route::get('/dashboard/system', [AdminController::class, 'system'])->name('system::system');

Route::post('/dashboard/be_volunteer_status', [AdminController::class, 'be_volunteer_status'])->name('system::be_volunteer_status');

Route::post('/dashboard/system_config', [AdminController::class, 'system_config'])->name('system::config');

Route::post('/dashboard/find_volunteer_status', [AdminController::class, 'find_volunteer_status'])->name('system::find_volunteer_status');

Route::get('/dashboard/result', [AdminController::class, 'result'])->name('system::result');

// Route::get('/mail/{type}', function () {
//     $to = "lokk9063@gmail.com";
//     $flag = Mail::send('mail.welcome', array('name' => "Hand"), function ($message) use ($to) {
//         $message->to($to)->subject('國立中正大學社團活動場地借用申請審查結果');
//     });
// });

Route::get('/mail/send_mail', [MailController::class, 'welcome']);
