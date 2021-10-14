<?php

use App\Http\Controllers\Quiz\AuthenticatedSessionController as QuizAuthenticatedController;
use App\Http\Controllers\Quiz\QuizController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Livewire + Blade
Route::get('/quiz', function () {
    return view("index");
});


// Inertia + Vue
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/quiz', function () {
//     return Inertia::render('Quiz/Index', []);
// });


Route::get('/start', [QuizAuthenticatedController::class, 'create'])->middleware('guestquiz')->name('start');
Route::post('/start', [QuizAuthenticatedController::class, 'store'])->middleware('guestquiz');

Route::get('/quiz', [QuizController::class, 'index'])->middleware(['authquiz', 'verified'])->name('quiz');
Route::post('/quiz/answer', [QuizController::class, 'store'])->middleware(['authquiz', 'verified'])->name('quiz.answer');
Route::post('/quiz/delete', [QuizController::class, 'delete'])->middleware(['authquiz', 'verified'])->name('quiz.delete');




// LP Home
// LP Form Access
// Obrigado
// Que pena

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// User Admin
Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');



// Questions
// Answers
// Results


require __DIR__.'/auth.php';
