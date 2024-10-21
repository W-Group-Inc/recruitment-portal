<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;
use RealRashid\SweetAlert\Facades\Alert;

class ApplicantLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role == 'Applicant')
        {
            if (auth()->user()->is_login == null)
            {
                return redirect('/view-password');
            }

            return redirect('/applicants');
        }
        elseif(auth()->check() && auth()->user()->role == 'Head Business Unit') 
        {
            return redirect('/for-approval');
        }
        
        return $next($request);
    }
}
