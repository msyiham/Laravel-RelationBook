<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = School::all();
        return view('admin.pages.school.index',['schools'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.school.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|unique:schools,name',
            ],
            [
                'required' => ':attribute wajib diisi.',
                'unique' => ':attribute sudah terdaftar.',
            ]);
    
        if ($validator->fails()) {
            return redirect(route('admin.school.create'))->withErrors($validator)->withInput();
        } else {
            $school = School::create([
                "name" => $request->name,
                "created_at" => now()
            ]);
            return redirect()->route('admin.school.index');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return view('admin.pages.school.edit', ['school' => $school]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|unique:schools,name,' . $school->id,
            ],
            [
                'required' => ':attribute wajib diisi.',
                'unique' => ':attribute sudah terdaftar.',
            ]);
    
        if ($validator->fails()) {
            return redirect(route('admin.school.edit', ['school' => $school]))->withErrors($validator)->withInput();
        } else {
            $school->update([
                "name" => $request->name,
            ]);
            return redirect()->route('admin.school.index');
        }
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $school->delete();
        return redirect()->back();
    }    
}
