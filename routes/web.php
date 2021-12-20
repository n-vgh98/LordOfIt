<?php

use App\Http\Controllers\Admin\AdminCoursesController;
use App\Http\Controllers\Admin\AdminCoursesSliderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\AdminFooterContentController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminFooterController;
use App\Http\Controllers\Admin\AdminFooterLinkController;
use App\Http\Controllers\Admin\AdminFooterTitleController;
use App\Http\Controllers\Admin\AdminOurTeamController;
use App\Http\Controllers\Admin\AdminOurTeamSliderController;
use App\Http\Controllers\Admin\AdminUserController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

// admin routing
route::prefix("admin")->middleware("auth", "admin")->group(function () {
    route::get("/", [AdminDashboard::class, "index"])->name("admin.home");

    // admin can do users operation throw this routes##
    route::prefix("users")->group(function () {
        route::get("/", [AdminUserController::class, "index"])->name("admin.users");
        route::post("/store", [AdminUserController::class, "store"])->name("admin.users.store");
        route::post("/update/{id}", [AdminUserController::class, "update"])->name("admin.users.update");
        route::post("/status/block/{id}", [AdminUserController::class, "block"])->name("admin.users.block");
        route::post("/status/unblock/{id}", [AdminUserController::class, "unblock"])->name("admin.users.unblock");
        // dadane dastresi admin
        route::post("/promotetoadmin/{id}", [AdminUserController::class, "promotetoadmin"])->name("admin.promote");

        // hazfe dastresi admin
        route::post("/demoteadmin/{id}", [AdminUserController::class, "demoteadmin"])->name("admin.demote");

        // hazfe dastresi writer
        route::post("/demotewriter/{id}", [AdminUserController::class, "demotewriter"])->name("writer.demote");

        // dadane dastresi writer
        route::post("/promotetowriter/{id}", [AdminUserController::class, "promotetowriter"])->name("writer.promote");

        // hazfe tamame dastresi ha
        route::post("/clearroles/{id}", [AdminUserController::class, "clearroles"])->name("admin.user.clear.roles");


        route::delete("/destroy/{id}", [AdminUserController::class, "destroy"])->name("admin.users.destroy");
        route::prefix("normal")->group(function () {
            route::get("/", [AdminUserController::class, "normal"])->name("admin.normal.users");
        });
        route::prefix("writer")->group(function () {
            route::get("/", [AdminUserController::class, "writer"])->name("admin.writer.users");
        });
        route::prefix("admin")->group(function () {
            route::get("/", [AdminUserController::class, "admin"])->name("admin.admin.users");
        });
    });
    // ##

    //route for articles
    Route::resource('articles', AdminArticleController::class);
    route::post("articles/updateimage/{id}", [AdminArticleController::class, "updateimage"])->name("admin.article.update.image");
     
    
    // routes for footer
    route::prefix("footer")->group(function () {
        route::get("/", [AdminFooterController::class, "index"])->name("admin.footer.index");

        // route for titles of footer
        route::prefix("titles")->group(function () {
            route::get("/", [AdminFooterTitleController::class, "index"])->name("admin.footer.titles.index");
            route::post("/unblock/{id}", [AdminFooterTitleController::class, "block"])->name("admin.footer.titles.block");
            route::post("/block/{id}", [AdminFooterTitleController::class, "unblock"])->name("admin.footer.titles.unblock");
            route::delete("/destroy/{id}", [AdminFooterTitleController::class, "destroy"])->name("admin.footer.titles.destroy");
            route::post("/update/{id}", [AdminFooterTitleController::class, "update"])->name("admin.footer.titles.update");
            route::post("/store", [AdminFooterTitleController::class, "store"])->name("admin.footer.titles.store");
        });

        // route for content of footer
        route::prefix("content")->group(function () {
            route::get("/", [AdminFooterContentController::class, "index"])->name("admin.footer.content.index");
            route::get("/show/{id}", [AdminFooterContentController::class, "show"])->name("admin.footer.content.show");
            route::delete("/destroy/{id}", [AdminFooterContentController::class, "destroy"])->name("admin.footer.content.destroy");
            route::post("/update/{id}", [AdminFooterContentController::class, "update"])->name("admin.footer.content.update");
            route::post("/store", [AdminFooterContentController::class, "store"])->name("admin.footer.content.store");
        });

        // route for links of social media for footer
        route::prefix("links")->group(function () {
            route::get("/", [AdminFooterLinkController::class, "index"])->name("admin.footer.links.index");
            route::delete("/destroy/{id}", [AdminFooterLinkController::class, "destroy"])->name("admin.footer.links.destroy");
            route::post("/update/{id}", [AdminFooterLinkController::class, "update"])->name("admin.footer.links.update");
            route::post("/store", [AdminFooterLinkController::class, "store"])->name("admin.footer.links.store");
        });
    });



    // routes for our team
    route::prefix("ourteam")->group(function () {
        route::get("/", [AdminOurTeamController::class, "index"])->name("admin.ourteam.index");
        route::post("/store", [AdminOurTeamController::class, "store"])->name("admin.ourteam.store");
        route::post("/updateimage/{id}", [AdminOurTeamController::class, "updateimage"])->name("admin.ourteam.update.image");
        route::post("/update/{id}", [AdminOurTeamController::class, "update"])->name("admin.ourteam.update");
        route::delete("/destroy/{id}", [AdminOurTeamController::class, "destroy"])->name("admin.ourteam.destroy");
        route::post("/update/{id}", [AdminOurTeamController::class, "update"])->name("admin.ourteam.update");

        // route for slider of ourteam page
        route::prefix("slider")->group(function () {
            route::get("/", [AdminOurTeamSliderController::class, "index"])->name("admin.ourteam.slider.index");
            route::post("/store", [AdminOurTeamSliderController::class, "store"])->name("admin.ourteam.slider.store");
            route::post("/update/{id}", [AdminOurTeamSliderController::class, "update"])->name("admin.ourteam.slider.update");
            route::delete("/destroy/{id}", [AdminOurTeamSliderController::class, "destroy"])->name("admin.ourteam.slider.destroy");
        });
    });

    // routes for courses
    route::prefix("courses")->group(function () {
        route::get("/", [AdminCoursesController::class, "index"])->name("admin.courses.index");
        route::get("/create", [AdminCoursesController::class, "create"])->name("admin.courses.create");
        route::get("/edit/{id}", [AdminCoursesController::class, "edit"])->name("admin.courses.edit");
        route::post("/store", [AdminCoursesController::class, "store"])->name("admin.courses.store");
        route::post("/updateimage/{id}", [AdminCoursesController::class, "updateimage"])->name("admin.courses.update.image");
        route::post("/update/{id}", [AdminCoursesController::class, "update"])->name("admin.courses.update");
        route::delete("/destroy/{id}", [AdminCoursesController::class, "destroy"])->name("admin.courses.destroy");
        route::post("/update/{id}", [AdminCoursesController::class, "update"])->name("admin.courses.update");

        // route for slider of ourteam page
        route::prefix("slider")->group(function () {
            route::get("/", [AdminCoursesSliderController::class, "index"])->name("admin.courses.slider.index");
            route::post("/store", [AdminCoursesSliderController::class, "store"])->name("admin.courses.slider.store");
            route::post("/update/{id}", [AdminCoursesSliderController::class, "update"])->name("admin.courses.slider.update");
            route::delete("/destroy/{id}", [AdminCoursesSliderController::class, "destroy"])->name("admin.courses.slider.destroy");
        });
    });
});
