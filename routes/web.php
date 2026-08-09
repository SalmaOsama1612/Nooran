<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AssemblyController;
use App\Http\Controllers\ProgramController as FrontProgramController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\HeroController;
use App\Http\Controllers\Dashboard\AboutController as DashboardAboutController;
use App\Http\Controllers\Dashboard\AchievementController;
use App\Http\Controllers\Dashboard\FounderController;
use App\Http\Controllers\Dashboard\ProgramController as DashboardProgramController;
use App\Http\Controllers\Dashboard\AssemblyMemberController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/assembly', [AssemblyController::class, 'index'])->name('assembly');

Route::get('/board', function () {
    return view('pages.board');
})->name('board');

Route::get('/executive', function () {
    return view('pages.executive');
})->name('executive');

Route::get('/advisor', function () {
    return view('pages.advisor');
})->name('advisor');

Route::get('/structure', function () {
    return view('pages.structure');
})->name('structure');

Route::get('/programs', [FrontProgramController::class, 'index'])
    ->name('programs');

Route::get('/volunteer', function () {
    return view('pages.volunteer');
})->name('volunteer');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/governance', function () {
    return view('pages.governance');
})->name('governance');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/hero', [HeroController::class, 'index'])
        ->name('dashboard.hero');

    Route::post('/dashboard/hero/update', [HeroController::class, 'update'])
        ->name('dashboard.hero.update');

    Route::get('/dashboard/about', [DashboardAboutController::class, 'edit'])
        ->name('dashboard.about.edit');

    Route::put('/dashboard/about', [DashboardAboutController::class, 'update'])
        ->name('dashboard.about.update');

    Route::get('/dashboard/achievement', [AchievementController::class, 'index'])
        ->name('dashboard.achievement');

    Route::post('/dashboard/achievement/update', [AchievementController::class, 'update'])
        ->name('dashboard.achievement.update');

    Route::delete('/dashboard/achievement/image/{id}', [AchievementController::class, 'deleteImage'])
        ->name('dashboard.achievement.image.delete');

    Route::resource('/dashboard/founders', FounderController::class)
        ->names('dashboard.founders');

    Route::get('/dashboard/programs', [DashboardProgramController::class, 'index'])
        ->name('dashboard.programs.index');

    Route::get('/dashboard/programs/create', [DashboardProgramController::class, 'create'])
        ->name('dashboard.programs.create');

    Route::post('/dashboard/programs/store', [DashboardProgramController::class, 'store'])
        ->name('dashboard.programs.store');

    Route::get('/dashboard/programs/{program}/edit', [DashboardProgramController::class, 'edit'])
        ->name('dashboard.programs.edit');

    Route::put('/dashboard/programs/{program}', [DashboardProgramController::class, 'update'])
        ->name('dashboard.programs.update');

    Route::delete('/dashboard/programs/{program}', [DashboardProgramController::class, 'destroy'])
        ->name('dashboard.programs.destroy');

    Route::resource(
        '/dashboard/assembly-members',
        AssemblyMemberController::class
    )->names('dashboard.assembly');
});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';