<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Auth;
use Session;
use App\Models\User; 
use Illuminate\Http\Request;
class SessionExpired {
    protected $session;
    protected $timeout = 1200;
     
    public function __construct(Store $session){
        $this->session = $session;
    }
    public function handle(Request $request, Closure $next){
        $isLoggedIn = $request->path() != 'dashboard/logout';
        if(!session('lastActivityTime')){
            $this->session->put('lastActivityTime', time());
        }elseif(time() - $this->session->get('lastActivityTime') > $this->timeout){
            $this->session->forget('lastActivityTime');
            auth()->logout();
            return redirect()->route('login')->with('SessionExpired','Your Session has been Expired');
        }
        $isLoggedIn ? $this->session->put('lastActivityTime', time()) : $this->session->forget('lastActivityTime');
        return $next($request);
    }
}