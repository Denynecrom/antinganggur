<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $type = $request->type;

        if ($type !== 'applicant' && $type !== 'company') {
            return redirect('/login?type=applicant');
        }

        return view('auth.login', array('type' => $type, 'type_tampil' => $type === 'applicant' ? 'Pelamar' : 'Perusahaan'));
    }

    public function postlogin(Request $request)
    {
        $type = $request->type;

        if (Auth::guard($type)->attempt($request->only('email', 'password'))) {
            if ($type === 'applicant') {
                return redirect('/profil_user');
            }
            return redirect('/profil_perusahaan');
        }

        return redirect()->back()->with('message', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        $type = $request->type;
        Auth::guard($type)->logout();
        if ($type === 'admin') {
            return redirect('/admins/login');
        }
        return redirect('/login');
    }

    public function register(Request $request)
    {
        $type = $request->type;

        if ($type !== 'applicant' && $type !== 'company') {
            return redirect('/register?type=applicant');
        }

        return view('auth.register', array('type' => $type, 'type_tampil' => $type === 'applicant' ? 'Pelamar' : 'Perusahaan'));
    }

    public function postregister(Request $request)
    {
        $type = $request->type;
        $table = $type === 'applicant' ? 'users' : 'companies';

        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:'.$table,
            'password' => 'required|min:6|confirmed',
            'type' => 'required|in:applicant,company'
        ]);

        if ($type === 'applicant') {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        } else {
            Company::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        }

        return redirect("/login?type=$type");
    }

    public function admin_login()
    {
        return view('admin/log_adm');
    }

    public function admin_postlogin(Request $request)
    {
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect('/admins/dashboard');
        }

        return redirect()->back();
    }
}
