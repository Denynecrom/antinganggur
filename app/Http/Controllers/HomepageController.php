<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use File;
// use App\Models\Homepage;

class HomepageController extends Controller
{
    public function index () {

    	$title = '';
    	$advertisement = Advertisement::where('show', 1)->latest()->limit(5)->get();
        $company_count = Company::count();
        $applicant_count = User::count();
        return view('visitor/beranda', compact('title', 'advertisement', 'company_count', 'applicant_count'));
    }
}
