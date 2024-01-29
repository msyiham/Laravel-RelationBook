<?php

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\ConnectPointController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcomeCustom');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//admin
Route::prefix('admin')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [DashboardAdminController::class, 'showUser'])->name('admin.users');

    Route::prefix('school')->name('admin.school.')->group(function () {
        Route::get('/', [SchoolController::class, 'index'])->name('index');
        Route::get('/create', [SchoolController::class, 'create'])->name('create');
        Route::post('/store', [SchoolController::class, 'store'])->name('store');
        Route::post('/update/{school}', [SchoolController::class, 'update'])->name('update');
        Route::get('/destroy/{school}', [SchoolController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{school}', [SchoolController::class, 'edit'])->name('edit');
    });

    Route::prefix('information')->name('admin.information.')->group(function () {
        Route::get('/', [InformationController::class, 'index'])->name('index');
        Route::get('/create', [InformationController::class, 'create'])->name('create');
        Route::post('/store', [InformationController::class, 'store'])->name('store');
        Route::put('/update/{school}', [InformationController::class, 'update'])->name('update');
        Route::get('/destroy/{school}', [InformationController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{school}', [InformationController::class, 'edit'])->name('edit');
    });

    Route::prefix('indicator')->name('admin.indicator.')->group(function () {
        Route::get('/', [IndicatorController::class, 'index'])->name('index');
        Route::get('/create', [IndicatorController::class, 'create'])->name('create');
        Route::post('/store', [IndicatorController::class, 'store'])->name('store');
        Route::post('/update/{indicator}', [IndicatorController::class, 'update'])->name('update');
        Route::get('/destroy/{indicator}', [IndicatorController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{indicator}', [IndicatorController::class, 'edit'])->name('edit');
    });

    Route::prefix('class-room')->name('admin.class-room.')->group(function () {
        Route::get('/', [ClassRoomController::class, 'index'])->name('index');
        Route::get('/create', [ClassRoomController::class, 'create'])->name('create');
        Route::post('/store', [ClassRoomController::class, 'store'])->name('store');
        Route::post('/update/{classRoom}', [ClassRoomController::class, 'update'])->name('update');
        Route::get('/destroy/{classRoom}', [ClassRoomController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{classRoom}', [ClassRoomController::class, 'edit'])->name('edit');
    });
});



//teacher
Route::prefix('teacher')->middleware(['auth', 'verified', 'role:teacher'])->group(function () {
    Route::get('/', [InformationController::class, 'show'])->name('teacher.dashboard');
    Route::get('/list-name-evaluations', [EvaluationController::class, 'listName'])->name('evaluations.listName');
    Route::get('/input-evaluation/{user}', [EvaluationController::class, 'create'])->name('evaluations.create');
    Route::post('/save-evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');
    Route::get('/evaluations', [EvaluationController::class, 'showListName'])->name('evaluations.showListName');
    Route::get('/show-evaluation/{user}', [EvaluationController::class, 'showEvaluationAt'])->name('evaluations.showEvaluationAt');
    Route::get('/detail-evaluation/{id}', [EvaluationController::class, 'show'])->name('evaluations.detail');

    Route::get('/list-name', [ConnectPointController::class, 'listName'])->name('connectPoint.listName');
    Route::get('/input-point/{user}', [ConnectPointController::class, 'create'])->name('connectPoint.create');
    Route::post('/save-point', [ConnectPointController::class, 'store'])->name('connectPoint.store');
    Route::get('/list-month', [ConnectPointController::class, 'showAllMonths'])->name('teacher.listMonth');
    Route::get('/list-month/{month}', [ConnectPointController::class, 'showByMonth'])->name('teacher.listDate');
    Route::get('/list-name/{date}', [ConnectPointController::class, 'showNamesByDate'])->name('teacher.listName');
    Route::get('/detail-point/{id}', [ConnectPointController::class, 'showConnectPoint'])->name('teacher.detailPoint');
    Route::get('/tandai-dibaca/{commentId}', [ConnectPointController::class, 'tandaiDibaca'])->name('comment.tandai-dibaca.guru');
});


//student
Route::prefix('student')->middleware(['auth', 'verified', 'role:student'])->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student.index');
    Route::get('/list-month', [StudentController::class, 'showAllMonths'])->name('student.listMonth');
    Route::get('/list-date/{month}', [StudentController::class, 'showByMonth'])->name('student.listDate');
    Route::get('/detail/{month}', [StudentController::class, 'showConnectPoint'])->name('student.detail');
    Route::post('/simpan-tanggapan', [StudentController::class, 'simpanTanggapan'])->name('simpan.tanggapan');
    Route::get('/tandai-dibaca/{commentId}', [ConnectPointController::class, 'tandaiDibaca'])->name('comment.tandai-dibaca.siswa');

    Route::get('/list-date-evaluation', [StudentController::class, 'showEvaluation'])->name('student.showEvaluation');
    Route::get('/evaluation/{id}', [StudentController::class, 'detailEvaluation'])->name('student.detailEvaluation');
});


//auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
