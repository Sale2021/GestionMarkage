<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TuteurController;
use App\Http\Controllers\UserController;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Tuteur;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $student = Student::count();
        $tuteur = Tuteur::count();
        $payment = Payment::with('students')->withSum('students as totaux', 'payment_student.montant')->pluck('totaux')->sum();

        return view('dashboard', compact('student', 'tuteur', 'payment'));
    })->name('dashboard');

    Route::resource('student', StudentController::class)->except('create', 'show');
    Route::resource('payment', PaymentController::class)->except('create', 'show');
    Route::resource('tuteur', TuteurController::class)->except('create', 'show');
    Route::resource('user', UserController::class)->except('create', 'show');
    Route::get('payment/print/{payment}', [PaymentController::class, 'print'])->name('print');
});
require __DIR__.'/auth.php';
