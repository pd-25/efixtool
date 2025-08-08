<?php

namespace App\Http\Controllers\frontend\tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RobotsTxtController extends Controller
{
    public function index(){
        return view('frontend.tools.robots-txt-generator');
    }
}
