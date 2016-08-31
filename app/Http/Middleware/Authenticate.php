<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\ReportListing;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }
        $user = \Auth::user()->load('company', 'role', 'report');
        view()->share([
            'user' => $user,
            'reports' => $this->reportList($user)
        ]);
        return $next($request);
    }

    public function reportList($user)
    {
        if($user->role->id == config('role.roles.SUPER_ADMIN')){
            $report = ReportListing::where('is_active', true)->get()->pluck('name', 'url_title');
        } else if($user->role->id == config('role.roles.COMPANY_ADMIN')){
            $report = ReportListing::where('is_active', true)->get()->pluck('name', 'url_title');
        } else if($user->role->id == config('role.roles.COMPANY_USER')){
            // $report = ReportListing::where('is_active', true)->get()->pluck('name', 'url_title');
            $report = $user->report()->pluck('name', 'url_title');
        }
        return $report;
    }

}
