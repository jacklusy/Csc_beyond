<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\UseCouponController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Middleware\RedirectIfAuthenticated;
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

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/',[IndexController::class,'Index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard',[UserController::class,'UserDashboard'])->
    name('dashboard');

    Route::post('/user/profile/store',[UserController::class,'UserProfileStore'])->
    name('user.profile.store');

    Route::get('/user/logout',[UserController::class,'UserDestroy'])->
    name('user.logout');

    

}); // Group Middleware End




require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->
    name('adminDash');

    Route::get('/admin/logout',[AdminController::class,'AdminDestroy'])->
    name('admin.logout');

    Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->
    name('admin.profile');


    ///// page All User ////

    Route::get('/user/index/', [AdminController::class,'index'])->name('user.index');

    Route::post('/user/store/', [AdminController::class,'UserStore'])->name('user.store');

    Route::get('/user/{id}/edit/', [AdminController::class,'UserEdit'])->name('user.edit');

    Route::post('/user/In/Active/', [AdminController::class,'In_Active'])->name('user.In.Active');

    Route::post('/user/Active/', [AdminController::class,'Active'])->name('user.Active');
    
    Route::delete('/user/delete/{id}/', [AdminController::class,'UserDelete'])->name('user.delete');
    
    ///// page Courses ////

    Route::get('/course/index/', [AdminController::class,'CourseIndex'])->name('course.index');

    Route::post('/Courses/store/', [AdminController::class,'CoursesStore'])->name('Courses.store');

    Route::post('/Member/store/', [AdminController::class,'MemberStore'])->name('Member.store');
    
    Route::get('/Student/Mark/', [AdminController::class,'StudentMark'])->name('student.mark');
    
    Route::get('/student-all/ajax/{AllCourse}', [AdminController::class,'StudentAllAjax']);

    Route::get('/student-get/ajax/{courses_id}', [AdminController::class,'CoursesGetAjax']);

    Route::post('/student/store/Mark/', [AdminController::class,'StudentStoreMark'])->name('Student.Store.Mark');


    
    ///// page Chat ////

    Route::get('/admin/chat',[AdminController::class,'AdminChat'])->
    name('adminChat');

    Route::post('/message/send/store/', [AdminController::class,'MessageSendStore'])->name('message.send.store');

    Route::get('/receiver/get/data/{receiver_id}', [AdminController::class,'ReceiverGetData']);

    Route::get('/receiver/message/{receiver_id}/{sender_id}', [AdminController::class,'ReceiverMessage']);

    Route::get('/sender/message/{receiver_id}/{sender_id}', [AdminController::class,'SenderMessage']);


});

Route::get('/admin/login',[AdminController::class,'AdminLogin'])->middleware(RedirectIfAuthenticated::class);

Route::middleware(['auth','role:admin'])->group(function(){
    
   
   

}); // admin End Middleware


Route::middleware(['auth','role:user'])->group(function(){

    Route::get('/user/chat',[UserController::class,'UserChat'])->
    name('UserChat');

    Route::get('User/Same/Course', [UserController::class,'UserSameCourse'])->name('user.same.course');



  
}); // End Middleware


