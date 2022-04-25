<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Advertisement;
use App\Models\Vacancy;
use App\Models\Magang;
use App\Models\Beasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $company = Company::count();
        $advertisement = Advertisement::where('show', 1)->count();
        $vacancy = Vacancy::count();
        $magang = Magang::count();
        $beasiswa = Beasiswa::count();

        return view('admin.dashboard', compact('user', 'company', 'advertisement', 'vacancy', 'magang', 'beasiswa'));
    }
}
