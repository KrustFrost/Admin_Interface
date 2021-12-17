<?php

namespace App\Http\Controllers\Admin_interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(){
        $this->middleware(['lastactive']);
        $this->middleware(['sessionexpired']);
        $this->middleware(['auth']);
    }
    public function index(){
        return view('interface.about');
    }
    public function Team(){
        return view('interface.team');
    }
}