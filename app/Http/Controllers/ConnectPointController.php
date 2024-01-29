<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ConnectPoint;
use App\Models\Indicator;
use App\Models\Point;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConnectPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showConnectPoint($connectPointId)
    {
        $connectPoint = ConnectPoint::findOrFail($connectPointId);
        $points = Point::where('connect_id', $connectPointId)->get();
        $user = User::findOrFail($connectPoint->user_id);
        $indicators = Indicator::whereIn('id', $points->pluck('number'))->get();
        $comment = Comment::where('connect_id', $connectPointId)->get();
        //dd($indicators);
        return view('user.teacher.show.detail', compact('connectPoint', 'points', 'indicators', 'user', 'comment'));
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

    public function showNamesByDate($date)
    {
        $teacher = Auth::user();

        $connectPoints = ConnectPoint::where('date', Carbon::parse($date)->toDateString())
            ->whereHas('user', function ($query) use ($teacher) {
                $query->where('class_id', $teacher->class_id);
            })
            ->get();
        //dd($connectPoints);
        return view('user.teacher.show.name', compact('connectPoints', 'date'));
    }

    public function showByMonth($month)
    {
        $teacher = Auth::user();
        $startDate = Carbon::parse($month)->startOfMonth();
        $endDate = Carbon::parse($month)->endOfMonth();

        $connectPoints = ConnectPoint::whereBetween('date', [$startDate, $endDate])
            ->whereHas('user', function ($query) use ($teacher) {
                $query->where('class_id', $teacher->class_id);
            })
            ->distinct()
            ->get();

        //dd($connectPoints);
        return view('user.teacher.show.date', compact('connectPoints', 'month'));
    }

    public function showAllMonths()
    {
        $teacher = Auth::user();

        $months = ConnectPoint::whereHas('user', function ($query) use ($teacher) {
                $query->where('class_id', $teacher->class_id);
            })    
            ->select(DB::raw('DATE_FORMAT(date, "%Y-%m") as month'))
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();
        return view('user.teacher.show.month', compact('months'));
    }

    public function create($user)
    {
        $selectedUser = User::where('id', $user)->first();
        $indicators = Indicator::all();
        return view('user.teacher.create.input-point', compact('indicators', 'selectedUser'));
    }

    public function store(Request $request)
    {
        $connectPoint = ConnectPoint::create([
            'user_id' => $request->user_id,
            'date' => $request->date,
        ]);
        foreach ($request->input('questions') as $indicatorId => $status) {
            Point::create([
                'number' => $indicatorId,
                'status' => $status,
                'connect_id' => $connectPoint->id,
            ]);
        }
        Comment::create([
            'connect_id' => $connectPoint->id,
            'status' => 0,
            'comment' => $request->comment,
            'role' => 2,
        ]);
        return redirect()->route('connectPoint.listName')->with('success', 'Data berhasil disimpan.');
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
