<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Debt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $debts = Debt::all();
        $customers = Customer::all();
        $sumQuantity = $debts->sum('quantity');
//        dd($sumQuantity);
        return view('debts.index', compact('debts','customers', 'sumQuantity'));
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
////        dd($request);
//        $this->validate($request,[
////           dd($request),
//            'customer_id' => 'required',
//            'product' => 'required',
//            'quantity' => 'required',
//            'deadline' => 'required',
//        ]);
//
//        $debt = new Debt();
//        $debt = $request->all();
//        $debt['user_id'] = \auth()->id();
//        $debt['customer_id'] = $request->customer_id;
//        $costumer_id = $request->costumer_id;
//        $costumer = Costumer::where('id',$costumer_id)->first();
//        $costumer->debt+=intval($request->quantity);
//        $costumer->save();
//        Debt::create($debt);
//
//        return redirect()->back()->with('success', 'Muvaffaqiyatli qo\'shildi');
//
////        dd($debt);

        $request->validate([
            'customer_id' => 'required',
            'product' => 'required',
            'quantity' => 'required',
            'deadline' => 'required',
        ]);

        $costumer = Customer::findOrFail($request->customer_id);
        $costumer->debt += intval($request->quantity);
        $costumer->save();

        $debt = $request->only('customer_id', 'product', 'quantity', 'deadline');
        $debt['user_id'] = auth()->id();

        Debt::create($debt);

        return redirect()->back()->with('success', 'Muvaffaqiyatli qo\'shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function show(Debt $debt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function edit(Debt $debt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Debt $debt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debt $debt)
    {
        //
    }
}
