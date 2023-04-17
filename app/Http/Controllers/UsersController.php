<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        $roles = Role::all();
        return view("users.user", compact('users', 'roles'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required|unique:users|max:14',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8',
        ]);

//        dd($request);
        $users = new User();
        $users->firstName = $request->firstName;
        $users->lastName = $request->lastName;
        $users->phoneNumber = $request->phoneNumber;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
//        $users->confirmPassword = Hash::make($request->password);
        $users->rol = $request->rol;
        $users->assignRole($request->rol);
        $users->save();
//        dd($request);
        Toastr::success('Maʼlumotlar muvaffaqiyatli saqlandi!', 'Tabriklaymiz');
        return redirect()->route('users.index')->with('success', 'Saqlandi');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
//        dd($user);
        if ($user == null) {
            return redirect()->back();
        }

        return view('users.edit', [
            'user' => $user,
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
//dd($request->all());
//        $user = User::find($id);

        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required|unique:users,phoneNumber,',
            'email' => 'required|unique:users,email,',
            'password' => 'required|min:8',
        ]);
//        dd($request);


        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->phoneNumber = $request->input('phoneNumber');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
//        $user->confirmPassword = Hash::make($request->input('password'));

        $user->syncRoles($request->rol);
        $user->save();

        Toastr::success('Maʼlumotlar muvaffaqiyatli saqlandi!', 'Tabriklaymiz');
        return redirect()->route('users.index')->with('success', 'Tahrirlandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'muvaffaqiyatli o\'chirildi');

    }

}
