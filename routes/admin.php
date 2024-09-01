<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\BasicInfoController;
use App\Http\Controllers\Backend\ProfessionalController;
use App\Http\Controllers\Backend\SafetyController;
use App\Http\Controllers\Backend\PricePlanController;
use App\Http\Controllers\Backend\ServiceInfoController;
use App\Http\Controllers\BlogpageController;
use App\Http\Controllers\InformationController;

// Route::view('/admin/login', 'backend.pages.login.index');

Route::group(['prefix' => 'admin', 'middleware' => ['Is_admin', 'auth']], function () {
    Route::get('/dashboards', [AdminController::class, 'dashboards'])->name('dashboards');

    //____  Category  ____//
    Route::resource('category', CategoryController::class)->names('admin.category');
    Route::get('/get-category', [CategoryController::class, 'getData'])->name('admin.get-category');
    Route::post('/category/status', [CategoryController::class, 'adminCategoryStatus'])->name('admin.category.status');


    //____  Logo  ____//
    Route::resource('logo', LogoController::class)->names('admin.logo');
    Route::get('/get-logo', [LogoController::class, 'getData'])->name('admin.get-logo');
    Route::post('/logo/status', [LogoController::class, 'adminLogoStatus'])->name('admin.logo.status');


    //____  Banner  ____//
    Route::resource('banner', BannerController::class)->names('admin.banner');
    Route::get('/get-banner', [BannerController::class, 'getData'])->name('admin.get-banner');
    Route::post('/banner/status', [BannerController::class, 'adminBannerStatus'])->name('admin.banner.status');


    //____  Review  ____//
    Route::resource('review', ReviewController::class)->names('admin.review');
    Route::get('/get-review', [ReviewController::class, 'getData'])->name('admin.get-review');
    Route::post('/review/status', [ReviewController::class, 'adminReviewStatus'])->name('admin.review.status');

    //____  Blogs / Projects  ____//
    Route::resource('blogs', BlogpageController::class)->names('blogs');;
    Route::post('/blog/{id}', [BlogpageController::class, 'update']);
    Route::get('bloginfo', [BlogpageController::class, 'projectedata'])->name('blog.info');
    Route::get('blog/destroy/{id}', [BlogpageController::class, 'destroy']);
    Route::put('bloginfo/status', [BlogpageController::class, 'updatestatus'])->name('projectstatus');

    //____  Contact  ____//
    Route::resource('contact', ContactController::class)->names('admin.contact');
    Route::get('/get-contact', [ContactController::class, 'getData'])->name('admin.get-contact');
    Route::post('/contact/status', [ContactController::class, 'adminContactStatus'])->name('admin.contact.status');

    //____  Project  ____//
    Route::resource('project', ProjectController::class)->names('admin.project');
    Route::post('projectinfo/status', [ProjectController::class, 'adminProjectStatus'])->name('projectstatus');
    Route::get('/projectinfo/{id}', [ProjectController::class, 'index_project_service'])->name('index.project_service');
    Route::get('/get-project-data', [ProjectController::class, 'get_all_project_service'])->name('get-project.data');
    Route::get('project/destroy/{id}', [ProjectController::class, 'destroy']);

    // _____ Pages _____  //
    Route::get('information/{slug}', [InformationController::class, 'index']);
    Route::post('information/update/{slug}', [InformationController::class, 'update']);

    //____  Service Info  ____//
    Route::resource('service-info', ServiceInfoController::class)->names('admin.service-info');
    Route::post('/service-info/status', [ServiceInfoController::class, 'adminServiceInfoStatus'])->name('admin.service-info.status');
    Route::get('/service-infos/{id}', [ServiceInfoController::class, 'index_service_info'])->name('index.service.info');
    Route::get('/get-service-info-data/{id}', [ServiceInfoController::class, 'get_all_service_info'])->name('get-service-info.data');

    //____ Service  ____//
    Route::resource('service', ServiceController::class)->names('admin.service');
    Route::get('/get-service', [ServiceController::class, 'getData'])->name('admin.get-service');
    Route::post('/service/status', [ServiceController::class, 'adminServiceStatus'])->name('admin.service.status');

    //____ Price Plan  ____//
    Route::resource('price-plan', PricePlanController::class)->names('admin.price-plan');
    Route::post('/price-plan/status', [PricePlanController::class, 'adminPricePlanStatus'])->name('admin.price-plan.status');
    Route::get('/pricing/{id}', [PricePlanController::class, 'index_pricing_service'])->name('index.pricing_service');
    Route::get('/get-pricing-data', [PricePlanController::class, 'get_all_pricing_service'])->name('get-pricing.data');

    //____ BasicInfo  ____//
    Route::resource('basic-info', BasicInfoController::class)->names('admin.basic-info');


    //____ Professional  ____//
    Route::resource('professional', ProfessionalController::class)->names('admin.professional');


    //____ About  ____//
    Route::resource('about', AboutController::class)->names('admin.about');


    //____ Safety  ____//
    Route::resource('safety', SafetyController::class)->names('admin.safety');
});
