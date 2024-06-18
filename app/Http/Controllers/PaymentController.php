<?php

namespace App\Http\Controllers;

use App\Helper\DeleteAction;
use App\Http\Requests\StorePaymentRequest;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Support\Carbon;

class PaymentController extends Controller
{
    use DeleteAction;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Payment::all();
        $student = Student::all();

        return view('payment.index', compact('rows', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $item = Payment::create($request->validated());
        $today = Carbon::today();
        // dd(intval($request->mois) - 1);
        $item->student->update(['payment' => $today->addMonth(intval($request->mois) - 1)]);
        // $item->student->save();
        // dd($today->addMonth(intval($request->mois) - 1));
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
