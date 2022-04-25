<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
// use App\Models\Loper;

class KebijakanPrivasiController extends Controller
{
    public function index () {
        return view('visitor/kebijakan_privasi/kebijakan_privasi');
    }
}
