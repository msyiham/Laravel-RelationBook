<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
    public function index()
    {
        $data = DB::table('class_rooms')
            ->join('schools', 'class_rooms.school_id', '=', 'schools.id')
            ->select('class_rooms.*', 'schools.name as name_schools') // Gantilah 'nama_sekolah' dengan nama kolom yang sesuai di model School
            ->get();
    
        return view('admin.pages.class-room.index', ['classRooms' => $data]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::all();
        return view('admin.pages.class-room.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|unique:class_rooms,name',
        ],
        [
            'required' => ':attribute wajib diisi.',
            'unique' => ':attribute sudah terdaftar.',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.class-room.create'))->withErrors($validator)->withInput();
        } else {
            ClassRoom::create([
                "name" => $request->name,
                "school_id" => $request->school_id,
                "created_at" => now()
            ]);
            return redirect()->route('admin.class-room.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassRoom $classRoom)
    {
        $schools = School::all();
        return view('admin.pages.class-room.edit', ['classRoom' => $classRoom, 'schools' => $schools]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassRoom $classRoom)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|unique:class_rooms,name,' . $classRoom->id,
            'school_id' => 'required',
        ],
        [
            'required' => ':attribute wajib diisi.',
            'unique' => ':attribute sudah terdaftar.',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.class-room.edit', ['classRoom' => $classRoom]))->withErrors($validator)->withInput();
        } else {
            $classRoom->update([
                "name" => $request->name,
                "school_id" => $request->school_id,
            ]);
            return redirect()->route('admin.class-room.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassRoom $classRoom)
    {
        $classRoom->delete();
        return redirect()->back();
    }
}
