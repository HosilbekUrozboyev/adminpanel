<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Models\Debt;
use App\Models\Payment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $customers = Customer::orderBy('id', 'DESC')->get();
//        $customer_debt = Debt::
//        dd($customers);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'name' => 'required',
            'phoneNumber' => 'required|unique:customers|max:14',
            'adress' => 'required',
        ]);
//        $this ->validate($request,[
//           'name' => 'required',
//           'phoneNumber' => 'required|unique:customers|max:14',
//           'adress' => 'required',
////        ]);
        $customers = new Customer();
        $customers->name = $request->name;
        $customers->phoneNumber = $request->phoneNumber;
        $customers->adress = $request->adress;
        $customers->debtStatus = $request->debtStatus;
        $customers->save();
        //Customer::create($request->all());
        return redirect()->route('customers.index')->with('success','Saqlandi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = Customer::find($id);
//        $debts = Debt::with('customer')->where('customer_id', $id)->get();
        $debts = Debt::where('customer_id', $id)->get();
        $totalQuantity = $debts->sum('quantity');
//        dd($customers->debt);
        $payments = Payment::where('customer_id', $id)->get();

        return view('customers.debts', compact('customers', 'debts', 'totalQuantity', 'payments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=Customer::find($id);
//        dd($customer);
        return  view('customers.edit',compact('customer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer=Customer::find($id);
        $customer->name=$request['name'];
        $customer->phoneNumber=$request['phoneNumber'];
        $customer->adress=$request['adress'];
        $customer->debtStatus=$request['debtStatus'];
        $customer->save();
        return  redirect(route('customers.index'))->with('success', 'Tahrirlandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->back()->with('success', 'muvaffaqiyatli o\'chirildi');
    }

    public function view($id){
        dd($id);
        $customer = Customer::find($id);
        return view('customers.debts', compact('customer'));
    }
}
