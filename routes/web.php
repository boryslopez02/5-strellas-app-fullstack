<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewerAddProfile;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SuscriptionController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\StoreSuscriptionController;
use App\Http\Controllers\StorePackController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlockUserController;

Auth::routes();

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('auth.login');
});

// ADMIN
Route::middleware(['auth', 'admin.auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard-admin');
    })->name('admin.dashboard');

    Route::get('/suscriptions', function () {
        return view('admin.managment-suscriptions');
    })->name('admin.suscriptions');

    Route::get('/users', function () {
        return view('admin.managment-users');
    })->name('admin.users');

    Route::get('/offers', function () {
        return view('admin.managment-offers');
    })->name('admin.offers');

    // Route::get('/account', function () {
    //     return view('reviewer.account');
    // })->name('reviewer.account');

    // Route::get('/store', function () {
    //     return view('reviewer.store');
    // })->name('reviewer.store');
    
});

// EMPLOYEE
Route::middleware(['auth', 'employee.auth'])->prefix('employee')->group(function () {

    Route::get('/dashboard', function () {
        return view('employee.dashboard-employee');
    })->name('employee.dashboard');

    Route::get('/account', function () {
        return view('employee.managment-account');
    })->name('employee.account');

    Route::get('/managment-stories', function () {
        return view('employee.managment-stories');
    })->name('employee.managment-stories');

    Route::get('/managment-payments', function () {
        return view('employee.managment-payments');
    })->name('employee.managment-payments');

    Route::get('/managment-customers', function () {
        return view('employee.managment-customers');
    })->name('employee.managment-customers');

    Route::get('/managment-reviewers', function () {
        return view('employee.managment-reviewers');
    })->name('employee.managment-reviewers');

    Route::get('/help', function () {
        return view('employee.help');
    })->name('employee.help');

});
// END EMPLOYEE

// REVIEWERS
Route::middleware(['auth', 'reviewer.auth'])->prefix('reviewer')->group(function () {

    Route::get('/dashboard', function () {
        return view('reviewer.dashboard-reviewer');
    })->name('reviewer.dashboard');

    Route::get('/profile', function () {
        return view('reviewer.profile');
    })->name('reviewer.profile');

    Route::get('/account', function () {
        return view('reviewer.account');
    })->name('reviewer.account');

    Route::get('/store', function () {
        return view('reviewer.store');
    })->name('reviewer.store'); 

    Route::get('/help', function () {
        return view('reviewer.help');
    })->name('reviewer.help');
    
});
// END REVIEWERS

// BUSINESS
Route::middleware(['auth', 'business.auth'])->prefix('business')->group(function () {

    Route::get('/dashboard', function () {
        return view('business.dashboard-business');
    })->name('business.dashboard');

    Route::get('/profile', function () {
        return view('business.profile');
    })->name('business.profile');

    Route::get('/orders', function () {
        return view('business.orders');
    })->name('business.orders');

    Route::get('/account', function () {
        return view('business.account');
    })->name('business.account');

    Route::get('/shopping', function () {
        return view('business.shopping');
    })->name('business.shopping');

    Route::get('/store', function () {
        return view('business.store');
    })->name('business.store');

    Route::get('/help', function () {
        return view('business.help');
    })->name('business.help');
    
});
// END BUSINESS

/*---------------- RESOURCES ----------------*/

// OFFERS RESOURCE
Route::resource('/offers', OfferController::class);

// PROMOTIONS RESOURCE
Route::resource('/promotions', PromotionController::class);

// SUSCRIPTIONS RESOURCE
Route::resource('/users', UserController::class);

// SUSCRIPTIONS RESOURCE
Route::resource('/suscriptions', SuscriptionController::class);

// STORE SUSCRIPTIONS RESOURCE
Route::resource('/store-suscriptions', StoreSuscriptionController::class);

// STORE PACKS RESOURCE
Route::resource('/store-packs', StorePackController::class);

// PACKS RESOURCE
Route::resource('/packs', PackController::class);

// PROFILES RESOURCE
Route::resource('/profile', ReviewerAddProfile::class);

// ACCOUNT RESOURCE
Route::resource('/account', AccountController::class);

// BLOCK USERS RESOURCE
Route::put('/block/{id}', [BlockUserController::class, 'block']);

Route::put('/desblock/{id}', [BlockUserController::class, 'desblock']);

/* STATIC ROUTES */
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/faqs', function () {
    return view('faqs');
})->name('faqs');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/guide', function () {
    return view('guide');
})->name('guide');

Route::get('/affiliates', function () {
    return view('affiliates');
})->name('affiliates');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/legal', function () {
    return view('legal');
})->name('legal');