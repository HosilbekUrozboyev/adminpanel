<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Debt;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        $customers = Customer::all();
//        dd($payments);
        return view('payments.index', compact('payments', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
//           dd($request),
            'customer_id' => 'required',
            'quantity' => 'required',
        ]);

        $costumer = Customer::findOrFail($request->customer_id);
        $costumer->debt -= intval($request->quantity);
        $costumer->save();

        $payment = $request->only('customer_id','quantity');
        $payment['user_id'] = auth()->id();

        Payment::create($payment);

//        $payment = new Payment();
////        $debt = $request->all();
//        $payment['user_id'] = \auth()->id();
//        $payment['customer_id'] = $request->customer_id;
//        $payment['quantity'] = $request->quantity;
//        $payment->save();

        return redirect()->back()->with('success', 'To\'lov qabulqilindi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
