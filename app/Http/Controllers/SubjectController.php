<?php

namespace App\Http\Controllers;

use App\Imports\SubjectsImport;
use App\Models\Subject;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('admin/subjects', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/subject-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Subject::create($request->all('code', 'name', 'description', 'color'));

        return redirect('admin/subjects')
        ->with('success', 'Subject created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Subject $subject
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Subject $subject
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        $subject = Subject::where('code', $code)->first();

        return view('admin/subject-edit', ['subject' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subject $subject
     *
     * @return \Illuminate\Http\Response
     */
    public function update($code, Request $request, Subject $subject)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $subject = Subject::where('code', $code)->first();
        $subject->update($request->all('code', 'name', 'description', 'color'));

        return redirect('admin/subjects')
        ->with('success', 'Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Subject $subject
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $subject = Subject::where('code', $code)->first();
        $subject->delete();

        return redirect('admin/subjects')
        ->with('success', 'Subject deleted successfully');
    }

    public static function getSubjects(): \Illuminate\Database\Eloquent\Collection
    {
        return Subject::all();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        try {
            Excel::import(new SubjectsImport, request()->file('file'));

            return redirect()->back()->with('success', 'Data Imported Successfully');
        } catch (\Exception $ex) {
            return back()->with('error', 'Error importing file');
        }

        return back();
    }
}
