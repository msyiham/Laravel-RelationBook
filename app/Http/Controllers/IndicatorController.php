<?php

namespace App\Http\Controllers;

use App\Models\Aspect;
use App\Models\Indicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function aspect()
    {
        return $this->belongsTo(Aspect::class, 'id');
    }
    public function index()
    {
        // Retrieve all indicators
        $indicators = Indicator::all();
    
        // Retrieve all aspects
        $aspects = Aspect::all();
    
        return view('admin.pages.indicator.index', compact('indicators', 'aspects'));
    }
    
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create($aspect)
    {
        $aspect = Aspect::where('id', $aspect)->first();
        return view('admin.pages.indicator.create', compact('aspect'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'aspect_id' => 'required|exists:aspects,id', // Ensure aspect_id exists in the aspects table
        ], [
            'required' => ':attribute wajib diisi.',
            'exists' => 'Aspect tidak valid.',
        ]);
    
        if ($validator->fails()) {
            return redirect(route('admin.indicator.create'))->withErrors($validator)->withInput();
        } else {
            $indicator = Indicator::create([
                "question" => $request->question,
                "aspect_id" => $request->aspect_id, // Include aspect_id in the creation
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
