<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AssemblyController;
use App\Http\Controllers\ProgramController as FrontProgramController;
use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\VolunteerApplicationController;

use App\Http\Controllers\Dashboard\VolunteerOpportunityController;
use App\Http\Controllers\Dashboard\VolunteerApplicationController as DashboardVolunteerApplicationController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\HeroController;
use App\Http\Controllers\Dashboard\AboutController as DashboardAboutController;
use App\Http\Controllers\Dashboard\AchievementController;
use App\Http\Controllers\Dashboard\FounderController;
use App\Http\Controllers\Dashboard\ProgramController as DashboardProgramController;
use App\Http\Controllers\Dashboard\AssemblyMemberController;
use App\Http\Controllers\Dashboard\BoardMemberController;
use App\Http\Controllers\Dashboard\AdvisorController as DashboardAdvisorController;
use App\Http\Controllers\Dashboard\OrganizationalStructureController;
use App\Http\Controllers\Dashboard\GovernanceDocumentController;

use App\Models\VolunteerOpportunity;

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/about', [AboutController::class, 'index'])
    ->name('about');

Route::get('/assembly', [AssemblyController::class, 'index'])
    ->name('assembly');

Route::get('/board', [BoardController::class, 'index'])
    ->name('board');

Route::get('/executive', [ExecutiveController::class, 'index'])
    ->name('executive');

Route::get('/advisor', [AdvisorController::class, 'index'])
    ->name('advisor');

Route::get('/structure', [StructureController::class, 'index'])
    ->name('structure');

Route::get('/programs', [FrontProgramController::class, 'index'])
    ->name('programs');

Route::get('/volunteer', function () {

    $opportunity = VolunteerOpportunity::where('is_active', true)
        ->latest()
        ->first();

    return view('pages.volunteer', compact('opportunity'));

})->name('volunteer');

Route::post('/volunteer/apply', [VolunteerApplicationController::class, 'store'])
    ->name('volunteer.apply');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/governance', function () {

    $documents = GovernanceDocument::where('is_active', true)
        ->latest()
        ->get();

    return view('pages.governance', compact('documents'));

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

    Route::resource(
        '/dashboard/founders',
        FounderController::class
    )->names('dashboard.founders');

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

    Route::resource(
        '/dashboard/board-members',
        BoardMemberController::class
    )->names('dashboard.board');

    Route::get('/dashboard/advisor', [DashboardAdvisorController::class, 'index'])
        ->name('dashboard.advisor');

    Route::get('/dashboard/advisor/create', [DashboardAdvisorController::class, 'create'])
        ->name('dashboard.advisor.create');

    Route::post('/dashboard/advisor', [DashboardAdvisorController::class, 'store'])
        ->name('dashboard.advisor.store');

    Route::get('/dashboard/advisor/{advisor}/edit', [DashboardAdvisorController::class, 'edit'])
        ->name('dashboard.advisor.edit');

    Route::put('/dashboard/advisor/{advisor}', [DashboardAdvisorController::class, 'update'])
        ->name('dashboard.advisor.update');

    Route::delete('/dashboard/advisor/{advisor}', [DashboardAdvisorController::class, 'destroy'])
        ->name('dashboard.advisor.destroy');

Route::resource(
    '/dashboard/governance',
    GovernanceDocumentController::class
)->except(['show'])
->names('dashboard.governance');



    Route::resource(
        '/dashboard/organizational-structure',
        OrganizationalStructureController::class
    )->names('dashboard.organizational-structure');

    Route::resource(
        '/dashboard/volunteer',
        VolunteerOpportunityController::class
    )->names('dashboard.volunteer');

    Route::get(
        '/dashboard/volunteer-applications',
        [DashboardVolunteerApplicationController::class, 'index']
    )->name('dashboard.volunteer.applications.index');

    Route::get(
        '/dashboard/volunteer-applications/{volunteerApplication}',
        [DashboardVolunteerApplicationController::class, 'show']
    )->name('dashboard.volunteer.applications.show');

    Route::put(
        '/dashboard/volunteer-applications/{volunteerApplication}',
        [DashboardVolunteerApplicationController::class, 'update']
    )->name('dashboard.volunteer.applications.update');

    Route::delete(
        '/dashboard/volunteer-applications/{volunteerApplication}',
        [DashboardVolunteerApplicationController::class, 'destroy']
    )->name('dashboard.volunteer.applications.destroy');
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