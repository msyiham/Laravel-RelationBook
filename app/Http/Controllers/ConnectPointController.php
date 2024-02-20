<?php

namespace App\Http\Controllers;

use App\Models\Aspect;
use App\Models\Comment;
use App\Models\ConnectPoint;
use App\Models\Evaluation;
use App\Models\Indicator;
use App\Models\Point;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ConnectPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showConnectPointsByUserId($userId)
    {
        $connectPoints = ConnectPoint::where('user_id', $userId)->get();
        return view('user.teacher.show.date', compact('connectPoints'));
    }
    
    public function showConnectPoint($connectPointId)
    {
        $connectPoint = ConnectPoint::findOrFail($connectPointId);
        $aspects = Aspect::all();
        $points = Point::where('connect_id', $connectPointId)->get();
        $user = User::findOrFail($connectPoint->user_id);
        $indicators = Indicator::whereIn('id', $points->pluck('number'))->get();
        //dd($indicators);
        $comment = Comment::where('connect_id', $connectPointId)->get();
        $evaluation = Evaluation::where('connect_point_id', $connectPointId)->get();
        return view('user.teacher.show.detail', compact('evaluation','aspects','connectPoint', 'points', 'indicators', 'user', 'comment'));
    }
    public function tandaiDibaca($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->update(['status' => 1]);
        return redirect()->back()->with('success', 'Komentar telah ditandai sebagai sudah dibaca.');
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
        return view('user.teacher.create.list-name', compact('students'));
    }

    public function create($user)
    {
        $selectedUser = User::where('id', $user)->first();
                // Ambil semua aspek dari tabel "aspects"
        $aspects = Aspect::all();
        $indicators = Indicator::all();
        // Ambil semua indikator untuk setiap aspek
        // $indicators = [];
        // foreach ($aspects as $aspect) {
        //     $indicators[$aspect->id] = Indicator::where('aspect_id', $aspect->id)->get();
        // }
        return view('user.teacher.create.input-point', compact('indicators', 'aspects', 'selectedUser'));
    }

    public function store(Request $request)
    {
        //dd($request);
        // $request->validate([
        //     'questions.*' => 'required',
        //     'date' => 'required',
        //     'comment' => 'required',
        //     'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi untuk foto
        // ], [
        //     'questions.*.required' => 'Kolom pertanyaan harus diisi.',
        //     'date.required' => 'Tanggal harus diisi.',
        //     'comment.required' => 'Komentar harus diisi.',
        //     'photos.*.required' => 'Foto harus diunggah.',
        //     'photos.*.image' => 'Dokumentasi harus berupa gambar.',
        //     'photos.*.mimes' => 'Dokumentasi harus berformat jpeg, png, jpg, atau gif.',
        //     'photos.*.max' => 'Ukuran maksimum untuk setiap foto adalah 2048 kilobita.',
        // ]);        
        //dd($request);
        
        DB::beginTransaction();
        
        try {
            
            // Simpan titik koneksi
            $connectPoint = ConnectPoint::create([
                'user_id' => $request->user_id,
                'date' => $request->date,
            ]);
            $points = $request->input('questions');
            if ($points) {
                foreach ($points as $indicatorId => $status) {
                    Point::create([
                        'number' => $indicatorId,
                        'status' => $status,
                        'connect_id' => $connectPoint->id,
                    ]);
                }
            }

            
            // Simpan evaluasi untuk setiap aspek
            //$photos = $request->file('photos'); // Gunakan file() untuk mendapatkan file foto dari request

            $aspect_ids = $request->aspect_id;
            $userId = $request->user_id;
            $date = $request->date;
        
            foreach ($aspect_ids as $index => $aspect_id) {
                $file = $request->file("photos_$index");

                if ($file) {
                    $imageName = $date . '_aspect_' . $aspect_id . '.' . $file->getClientOriginalExtension();
                    $filePath = $file->storeAs('photo', $imageName, 'public');

                    $evaluation = new Evaluation();
                    $evaluation->connect_point_id = $connectPoint->id;
                    $evaluation->aspect_id = $aspect_id;
                    $evaluation->photo = $filePath;
                    $evaluation->save();
                }else{
                    dd("wadhuh");
                }
                
            }

            
            // Simpan komentar
            Comment::create([
                'connect_id' => $connectPoint->id,
                'status' => 0,
                'comment' => $request->comment,
                'role' => 2,
            ]);
            
            // Commit transaksi jika tidak ada kesalahan
            DB::commit();
            //dd($request);
            return redirect()->route('teacher.dashboard')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            //dd($request);
            dd($e);
            DB::rollBack();
            
            //return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan. Data gagal disimpan.');
        }
    }

    
    
    

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     dd($request);
    // }

    /**
     * Display the specified resource.
     */
    public function show(ConnectPoint $connectPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ConnectPoint $connectPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ConnectPoint $connectPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConnectPoint $connectPoint)
    {
        //
    }
}
