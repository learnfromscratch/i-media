<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Groupe;
use Carbon\Carbon;

class VerifyAbonnement
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
        $user = Auth::user();
        $groupe = Groupe::find($user->groupe);

        if ($user->role->name === 'SuperAdmin')
            return $next($request);

        if ($groupe->abonnement->end_date < Carbon::now()->toDateString())
            return redirect('/home/expired');
        return $next($request);
    }
}
