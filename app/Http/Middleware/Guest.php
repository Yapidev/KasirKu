<?php

namespace App\Http\Middleware;

use App\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role === RoleEnum::ADMIN->value) {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role === RoleEnum::EMPLOYEE->value) {
                return redirect()->route('employee.dashboard');
            }
        }

        return $next($request);
    }
}
