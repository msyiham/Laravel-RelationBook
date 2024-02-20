<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function listName()
    {
        $teacher = Auth::user();

        // Mendapatkan daftar siswa dengan class_id yang sama dengan guru
        $students = User::where('class_id', $teacher->class_id)
                        ->whereHas('roles', function ($query) {
                            $query->where('name', 'student');
                        })
                        ->get();
        return view('user.teacher.evaluation.name', compact('students'));
    }
    public function showListName()
    {
        $teacher = Auth::user();

        // Mendapatkan daftar siswa dengan class_id yang sama dengan guru
        $students = User::where('class_id', $teacher->class_id)
                        ->whereHas('roles', function ($query) {
                            $query->where('name', 'student');
                        })
                        ->get();
        return view('user.teacher.evaluation.showListName', compact('students'));
    }
    public function showEvaluationAt($user)
    {
        $evaluations = Evaluation::where('user_id', $user)->get();
        return view('user.teacher.evaluation.date', compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($user)
    {
        $selectedUser = User::where('id', $user)->first();
        return view('user.teacher.evaluation.create', compact('selectedUser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'narasi' => 'required',
                'capaian' => 'required',
                'date' => 'required',
            ],
            [
                'required' => ':attribute wajib diisi.',
                'unique' => ':attribute sudah terdaftar.',
                'image' => 'harus berupa gambar.',
                'mimes' => ':attribute harus berformat jpeg, png, jpg.',
                'max' => ':attribute tidak boleh lebih dari 2MB.',
            ]);
    
        if ($validator->fails()) {
            return redirect(route('evaluations.create', ['user' => $request->user_id]))->withErrors($validator)->withInput();
        } else {
            $userId = $request->user_id;
            $date = $request->date;
            $photoName = "{$userId}_{$date}." . $request->photo->getClientOriginalExtension();
    
            $request->photo->storeAs('photos', $photoName, 'public');
    
            Evaluation::create([
                "user_id" => $userId,
                "narasi" => $request->narasi,
                "capaian" => $request->capaian,
                "date" => $date,
                "photo" => $photoName,
            ]);
            return redirect()->route('evaluations.listName');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $user = User::findOrFail($evaluation->user_id);
        return view('user.teacher.evaluation.detail', compact('evaluation', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $user = User::findOrFail($evaluation->user_id);
        return view('user.teacher.evaluation.edit', compact('evaluation', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $evaluation)
    {
        $validator = Validator::make($request->all(), [
            'narasi' => 'required',
            'date' => 'required',
            'capaian' => 'required',
            'file' => 'nullable|mimes:jpg|png|',
        ], [
            'required' => ':attribute wajib diisi.',
            'mimes' => 'wajib gambar',
        ]);
    
        if ($validator->fails()) {
            return redirect(route('evaluations.edit', $evaluation))->withErrors($validator)->withInput();
        }
        try {
            $evaluations = Evaluation::findOrFail($evaluation);
    
            if ($request->hasFile('photo')) {
                // Delete the old file
                Storage::disk('public')->delete($evaluations->photo);
            
                // Upload the new file
                $userId = $request->user_id;
                $date = $request->date;
                $photoName = "{$userId}_{$date}." . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('photos', $photoName, 'public');
                $evaluations->photo = $photoName;
            }
            
    
            // Update other fields
            $evaluations->narasi = $request->narasi;
            $evaluations->date = $request->date;
            $evaluations->capaian = $request->capaian;
            $evaluations->save();
    
            return redirect()->route('evaluations.showListName')->with('success', 'Informasi berhasil diperbarui.');
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during file upload or database save
            dd($e);
            return redirect()->route('evaluations.edit', $evaluation)->with('error', 'Terjadi kesalahan: '.$e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
