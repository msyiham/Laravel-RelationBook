<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $information = Information::all();
        return view('admin.pages.information.index', compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.information.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'text' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'file' => 'required|mimes:pdf',
        ],
        [
            'required' => ':attribute wajib diisi.',
            'mimes' => 'wajib pdf',
        ]);
        if ($validator->fails()) {
            return redirect(route('admin.information.create'))->withErrors($validator)->withInput();
        } 
        else {
            $fileName = uniqid().'.' . $request->file->getClientOriginalExtension();
            $filePath = $request->file->storeAs('information', $fileName, 'public');
        
            Information::create([
                'text' => $request->text,
                'email' => $request->email,
                'phone' => $request->phone,
                'file' => $filePath,
                'created_at' => now()
            ]);
            return redirect()->route('admin.information.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Information $information)
    {
        $teacher = Auth::user();

        // Mendapatkan daftar siswa dengan class_id yang sama dengan guru
        $students = User::where('class_id', $teacher->class_id)
                        ->whereHas('roles', function ($query) {
                            $query->where('name', 'student');
                        })
                        ->get();

        $information = Information::all();
        return view('user.teacher.dashboard', compact('information', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $information = Information::findOrFail($id);
        return view('admin.pages.information.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'file' => 'nullable|mimes:pdf',
        ], [
            'required' => ':attribute wajib diisi.',
            'mimes' => 'wajib pdf',
            'email' => 'Format :attribute tidak valid.',
        ]);
    
        if ($validator->fails()) {
            return redirect(route('admin.information.edit', $id))->withErrors($validator)->withInput();
        }
    
        try {
            $information = Information::findOrFail($id);
    
            if ($request->hasFile('file')) {
                // Delete the old file
                Storage::disk('public')->delete($information->file);
    
                // Upload the new file
                $fileName = uniqid().'.' . $request->file->getClientOriginalExtension();
                $filePath = $request->file->storeAs('information', $fileName, 'public');
                $information->file = $filePath;
            }
    
            // Update other fields
            $information->text = $request->text;
            $information->email = $request->email;
            $information->phone = $request->phone;
            $information->save();
    
            return redirect()->route('admin.information.index')->with('success', 'Informasi berhasil diperbarui.');
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during file upload or database save
            dd($e);
            return redirect()->route('admin.information.edit', $id)->with('error', 'Terjadi kesalahan: '.$e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $information = Information::findOrFail($id);
    
        try {
            // Hapus file dari storage
            Storage::delete($information->file);
    
            // Hapus record dari database
            $information->delete();
    
            return redirect()->route('admin.information.index')
                ->with('success', 'Informasi berhasil dihapus');
        } catch (\Exception $e) {
            // Log pesan kesalahan
            Log::error('Error deleting file or record: ' . $e->getMessage());
            
            return redirect()->route('admin.information.index')
                ->with('error', 'Terjadi kesalahan saat menghapus informasi');
        }
    }
    
}
