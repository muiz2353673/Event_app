<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Models\Event;

Route::get('/', function () {
    return redirect('/login'); // Redirect to the login page
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Dashboard Route: Display events created by the logged-in user
    Route::get('/dashboard', function () {
        $events = Event::where('user_id', auth()->id())->paginate(5); // Fetch user's events with pagination
        return view('dashboard', compact('events'));
    })->name('dashboard');

    // Profile Management
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update');

    // Event Resource Routes
    Route::resource('events', EventController::class);
});
