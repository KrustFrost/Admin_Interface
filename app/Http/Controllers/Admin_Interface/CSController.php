<?php

namespace App\Http\Controllers\Admin_Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CSController extends Controller
{
    public function __construct(){
        $this->middleware(['lastactive']);
        $this->middleware(['sessionexpired']);
        $this->middleware(['auth']);
    }
    public function index(){
        return view('interface.cs');
    }
}
