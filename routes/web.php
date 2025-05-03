<?php

use App\Models\Blog;
use App\Models\Corevalue;
use App\Models\Our_water;
use App\Models\em_message;
use App\Models\Ourcompany;
use App\Models\Companyinfo;
use App\Models\Accreditation;
use App\Models\Vissionmission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\OurwaterController;
use App\Http\Controllers\CorevalueController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\OurcompanyController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\FronEnd\HomController;
use App\Http\Controllers\AccrediationController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VisionmissionController;
use App\Http\Controllers\FronEnd\BlogController as FronEndBlogController;
use App\Http\Controllers\FronEnd\ContactController as FronEndContactController;
use App\Http\Controllers\ThemesettingController;

// use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('front-end.index');
// })->name('user.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



/*
***********************************
*********** ADMIN PANEL ***********
***********************************
*/
    Route::post('/login-save', [LoginController::class, 'login'])->name('login.save');
    Route::prefix('/admin/')->middleware(['setwebbrowser','auth'])->group(function(){

        Route::get('/profile', [AccountController::class, 'index'])->name('profile');
        Route::get('/profile/password', [AccountController::class, 'password'])->name('profile.password');
        Route::post('/profile/password/save', [AccountController::class, 'change'])->name('password.change');


        // Route::resource('permissions', [PermissionController::class,]);
        // Route::resource('permissions', PermissionController::class);
        Route::post('/permissions/{id}/delete', [PermissionController::class, 'destroy']);
        Route::post('/permissions/{id}/update', [PermissionController::class, 'update']);


        Route::get('/', [DashboardController::class, 'index'])->name('/');
        Route::get('/home', [DashboardController::class, 'index'])->name('/');
        Route::get('/index', [DashboardController::class, 'index'])->name('/');
        Route::get('/default', [DashboardController::class, 'index'])->name('/');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('/');

        Route::get('/company-info', [CompanyController::class, 'index'])->name('company.index');
        Route::post('/company-info/save', [CompanyController::class, 'save'])->name('company.save');

        Route::get('/social-media', [CompanyController::class, 'social'])->name('company.social');
        Route::post('/social/save', [CompanyController::class, 'socialSave'])->name('social.save');
        Route::post('/social/{id}/delete', [CompanyController::class, 'delete'])->name('social.delete');
        Route::post('/social/{id}/status', [CompanyController::class, 'status'])->name('social.status');

        Route::get('/social/edit/{id}', [CompanyController::class, 'editForm'])->name('social.edit');        
        Route::post('/social/edit/save/{id}', [CompanyController::class, 'edit'])->name('social.doedit');       
        // Route::post('/social/update', [CompanyController::class, 'update'])->name('social.update');    
        
        Route::get('/about/overview', [AboutController::class, 'index'])->name('about.index');
        Route::get('/about/overview/edit', [AboutController::class, 'edit'])->name('about.edit');
        Route::post('/about/overview/edit/save', [AboutController::class, 'store'])->name('about.doEdit');
        
        Route::get('/about/about-us', [OurcompanyController::class, 'index'])->name('about.company');
        Route::get('/about/about-us/our-company/edit', [OurcompanyController::class, 'edit'])->name('ourcompany.edit');
        Route::post('/about/about-us/our-company/edit/save', [OurcompanyController::class, 'doEdit'])->name('ourcompany.doEdit');




        Route::get('/about/about-us/message/add', [MessageController::class, 'add'])->name('message.add');
        Route::post('/about/about-us/message/add/save', [MessageController::class, 'save'])->name('message.save');
        Route::post('/about/about-us/message/{id}/delete', [MessageController::class, 'delete'])->name('message.delete');
        Route::post('/about/about-us/message/{id}/status', [MessageController::class, 'status'])->name('message.status');
        Route::get('/about/about-us/message/{id}/edit', [MessageController::class, 'edit'])->name('message.edit');
        Route::post('/about/about-us/message/{id}/edit/save', [MessageController::class, 'doEdit'])->name('message.doEdit');

        Route::get('/about/about-us/vision&mission/edit', [VisionmissionController::class, 'edit'])->name('visionmission.edit');
        Route::post('/about/about-us/vision&mission/doEdit', [VisionmissionController::class, 'doEdit'])->name('visionmission.doEdit');



        Route::get('/about/about-us/core-value/add', [CorevalueController::class, 'add'])->name('corevalue.add');
        Route::post('/about/about-us/core-value/add/save', [CorevalueController::class, 'save'])->name('corevalue.save');
        Route::post('/about/about-us/core-value/{id}/delete', [CorevalueController::class, 'delete'])->name('corevalue.delete');
        Route::post('/about/about-us/core-value/{id}/status', [CorevalueController::class, 'status'])->name('corevalue.status');
        Route::get('/about/about-us/core-value/{id}/edit', [CorevalueController::class, 'edit'])->name('corevalue.edit');
        Route::post('/about/about-us/core-value/{id}/doEdit', [CorevalueController::class, 'doEdit'])->name('corevalue.doEdit');



        Route::get('/about/about-us/accreditation/add', [AccrediationController::class, 'add'])->name('accreditation.add');
        Route::post('/about/about-us/accreditation/add/save', [AccrediationController::class, 'save'])->name('accreditation.save');
        Route::post('/about/about-us/accreditation/{id}/delete', [AccrediationController::class, 'delete'])->name('accreditation.delete');
        Route::get('/about/about-us/accreditation/{id}/edit', [AccrediationController::class, 'edit'])->name('accreditation.edit');
        Route::post('/about/about-us/accreditation/{id}/doEdit', [AccrediationController::class, 'doEdit'])->name('accreditation.doEdit');
        


        Route::get('/our-water', [OurwaterController::class, 'index'])->name('our-water');
        Route::post('/our-water/save', [OurwaterController::class,'save'])->name('water.save');
        Route::post('/our-water/delete/{id}', [OurwaterController::class,'delete'])->name('water.delete');
        Route::post('/our-water/status/{id}', [OurwaterController::class,'status'])->name('water.status');
        Route::get('/our-water/{id}/edit', [OurwaterController::class,'getForm'])->name('water.edit');
        Route::post('/our-water/edit/{id}/save', [OurwaterController::class,'doEdit'])->name('water.doEdit');


        Route::get('/home-page/society',[SocietyController::class, 'index'])->name('home.society');
        Route::get('/home-page/society/post',[SocietyController::class, 'post'])->name('society.post');
        Route::post('/home-page/add',[SocietyController::class, 'add'])->name('society.add');

        Route::post('/home-page/society/post/{id}/delete', [SocietyController::class, 'delete'])->name('society.delete');
        Route::post('/home-page/society/post/{id}/status', [SocietyController::class, 'status'])->name('society.status');
        Route::get('/home-page/society/post/{id}/edit', [SocietyController::class, 'edit'])->name('society.edit');
        Route::post('/home-page/society/post/{id}/edit/save', [SocietyController::class, 'doEdit'])->name('society.doEdit');

        Route::get('/home-page/award',[AwardController::class, 'index'])->name('home.award');
        Route::get('/home-page/award/post',[AwardController::class, 'post'])->name('award.post');
        Route::post('/home-page/add',[AwardController::class, 'add'])->name('award.add');

        Route::post('/home-page/award/post/{id}/delete', [AwardController::class, 'delete'])->name('award.delete');
        Route::post('/home-page/award/post/{id}/status', [AwardController::class, 'status'])->name('award.status');
        Route::get('/home-page/award/post/{id}/edit', [AwardController::class, 'edit'])->name('award.edit');
        Route::post('/home-page/award/post/{id}/edit/save', [AwardController::class, 'doEdit'])->name('award.doEdit');

        Route::get('event',[EventController::class, 'index'])->name('event.index');
        Route::get('event/post',[EventController::class, 'post'])->name('event.post');
        Route::post('add',[EventController::class, 'add'])->name('event.add');

        Route::post('event/post/{id}/delete', [EventController::class, 'delete'])->name('event.delete');
        Route::post('event/post/{id}/status', [EventController::class, 'status'])->name('event.status');
        Route::get('event/post/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
        Route::post('event/post/{id}/edit/save', [EventController::class, 'doEdit'])->name('event.doEdit');


        Route::get('/home-page/silde',[SlideshowController::class, 'index'])->name('home.slide');
        Route::post('/home-page/slide/post', [SlideshowController::class, 'post'])->name('slide.post');
        Route::post('/home-page/slide/{id}/delete', [SlideshowController::class, 'delete'])->name('slide.delete');
        Route::post('/home-page/slide/{id}/status', [SlideshowController::class, 'status'])->name('slide.status');
        Route::get('/home-page/slide/{id}/edit', [SlideshowController::class, 'edit'])->name('slide.edit');
        Route::post('/home-page/slide/{id}/edit/save', [SlideshowController::class, 'doEdit'])->name('slide.doEdit');


        Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/blog/post', [BlogController::class, 'post'])->name('blog.post');
        Route::post('/blog/post/save', [BlogController::class, 'save'])->name('blog.save');
        Route::post('/blog/post/{id}/delete', [BlogController::class, 'delete'])->name('blog.delete');
        Route::post('/blog/post/{id}/status', [BlogController::class, 'status'])->name('blog.status');
        Route::get('/blog/post/{id}/detail', [BlogController::class, 'detail'])->name('blog.showdetail');
        
        Route::get('/blog/post/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('/blog/post/{id}/doEdit', [BlogController::class, 'doEdit'])->name('blog.doEdit');

        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

        Route::get('/users', [Usercontroller::class, 'index'])->name('user.index');
        Route::get('/users/add', [Usercontroller::class, 'add'])->name('user.add');
        Route::post('/users/add/save', [Usercontroller::class, 'save'])->name('user.save');
        Route::get('/users/{id}/edit', [Usercontroller::class, 'edit'])->name('user.edit');
        Route::post('/users/{id}/edit/save', [Usercontroller::class, 'doEdit'])->name('user.doEdit');
        Route::post('/users/{id}/reset/password', [Usercontroller::class, 'resetPass'])->name('user.resetPass');
        Route::post('/users/{id}/user/block', [Usercontroller::class, 'block'])->name('user.block');
        Route::post('/users/{id}/user/delete', [Usercontroller::class, 'delete'])->name('user.delete');


        Route::get('/theme/setting', [ThemesettingController::class, 'index'])->name('theme.index');
        Route::post('/theme/setting/save', [ThemesettingController::class, 'save'])->name('theme.save');

        // Route::get('/users/logout', [Usercontroller::class, 'edit'])->name('user.logout');
        Route::get('/logout', [Usercontroller::class, 'logout'])
        ->name('user.logout');






    });

   

/*
***********************************
*********** ADMIN PANEL ***********
***********************************
*/












        Route::get('/', [HomController::class, 'index'])->name('user.home');

        Route::get('/services', function () {
            return view('front-end.service');
        })->name('services');

        Route::get('/contact', function () {
            return view('front-end.contact');
        })->name('contact');

        Route::get('/water', function () {
            $data['waters'] = Our_water::where('active_status', 1)->get();
            return view('front-end.water', $data);
        })->name('water');

        Route::get('/about', function () {
            
            $data['ourcomapny'] = Ourcompany::where('active_status', 1)->first();
            $data['messages'] = em_message::where('active_status', 1)->get();
            $data['missionvision' ] = Vissionmission::where('active_status', 1)->first();
            $data['corevalues'] = Corevalue::where('active_status',1)->get();
            $data['accreditations'] = Accreditation::where('active_status', 1)->get();
            return view('front-end.about', $data);
        })->name('about');

        Route::middleware('setlanguage')->group(function(){

            Route::get('/', [HomController::class, 'index'])->name('user.home');
    
            Route::get('/services', function () {
                return view('front-end.service');
            })->name('services');
    
            Route::get('/contact', function () {
                return view('front-end.contact');
            })->name('contact');
    
            Route::get('/water', function () {
                $data['waters'] = Our_water::where('active_status', 1)->get();
                return view('front-end.water', $data);
            })->name('water');

            Route::get('/event', function () {
                return view('front-end.event');
            })->name('event');
            
            Route::get('/about', function () {
                
                $data['ourcomapny'] = Ourcompany::where('active_status', 1)->first();
                $data['messages'] = em_message::where('active_status', 1)->get();
                $data['missionvision' ] = Vissionmission::where('active_status', 1)->first();
                $data['corevalues'] = Corevalue::where('active_status',1)->get();
                $data['accreditations'] = Accreditation::where('active_status', 1)->get();
                return view('front-end.about', $data);
            })->name('about');
    
            Route::get('/blog', function () {
                $data['blogs'] = Blog::where('active_status', 1)->get();
                return view('front-end.blog', $data);
            })->name('blog');
    
            Route::get('/blog-detail/{id}', [FronEndBlogController::class, 'detail'])->name('blog.detail');
            
            Route::get('/career', function () {
                return view('front-end.career');
            })->name('career');
    
            Route::get('/contact', function () {
                $data['company'] = Companyinfo::first();
    
                return view('front-end.contact-new', $data);
            })->name('contact');
    
            Route::post('/contact/save', [FronEndContactController::class, 'save'])->name('contact.save');
            Route::get('/set-lang/{lang}', [HomController::class, 'setLanguage'])->name('user.set_lang');
    
    
        });
    











require __DIR__.'/auth.php';
