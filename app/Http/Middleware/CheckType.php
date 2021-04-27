<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckType
{
    const STUDENT = 'etudiant';
    const TEACHER = 'enseignant';
    const ADMIN = 'admin';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $method = $role;
        if (method_exists($this, $method)) {
            return $this->{$method}($request, $next);
        }

        return redirect()->route('login');
    }

    protected function admin($request, $next) {
        $user = Auth::user();
        // Neu ko dung role thi chuyen ve` login
        if ($user->type != self::ADMIN) {
            dd("23");
            return redirect()->route('login');
        }
        return $next($request);
    }

    protected function student($request, $next) {
        $user = Auth::user();
        // Neu ko dung role thi chuyen ve` login
        if ($user->type != self::STUDENT) {
            return redirect()->route('login');
        }

        return $next($request);
    }

    protected function teacher($request, $next) {
        $user = Auth::user();
        // Neu ko dung role thi chuyen ve` login
        if ($user->type != self::TEACHER) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
