<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\School;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // Mendapatkan daftar sekolah
        $class = ClassRoom::all();
    
        // Mengirimkan variabel $class ke dalam tampilan
        return view('auth.register', compact('class'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
        protected function getRedirectPathByRole(string $role): string
    {
        switch ($role) {
            case 'admin':
                return RouteServiceProvider::ADMIN_HOME;
                break;
            case 'teacher':
                return RouteServiceProvider::TEACHER_HOME;
                break;
            case 'student':
                return RouteServiceProvider::STUDENT_HOME;
                break;
            default:
                return RouteServiceProvider::HOME;
                break;
        }
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
            'class_id' => ['required'],
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'class_id' => $request->class_id,
        ]);
    
        $selectedRole = Role::where('name', $request->role)->first();
    
        // Periksa apakah peran ditemukan sebelum menetapkannya
        if ($selectedRole) {
            $user->assignRole($selectedRole);
        }
    
        event(new Registered($user));
    
        Auth::login($user);
    
        // Mengarahkan pengguna ke halaman sesuai peran
        return Redirect::to($this->getRedirectPathByRole($request->role));
    }
}
