<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Corrected import
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\BackupGlobals;

class AdminAuthController extends Controller
{
    public function showLoginForm() {
        return view('admin.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                session(['admin_logged_in' => true, 'admin_name' => $user->name]);
                return redirect()->route('admin.bunga.index')->with('success', 'Selamat datang, Admin!'); // Redirect to admin bunga page after login
            }

            Auth::logout();
            return back()->withErrors(['email' => 'Anda tidak memiliki akses sebagai admin.']);
        }
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout(){
        Auth::logout();
        session()->forget(['admin_logged_in', 'admin_name']);
        return redirect()->route('admin.login')->with('success', 'Anda telah logout');
    }
}
