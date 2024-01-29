<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Indicator::all();
        return view('admin.pages.indicator.index',['indicator'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.indicator.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'question' => 'required',
            ],
            [
                'required' => ':attribute wajib diisi.',
            ]);
    
        if ($validator->fails()) {
            return redirect(route('admin.indicator.create'))->withErrors($validator)->withInput();
        } else {
            $indicator = Indicator::create([
                "question" => $request->question,
                "created_at" => now()
            ]);
            return redirect()->route('admin.indicator.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Indicator $indicator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Indicator $indicator)
    {
        return view('admin.pages.indicator.edit', ['indicator' => $indicator]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Indicator $indicator)
    {
        $validator = Validator::make($request->all(),
        [
            'question' => 'required',
        ],
        [
            'required' => ':attribute wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.indicator.edit', ['indicator' => $indicator]))->withErrors($validator)->withInput();
        } else {
            $indicator->update([
                "question" => $request->question,
            ]);
            return redirect()->route('admin.indicator.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Indicator $indicator)
    {
        $indicator->delete();
        return redirect()->back();
    }
}
