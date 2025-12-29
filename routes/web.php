<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CourseStageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\SitemapController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/sobre', [PageController::class, 'about'])->name('about');
Route::get('/proposta-pedagogica', [PageController::class, 'pedagogy'])->name('pedagogy');
Route::get('/calendario', [PageController::class, 'calendar'])->name('calendar');

// sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/noticias', [NewsController::class, 'index'])->name('news.index');
Route::get('/noticias/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/corpo-docente', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/corpo-docente/{id}', [TeacherController::class, 'show'])->name('teachers.show');

Route::get('/infraestrutura', [FacilityController::class, 'index'])->name('facilities.index');
Route::get('/infraestrutura/{id}', [FacilityController::class, 'show'])->name('facilities.show');

Route::get('/eventos', [EventController::class, 'index'])->name('events.index');
Route::get('/eventos/{id}', [EventController::class, 'show'])->name('events.show');

Route::get('/matriculas', [AdmissionController::class, 'index'])->name('admissions.index');

Route::get('/contato', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contato', [ContactController::class, 'store'])->name('contact.store');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::get('/politicas/privacidade', [PolicyController::class, 'privacy'])->name('policy.privacy');

Route::prefix('etapas')->group(function () {
    Route::get('/fundamental-1', [CourseStageController::class, 'show'])->name('stages.fundamental-1')->defaults('slug','fundamental-1');
    Route::get('/fundamental-2', [CourseStageController::class, 'show'])->name('stages.fundamental-2')->defaults('slug','fundamental-2');
    Route::get('/ensino-medio', [CourseStageController::class, 'show'])->name('stages.ensino-medio')->defaults('slug','ensino-medio');
    Route::get('/pre-vestibular', [CourseStageController::class, 'show'])->name('stages.pre-vestibular')->defaults('slug','pre-vestibular');
});


// admin login (accessible to guests)
Route::get('/admin', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');

// logout
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// forbidden page for unauthorized access
Route::get('/admin/forbidden', function () {
    return view('admin.forbidden');
})->name('admin.forbidden');

Route::prefix('admin')
    ->middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':administrador|publicador'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return redirect()->route('admin.users.index');
        })->name('admin.index');

        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [UserController::class, 'create'])->middleware('role:administrador')->name('admin.users.create');
        Route::post('/users', [UserController::class, 'store'])->middleware('role:administrador')->name('admin.users.store');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');

        // CRUD Página Institucional
        Route::resource('pages', \App\Http\Controllers\Admin\PageController::class, [
            'as' => 'admin'
        ]);

        // CRUD Imagem
        Route::resource('images', \App\Http\Controllers\Admin\ImageController::class, [
            'as' => 'admin'
        ]);

        // CRUD Evento
        Route::resource('events', \App\Http\Controllers\Admin\EventController::class, [
            'as' => 'admin'
        ]);

        // CRUD Material Didático (admin)
        Route::resource('materials', \App\Http\Controllers\Admin\MaterialController::class, [
            'as' => 'admin'
        ])->middleware('role:administrador');

        // CRUD Boletim (admin)
        Route::resource('boletins', \App\Http\Controllers\Admin\BoletimController::class, [
            'as' => 'admin'
        ])->middleware('role:administrador');

        // CRUD Turma (admin)
        Route::resource('turmas', \App\Http\Controllers\Admin\TurmaController::class, [
            'as' => 'admin'
        ])->middleware('role:administrador');

        // CRUD Aluno (admin)
        Route::resource('alunos', \App\Http\Controllers\Admin\AlunoController::class, [
            'as' => 'admin'
        ])->middleware('role:administrador');
    });


