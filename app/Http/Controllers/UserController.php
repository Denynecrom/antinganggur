<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Education;
use App\Models\Language;
use App\Models\Skill;
use App\Models\Province;
use Illuminate\Http\Request;
use File;
use DB;

class UserController extends Controller
{
    public function index()
    {
        // $user = DB::table('users')->get();
        $user = User::all();
        $user = User::paginate(10);
        $education = Education::all();
        $language = Language::all();
        $skill = Skill::all();
        return view('admin.user.userdata', compact('user', 'education', 'language', 'skill'));
    }

    public function add()
    {
        $province = Province::all();
        return view('admin.user.createuser', compact('province'));
    }

    public function proses_add(Request $request)
    {
        $this->validate($request, [

            'name' => ['required'],
            'email' => ['required', 'email'],
            'gender' => ['required'],
            'phone' => ['required', 'numeric'],
            // 'province_id' => ['required'],
            'address' => ['required'],
            'birthdate' => ['required', 'date_format:Y-m-d'],
            'password' => ['required'],
            'photo' => ['nullable', 'mimes:jpeg,jpg,png'],
            'institution' => ['required'],
            'level_edu' => ['required'],
            'major' => ['required'],
            'graduated_date' => ['required'],
            'name_lang' => ['required'],
            'level_lang' => ['required'],
            'name_skl' => ['required'],
            'level_skl' => ['required'],
        ]);

        $file = $request->file('photo');
        $nama_file = $file->getClientOriginalName();
        $folder = 'foto_user';
        $file->move($folder, $nama_file);

        $user = User::create([
            'name' => $request->name,

            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            // 'province_id' => $request->province_id,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'password' => bcrypt($request->password),
            'photo' => $nama_file,
        ]);

        $education = $user->Education()->create([
            'user_id' => $user->id,
            'institution' => $request->input('institution'),
            'level_edu' => $request->input('level_edu'),
            'major' => $request->input('major'),
            'graduated_date' => $request->input('graduated_date'),
        ]);

        $language = $user->Language()->create([
            'user_id' => $user->id,
            'name_lang' => $request->input('name_lang'),
            'level_lang' => $request->input('level_lang'),
        ]);

        $skill = $user->Skill()->create([
            'user_id' => $user->id,
            'name_skl' => $request->input('name_skl'),
            'level_skl' => $request->input('level_skl'),
        ]);

        return redirect('/user/data')->with('message', 'Data User berhasil dibuat');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $education = Education::find($id);
        // DB::table('educations')->select('id', 'institution', 'level_edu', 'major', 'graduated_date');
        $language = Language::find($id);
        $skill = Skill::find($id);
        $province = Province::select('id', 'name')->get();
        return view('admin.user.edituser', compact('user', 'education', 'language', 'skill', 'province'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],

            'email' => ['required', 'email'],
            'gender' => ['required'],
            'phone' => ['required', 'numeric'],
            // 'province_id' => ['required'],
            'address' => ['required'],
            'birthdate' => ['required', 'date_format:Y-m-d'],
            'password' => ['required'],
            'photo' => ['nullable', 'mimes:jpeg,jpg,png'],
            'institution' => ['required'],
            'level_edu' => ['required'],
            'major' => ['required'],
            'graduated_date' => ['required'],
            'name_lang' => ['required'],
            'level_lang' => ['required'],
            'name_skl' => ['required'],
            'level_skl' => ['required'],
        ]);

        if ($file = $request->file('photo')) {
            $file->move('foto_user', $file->getClientOriginalName());
        }
        $user = User::find($id);
        if ($file) {
            $user->photo = $file->getClientOriginalName();
        }
        $user->name = $request->name;

        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        // $user->province_id = $request->province_id;
        $user->address = $request->address;
        $user->birthdate = $request->birthdate;
        $user->password = $request->password;
        $user->save();
        $education = $user->Education()->find([
            'user_id' => $user->id,
            'institution' => $request->input('institution'),
            'level_edu' => $request->input('level_edu'),
            'major' => $request->input('major'),
            'graduated_date' => $request->input('graduated_date'),
        ]);

        $language = $user->Language()->find([
            'user_id' => $user->id,
            'name_lang' => $request->input('name_lang'),
            'level_lang' => $request->input('level_lang'),
        ]);

        $skill = $user->Skill()->find([
            'user_id' => $user->id,
            'name_skl' => $request->input('name_skl'),
            'level_skl' => $request->input('level_skl'),
        ]);


        return redirect('/user/data')->with('message', 'Data User berhasil diubah');
    }

    public function delete($id)
    {
        $user = User::find($id);
        File::delete('foto_user/' . $user->photo);
        $user->delete();
        return redirect()->back()->with('message', 'Data User berhasil dihapus');
    }

        public function profil_user()
    {

        return view('visitor/user/profil_user', array('user' => Auth::user()));
    }

}
