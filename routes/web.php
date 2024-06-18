<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TuteurController;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Tuteur;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $student = Student::count();
    $tuteur = Tuteur::count();
    $payment = Payment::sum('montant');

    return view('dashboard', compact('student', 'tuteur', 'payment'));
})->name('dashboard');

Route::resource('student', StudentController::class)->except('create', 'show');
Route::resource('payment', PaymentController::class)->except('create', 'show');
Route::resource('tuteur', TuteurController::class)->except('create', 'show');
