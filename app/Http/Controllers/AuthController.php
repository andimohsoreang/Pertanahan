<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user()->role);
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $loginCredentials = [
            $loginType => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($loginCredentials)) {
            // Regenerate session
            $request->session()->regenerate();

            // Log user in manually if needed
            $user = Auth::user();
            Auth::login($user);

            Log::info('Login Successful', [
                'user_id' => $user->id,
                'username' => $user->username,
                'role' => $user->role
            ]);

            return $this->redirectBasedOnRole($user->role);
        }

        return back()->withErrors([
            'username' => 'Kredensial yang Anda berikan tidak sesuai.',
        ])->withInput($request->except('password'));
    }

    private function redirectBasedOnRole($role)
    {
        // Tambahkan logging untuk debugging
        Log::info('Redirect Role Debug', [
            'role' => $role,
            'routes' => array_keys(app('router')->getRoutes()->getRoutesByName())
        ]);

        switch ($role) {
            case 'superadmin':
                return redirect()->route('users.listAccount');
            case 'hod':
            case 'verificator':
            case 'operator':
                return redirect()->route('maindash');
            default:
                return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
