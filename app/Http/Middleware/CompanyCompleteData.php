<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyCompleteData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $guard = 'company';
        $is_company = Auth::guard($guard)->check();

        if ($is_company) {
            $is_filled = $request->user($guard)->has_complete_data();
            if (!$is_filled) {
                return redirect('/profil_perusahaan');
            }
        }

        return $next($request);
    }
}
