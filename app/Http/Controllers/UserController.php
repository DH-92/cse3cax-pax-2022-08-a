<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin/users',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pw = Hash::make('password');
        // User::create($request->all('firstName', 'lastName', 'phone', 'email', 'employmentType', 'userType', 'color', 'maxLoad'),);
        User::create([
            'firstName'=> $request->input('firstName'), 
            'lastName'=> $request->input('lastName'), 
            'phone'=> $request->input('phone'), 
            'email'=> $request->input('email'), 
            'employmentType'=> $request->input('employmentType'), 
            'userType'=> $request->input('userType'), 
            'color'=> $request->input('color'), 
            'maxLoad'=> $request->input('maxLoad'),
            'password' => $pw
        ]);
        return redirect('admin/users')
        ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $model = User::findOrFail($id);
        return view('user.show', ['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin/user-edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = User::findOrFail($id);
        $model->update($request->all());

        return redirect('admin/users')
        ->with('success','User edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = User::findOrFail($id);
        $model->delete();

        return redirect('admin/users')
        ->with('success','User deleted successfully.');

    }
}
