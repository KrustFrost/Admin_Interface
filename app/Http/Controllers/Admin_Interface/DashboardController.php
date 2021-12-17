<?php

namespace App\Http\Controllers\Admin_Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon;
use App\Models\Profile;
class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['sessionexpired']);
        $this->middleware(['auth']);
        $this->middleware(['lastactive']);
    }
    public function index(){
        $users = DB::table('users')->get();
        $userslastactive = DB::table('users')->get();
        $countgenderF = DB::table('profiles')->where('gender','Female')->get();
        $countgenderM = DB::table('profiles')->where('gender','Male')->get();
        $totalbooks = DB::table('libraries')->get();
        $latestbook = DB::table('libraries')->latest('Title_of_Book')->first();
        return view("interface.dashboard",[
            'user' => $users,
            'userslastactive' => $userslastactive,
            'countgenderF' => $countgenderF,
            'countgenderM' => $countgenderM,
            'totalbooks' => $totalbooks,
            'latestbook' => $latestbook
        ]);
    }
}