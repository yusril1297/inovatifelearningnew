<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $settings = setting::first();
        return view('auth.login', compact('settings'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        // Periksa role pengguna langsung dari field role
        if ($request->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($request->user()->role === 'instructor') {
            return redirect()->route('instructor.dashboard');
        } elseif ($request->user()->role === 'student') {
            return redirect()->route('frontend.home');
        }

        return redirect()->intended('/');
    }



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->flush();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
