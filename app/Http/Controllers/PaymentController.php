<?php

namespace App\Http\Controllers;

use App\Helper\DeleteAction;
use App\Http\Requests\StorePaymentRequest;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    use DeleteAction;

    public function print(Payment $payment)
    {

        $payment->loadSum('students as totaux', 'payment_student.montant');

        return view('invoice', compact('payment'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Payment::with('students')->get();

        $student = Student::all();

        return view('payment.index', compact('rows', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create(['user_id' => Auth::user()->id]);
        $remise = $request->remise ? 35000 - $request->remise : 35000;
        $payment->students()->attach($request->student_id, ['quantity' => $request->mois, 'montant' => $remise * $request->mois]);

        foreach ($payment->students as $item) {
            if ($item->payment) {
                $date = new Carbon($item->payment);
                $item->update(['payment' => $date->addMonth(intval($request->mois))]);
            } else {
                $date = new Carbon($item->register);
                $item->update(['payment' => $date->addMonth(intval($request->mois))]);
            }
        }
        $payment->generateId();
        toastr()->success('Payment ajouter avec success!');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $student = Student::all();

        return view('payment.update', compact('payment', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->validated());

        toastr()->success('payment mise à jour avec success!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $payment)
    {
        $delete = Payment::findOrFail($payment);

        return $this->supp($delete);
    }
}
