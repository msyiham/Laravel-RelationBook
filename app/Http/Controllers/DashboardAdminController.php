<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Menghitung total user
        $totalUsers = User::count();

        // Menghitung jumlah user dengan peran 'teacher'
        $teachersCount = User::role('teacher')->count();

        // Menghitung jumlah user dengan peran 'student'
        $studentsCount = User::role('student')->count();

        // Menghitung jumlah data pada model 'School'
        $schoolsCount = School::count();

        // Menghitung jumlah data pada model 'ClassRoom'
        $classroomsCount = ClassRoom::count();

        // Mengirimkan data ke view
        return view('admin.pages.dashboard', [
            'totalUsers' => $totalUsers,
            'teachersCount' => $teachersCount,
            'studentsCount' => $studentsCount,
            'schoolsCount' => $schoolsCount,
            'classroomsCount' => $classroomsCount,
        ]);
    }
    public function showUser()
    {
        $users = User::all();
        $teachers = $users->filter(function ($user) {
            return $user->hasRole('teacher');
        });
    
        $students = $users->filter(function ($user) {
            return $user->hasRole('student');
        });
        return view('admin.pages.users', compact('users', 'teachers', 'students'));
    }
}
