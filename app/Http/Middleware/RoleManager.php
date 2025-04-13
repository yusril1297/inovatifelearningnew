<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;


class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        Log::info('User logged in:', ['user' => Auth::user()]);
        
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $authUserRole = Auth::user()->role;
    
        // Cek apakah role user sesuai dengan role yang dibutuhkan
        if ($this->checkRole($role, $authUserRole)) {
            return $next($request);
        }
    
        // Jika role tidak sesuai, arahkan ke dashboard yang sesuai dengan role user
        return $this->redirectUserBasedOnRole($authUserRole);
    }

    /**
     * Cek apakah role user sesuai dengan role yang dibutuhkan
     */
    private function checkRole($role, $authUserRole)
    {
        // Daftar role dan nilai numeriknya
        $roles = [
            'admin' => 0,
            'instructor' => 1,
            'student' => 2,
        ];
    
        // Mengizinkan beberapa role untuk mengakses
        $allowedRoles = explode('|', $role);
    
        foreach ($allowedRoles as $allowedRole) {
            if (isset($roles[$allowedRole]) && $roles[$allowedRole] === $authUserRole) {
                return true;
            }
        }
    
        return false;
    }

    /**
     * Arahkan user ke dashboard yang sesuai dengan role mereka
     */
    private function redirectUserBasedOnRole($authUserRole)
    {
        // Redirect ke route berdasarkan role user
        return match($authUserRole) {
            0 => redirect()->route('admin.dashboard'),
            1 => redirect()->route('instructor.dashboard'),
            // 2 => redirect()->route('students.dashboard'),
            default => redirect()->route('login'),
        };
    }
}
