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
            $created_at = new DateTime(auth()->user()->created_at);
            $date_now = new DateTime();
            $day = $date_now->diff($created_at);
            
            if ($day->d > 0 && auth()->user()->is_login == null)
            {
                auth()->logout();

                return back()->withErrors(['Your account is expired. Please contact the administrator.']);
            }
            else
            {
                return redirect('/applicants');
            }
        } 
        
        return $next($request);
    }
}
