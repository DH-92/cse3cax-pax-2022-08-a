<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

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
        $user = User::create([
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
        $qualifications = $request->input('qualifications');
        if(!empty($qualifications)){
            $deleted = DB::table('subject_user')->where('user_id', $user->id)->delete();
            foreach($qualifications as $qual){
                DB::table('subject_user')->insert([
                    'subject_id' => $qual,
                    'user_id' =>  $user->id
                ]);
            }
        }
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
        $qualifications = $request->input('qualifications');
        $model = User::findOrFail($id);
        $model->update($request->all());
        if(!empty($qualifications)){
            $deleted = DB::table('subject_user')->where('user_id', $model->id)->delete();
            foreach($qualifications as $qual){
                DB::table('subject_user')->insert([
                    'subject_id' => $qual,
                    'user_id' =>  $model->id
                ]);
            }
        }
        $destination = substr($request->path(), 0, strpos($request->path(),'/'));
        return redirect($destination . '/users')
        ->with('success','User edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $model = User::findOrFail($id);
        $model->delete();

        $destination = substr($request->path(), 0, strpos($request->path(),'/'));
        return redirect($destination . '/users')
        ->with('success','User deleted successfully.');

    }
      /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        try{
            Excel::import(new UsersImport,request()->file('file'));
            return redirect()->back()->with('success','Data Imported Successfully');
        }
        catch(\Exception $ex){
            return back()->with('error', 'Error importing file');
        }
        return back();
    }

    public static function getUserTypes(): array
    {
        return [
            0 => "Lecturer",
            1 => "Manager",
            2 => "Administrator"
        ];
    }

    public static function getEmploymentTypes(): array
    {
        return ["Full-time", "Part-time", "Casual", "Intern", "Temp", "Other"];
    }
}
