<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App\Models\Local;
use Illuminate\Http\Request;

class SuperviAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->id_tipo=='2') {
                
                $local_per= Local::where("id_supervisor", auth()->user()->id)
                  ->select("id")
                  ->whereNull("deleted_at")
                  ->count();
                
                if ($local_per==0) {
                   return back()->with('error', 'Supervisor no tiene Local');
                }else{
                     return $next($request);
                }
        }
           
        }
        return redirect()->to('home');
    }
}
