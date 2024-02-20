<?php

namespace App\Http\Controllers;

use App\Models\Aspect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AspectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.aspect.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
        ],
        [
            'required' => ':attribute wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.aspect.create'))->withErrors($validator)->withInput();
        } else {
            Aspect::create([
                "name" => $request->name,
                "created_at" => now()
            ]);
            return redirect()->route('admin.indicator.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Aspect $aspect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aspect $aspect)
    {
        return view('admin.pages.aspect.edit', ['aspect' => $aspect]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aspect $aspect)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
        ],
        [
            'required' => ':attribute wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.aspect.edit', ['aspect' => $aspect]))->withErrors($validator)->withInput();
        } else {
            $aspect->update([
                "name" => $request->name,
            ]);
            return redirect()->route('admin.indicator.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aspect $aspect)
    {
        $aspect->delete();
        return redirect()->back();
    }
}
