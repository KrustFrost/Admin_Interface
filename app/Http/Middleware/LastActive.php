<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Carbon;
class LastActive
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
        if (auth()->user()->last_active !== now())
        { 
            DB::table("users")
              ->where("id", auth()->user()->id)
              ->update(["last_active" => Carbon\Carbon::now()]);
        }
        return $next($request);
    }
}
