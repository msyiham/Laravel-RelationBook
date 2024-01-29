<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Comment;
use App\Models\ConnectPoint;
use App\Models\Evaluation;
use App\Models\Indicator;
use App\Models\Information;
use App\Models\Point;
use App\Models\School;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showEvaluation()
    {
        $user = Auth::user();
        $evaluations = Evaluation::where('user_id', $user->id)->get();
        return view('user.student.evaluation.date', compact( 'evaluations'));
    }
    public function detailEvaluation($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $user = User::findOrFail($evaluation->user_id);
        return view('user.student.evaluation.detail', compact('evaluation', 'user'));
    }
    public function index()
    {
        $user = Auth::user();
        
        // Mendapatkan ConnectPoint terakhir sesuai dengan user_id
        $connectPoint = ConnectPoint::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();
    
        // Menggunakan first() karena kita ingin mendapatkan satu instance dari ClassRoom
        $class = ClassRoom::where('id', $user->class_id)->first();
        $information = Information::all();
        // Pastikan class ada sebelum mencoba mengakses school_id
        if ($class) {
            // Menggunakan first() karena kita ingin mendapatkan satu instance dari School
            $school = School::where('id', $class->school_id)->first();
    
            return view('user.student.index', compact('user', 'connectPoint', 'class', 'school', 'information'));
        } else {
            // Handle jika class tidak ditemukan
            return view('user.student.index', compact('user', 'connectPoint', 'information'));
        }
    }
    
    public function showAllMonths()
    {
        $user = Auth::user(); // Mengambil user yang sedang login

        $months = ConnectPoint::whereHas('user', function ($query) use ($user) {
                $query->where('id', $user->id);
            })    
            ->select(DB::raw('DATE_FORMAT(date, "%Y-%m") as month'))
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();
        $connectPoint = ConnectPoint::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();
        return view('user.student.show.month', compact('months', 'connectPoint'));
    }

    public function showByMonth($month)
    {
        $user = Auth::user(); // Mengambil user yang sedang login

        $startDate = Carbon::parse($month)->startOfMonth();
        $endDate = Carbon::parse($month)->endOfMonth();
        
        $connectPoints = ConnectPoint::whereBetween('date', [$startDate, $endDate])
            ->whereHas('user', function ($query) use ($user) {
                $query->where('id', $user->id);
            })
            ->distinct()
            ->get();
        //dd($connectPoints);
        return view('user.student.show.date', compact('connectPoints', 'month'));
    }
    public function showConnectPoint($connectPointId)
    {
        $connectPoint = ConnectPoint::findOrFail($connectPointId);
        $points = Point::where('connect_id', $connectPointId)->get();
        $user = User::findOrFail($connectPoint->user_id);
        $indicators = Indicator::whereIn('id', $points->pluck('number'))->get();
        $comment = Comment::where('connect_id', $connectPointId)->get();
        //dd($indicators);
        return view('user.student.show.detail', compact('connectPoint', 'points', 'indicators', 'user', 'comment'));
    }
    public function simpanTanggapan(Request $request)
    {
        //dd($request);
        Comment::create([
            'connect_id' => $request->connect_id,
            'status' => 0,
            'comment' => $request->comment,
            'role' => 3,
        ]);
        return redirect()->back()->with('success', 'Tanggapa berhasil ditambahkan');
    }
}
