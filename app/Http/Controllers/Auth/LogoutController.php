<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
class LogoutController extends Controller
{
    public function destroy(Request $request, User $user){
    auth()->logout();
       
    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
    }
}
