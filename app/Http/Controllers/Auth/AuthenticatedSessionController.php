<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    

    // ...
    
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
    
        $request->session()->regenerate();
    
        // Mendapatkan user yang telah diautentikasi
        $user = $request->user();
    
        // Mendapatkan peran pertama pengguna (diasumsikan satu pengguna memiliki satu peran)
        $role = $user->getRoleNames()->first();
    
        // Mengarahkan sesuai dengan peran (role) pengguna
        $redirectPath = $this->getRedirectPathByRole($role);
    
        return redirect()->intended($redirectPath);
    }
    
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
    
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
