<?php

namespace App\Http\Controllers\frontend\tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){

        return view('frontend.tools.index');
    }

    public function character_count(){
        return view('frontend.tools.character-count');
    }

    public function qr_generator(){
        return view('frontend.tools.qrcode');
    }
}
