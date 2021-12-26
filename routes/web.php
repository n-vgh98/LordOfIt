<?php

use App\Http\Controllers\Admin\AdminAboutUsController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminCoursesController;
use App\Http\Controllers\Admin\AdminCoursesSliderController;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\AdminFooterContentController;
use App\Http\Controllers\Admin\AdminFooterController;
use App\Http\Controllers\Admin\AdminFooterLinkController;
use App\Http\Controllers\Admin\AdminFooterTitleController;
use App\Http\Controllers\Admin\AdminOurTeamController;
use App\Http\Controllers\Admin\AdminOurTeamSliderController;
use App\Http\Controllers\Admin\AdminServicecategoryController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminServicePriceCategoryController;
use App\Http\Controllers\Admin\AdminServicePriceController;
use App\Http\Controllers\Admin\AdminServicePriceSubcategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminWorkSample;
use App\Http\Controllers\Admin\AdminWorkSampleCategory;
use App\Http\Controllers\User\HomeController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

route::get("/", function () {
    return redirect()->route("home");
})->middleware("language");

route::get("/fa", function () {
    return redirect()->route("home", "fa");
})->name("fa");

route::get("/en", function () {
    return redirect()->route("home", "en");
})->name("en");

Route::prefix('/{locale}/home')->middleware("language")->group(function () {
    route::get("/", [HomeController::class, "index"])->name("home");

});

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
    // Route::resource("articles/{lang}", AdminArticleController::class);
    route::prefix("articles")->group(function () {
        route::get("/{lang}", [AdminArticleController::class, "index"])->name("admin.articles.index");
        route::get("/create/{lang}", [AdminArticleController::class, "create"])->name("admin.articles.create");
        route::post("/store", [AdminArticleController::class, "store"])->name("admin.articles.store");
        route::get("/edit/{id}", [AdminArticleController::class, "edit"])->name("admin.articles.edit");
        route::patch("update/{id}", [AdminArticleController::class, "update"])->name("admin.articles.update");
        route::delete("destroy/{id}", [AdminArticleController::class, "destroy"])->name("admin.articles.destroy");
        route::post("articles/updateimage/{id}", [AdminArticleController::class, "updateimage"])->name("admin.article.update.image");

    });

    // routes for footer
    route::prefix("footer")->group(function () {
        route::get("/", [AdminFooterController::class, "index"])->name("admin.footer.index");

        // route for titles of footer
        route::prefix("titles")->group(function () {
            route::get("/{lang}", [AdminFooterTitleController::class, "index"])->name("admin.footer.titles.index");
            route::post("/unblock/{id}", [AdminFooterTitleController::class, "block"])->name("admin.footer.titles.block");
            route::post("/block/{id}", [AdminFooterTitleController::class, "unblock"])->name("admin.footer.titles.unblock");
            route::delete("/destroy/{id}", [AdminFooterTitleController::class, "destroy"])->name("admin.footer.titles.destroy");
            route::post("/update/{id}", [AdminFooterTitleController::class, "update"])->name("admin.footer.titles.update");
            route::post("/store", [AdminFooterTitleController::class, "store"])->name("admin.footer.titles.store");
        });

        // route for content of footer
        route::prefix("content")->group(function () {
            route::get("/{lang}", [AdminFooterContentController::class, "index"])->name("admin.footer.content.index");
            route::get("/show/{id}", [AdminFooterContentController::class, "show"])->name("admin.footer.content.show");
            route::delete("/destroy/{id}", [AdminFooterContentController::class, "destroy"])->name("admin.footer.content.destroy");
            route::post("/update/{id}", [AdminFooterContentController::class, "update"])->name("admin.footer.content.update");
            route::post("/store", [AdminFooterContentController::class, "store"])->name("admin.footer.content.store");
        });

        // route for links of social media for footer
        route::prefix("links")->group(function () {
            route::get("/{lang}", [AdminFooterLinkController::class, "index"])->name("admin.footer.links.index");
            route::delete("/destroy/{id}", [AdminFooterLinkController::class, "destroy"])->name("admin.footer.links.destroy");
            route::post("/update/{id}", [AdminFooterLinkController::class, "update"])->name("admin.footer.links.update");
            route::post("/store", [AdminFooterLinkController::class, "store"])->name("admin.footer.links.store");
        });
    });

    // routes for our team
    route::prefix("ourteam")->group(function () {
        route::get("/{lang}", [AdminOurTeamController::class, "index"])->name("admin.ourteam.index");
        route::post("/store", [AdminOurTeamController::class, "store"])->name("admin.ourteam.store");
        route::post("/updateimage/{id}", [AdminOurTeamController::class, "updateimage"])->name("admin.ourteam.update.image");
        route::post("/update/{id}", [AdminOurTeamController::class, "update"])->name("admin.ourteam.update");
        route::delete("/destroy/{id}", [AdminOurTeamController::class, "destroy"])->name("admin.ourteam.destroy");
        // route for slider of ourteam page
        route::prefix("slider")->group(function () {
            route::get("/{lang}", [AdminOurTeamSliderController::class, "index"])->name("admin.ourteam.slider.index");
            route::post("/store", [AdminOurTeamSliderController::class, "store"])->name("admin.ourteam.slider.store");
            route::post("/update/{id}", [AdminOurTeamSliderController::class, "update"])->name("admin.ourteam.slider.update");
            route::delete("/destroy/{id}", [AdminOurTeamSliderController::class, "destroy"])->name("admin.ourteam.slider.destroy");
        });
    });

    // routes for courses
    route::prefix("courses")->group(function () {
        route::get("/{lang}", [AdminCoursesController::class, "index"])->name("admin.courses.index");
        route::get("/create/{lang}", [AdminCoursesController::class, "create"])->name("admin.courses.create");
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

    //route for about_us
    Route::resource("about_us", AdminAboutUsController::class);
    route::post("about_us/updateimage/{id}", [AdminAboutUsController::class, "updateimage"])->name("admin.about_us.update.image");

    //route for services
    Route::resource('services', AdminServiceController::class);
    Route::resource('services_categories', AdminServiceCategoryController::class);
    route::post("services/updateimage/{id}", [AdminServiceController::class, "updateimage"])->name("admin.services.update.image");

    // routes for services prices
    route::prefix("service-prices")->group(function () {
        route::get("/create/{id}", [AdminServicePriceController::class, "create"])->name("admin.services.price.create");
        route::post("/store", [AdminServicePriceController::class, "store"])->name("admin.services.price.store");
        route::get("/edit/{id}", [AdminServicePriceController::class, "edit"])->name("admin.services.price.edit");
        route::get("/show/{id}", [AdminServicePriceController::class, "show"])->name("admin.services.price.show");
        route::post("/update/{id}", [AdminServicePriceController::class, "update"])->name("admin.services.price.update");
        route::delete("/destroy/{id}", [AdminServicePriceController::class, "destroy"])->name("admin.services.price.destroy");
        route::post("/showinmenu/{id}", [AdminServicePriceController::class, "showinenu"])->name("admin.services.price.showinenu");
        route::post("/unshow/{id}", [AdminServicePriceController::class, "unshow"])->name("admin.services.price.unshow");

        // route for service price categories
        route::prefix("service-prices-category")->group(function () {
            route::get("/{lang}", [AdminServicePriceCategoryController::class, "index"])->name("admin.services.price.category.index");
            route::get("/create/{lang}", [AdminServicePriceCategoryController::class, "create"])->name("admin.services.price.category.create");
            route::post("/store", [AdminServicePriceCategoryController::class, "store"])->name("admin.services.price.category.store");
            route::get("/edit/{id}", [AdminServicePriceCategoryController::class, "edit"])->name("admin.services.price.category.edit");
            route::post("/update/{id}", [AdminServicePriceCategoryController::class, "update"])->name("admin.services.price.category.update");
            route::delete("/destroy/{id}", [AdminServicePriceCategoryController::class, "destroy"])->name("admin.services.price.category.destroy");
        });

        // route for service price subcategories
        route::prefix("service-prices-subcategory")->group(function () {
            route::get("/", [AdminServicePriceSubcategoryController::class, "index"])->name("admin.services.price.subcategory.index");
            route::get("/create/{id}", [AdminServicePriceSubcategoryController::class, "create"])->name("admin.services.price.subcategory.create");
            route::post("/store", [AdminServicePriceSubcategoryController::class, "store"])->name("admin.services.price.subcategory.store");
            route::get("/edit/{id}", [AdminServicePriceSubcategoryController::class, "edit"])->name("admin.services.price.subcategory.edit");
            route::get("/show/{id}", [AdminServicePriceSubcategoryController::class, "show"])->name("admin.services.price.subcategory.show");
            route::post("/update/{id}", [AdminServicePriceSubcategoryController::class, "update"])->name("admin.services.price.subcategory.update");
            route::delete("/destroy/{id}", [AdminServicePriceSubcategoryController::class, "destroy"])->name("admin.services.price.subcategory.destroy");
        });
    });

    // routes for comments
    route::prefix("comments")->group(function () {
        route::get("/", [AdminCommentController::class, "index"])->name("admin.comments.index");
        route::post("/accept/{id}", [AdminCommentController::class, "accept"])->name("admin.comments.accept");
        route::post("/decline/{id}", [AdminCommentController::class, "decline"])->name("admin.comments.decline");
        route::delete("/destroy/{id}", [AdminCommentController::class, "destroy"])->name("admin.comments.destroy");
    });

    // routes for services prices
    route::prefix("work_samples")->group(function () {
        route::get("/", [AdminWorkSample::class, "index"])->name("admin.work_samples.index");
        route::get("/create/{id}", [AdminWorkSample::class, "create"])->name("admin.work_samples.create");
        route::get("/edit/{id}", [AdminWorkSample::class, "edit"])->name("admin.work_samples.edit");
        route::post("/update/{id}", [AdminWorkSample::class, "update"])->name("admin.work_samples.update");
        route::post("/updateimage/{id}", [AdminWorkSample::class, "updateimage"])->name("admin.work_samples.update.image");
        route::post("/store", [AdminWorkSample::class, "store"])->name("admin.work_samples.store");
        route::delete("/destroy/{id}", [AdminWorkSample::class, "destroy"])->name("admin.work_samples.destroy");

        // route for service price categories
        route::prefix("categories")->group(function () {
            route::get("/{lang}", [AdminWorkSampleCategory::class, "index"])->name("admin.work_samples.category.index");
            route::post("/store", [AdminWorkSampleCategory::class, "store"])->name("admin.work_samples.category.store");
            route::post("/update/{id}", [AdminWorkSampleCategory::class, "update"])->name("admin.work_samples.category.update");
            route::get("/show/{id}", [AdminWorkSampleCategory::class, "show"])->name("admin.work_samples.category.show");
            route::delete("/destroy/{id}", [AdminWorkSampleCategory::class, "destroy"])->name("admin.work_samples.category.destroy");
        });
    });
});
