<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
// use App\Models\Loker;

class LokerController extends Controller
{
    public function index () {
        return view('visitor/loker/loker');
    }
}
