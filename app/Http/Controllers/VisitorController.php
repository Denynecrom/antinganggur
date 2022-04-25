<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\BeasiswaController;
use App\Mail\ApplicantAccepted;
use App\Mail\ApplicantNotAccepted;
use App\Models\Advertisement;
use App\Models\Beasiswa;
use App\Models\BusinessField;
use App\Models\Company;
use App\Models\Visitor;
use App\Models\Magang;
use App\Models\User;
use App\Models\Education;
use App\Models\Language;
use App\Models\Skill;
use App\Models\Province;
use App\Models\Vacancy;
use File;

use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class VisitorController extends Controller
{
    public function beranda()
    {
        return view('visitor/beranda');
    }

    // ======================== visitor beasiswa_page ======================== //

    public function beasiswa_page()
    {
        $beasiswa = Beasiswa::all();
        $title = '| Beasiswa';
        // $beasiswa->description = Str::limit($beasiswa->description, 30);
        return view('visitor/beasiswa/beasiswa_page', compact('beasiswa', 'title'));
    }

    public function beasiswa_detail($id)
    {
        $beasiswa = Beasiswa::where('id', $id)->get();

        return view('visitor/beasiswa/beasiswa_detail')->with(['beasiswa' => $beasiswa]);

        // $beasiswa = Beasiswa::all();
        // $title = '| Detail Beasiswa';
        // // $beasiswa = Beasiswa::where();
        // // $slug = $beasiswa->
        // return view('visitor/beasiswa/beasiswa_detail', compact('beasiswa', 'title'));
    }

    public function beasiswa_cari(Request $request)
    {
        // menangkap data pencarian
        $beasiswa_cari = $request->beasiswa_cari;

        // mengambil data dari table beasiswa sesuai pencarian data
        $beasiswa = Beasiswa::where('title', 'like', "%" . $beasiswa_cari . "%")->paginate();

        // mengirim data beasiswa ke view beasiswa
        return view('visitor/beasiswa/beasiswa_page', ['beasiswa' => $beasiswa]);
    }

    // ===========x============ visitor magang_page ===========x============ //
    public function magang_page()
    {
        $magang = DB::table('magangs')->paginate(10);


        return view('visitor/magang/magang_page', ['magang' => $magang]);
    }


    public function magang_detail($id)
    {
        $magang = Magang::where('id', $id)->get();

        return view('visitor/magang/magang_detail')->with(['magang' => $magang]);
    }
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table magang sesuai pencarian data
        $magang = Magang::where('name', 'like', "%" . $cari . "%")->paginate(8);

        // mengirim data magang ke view magang
        return view('/magang/cari', ['magang' => $magang]);
    }

    public function profil_user()
    {
        return view('visitor/user/profil_user', array('user' => Auth::guard('applicant')->user()));
    }
    public function profil_user_detail($id)
    {
        $user = User::where('id', $id)->get();

        return view('visitor/user/profil_user')->with(['user' => $user]);
    }
    public function profil_user_edit()
    {
        return view('visitor/user/profil_user_edit', array('user' => Auth::guard('applicant')->user()));
    }
    public function profil_user_update(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'gender' => ['required'],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
            'birthdate' => ['required', 'date_format:Y-m-d'],
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
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $folder = 'foto_user';
            $file->move($folder, $nama_file);
        }
        $user = User::find(Auth::guard('applicant')->id());

        if ($file) {
            $user->photo = $nama_file;
        }
        $user->name = $request->name;

        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->birthdate = $request->birthdate;

        $user->save();

        $education = $user->education()->create([
            'institution' => $request->input('institution'),
            'level_edu' => $request->input('level_edu'),
            'major' => $request->input('major'),
            'graduated_date' => $request->input('graduated_date'),
        ]);

        $language = $user->language()->create([
            'name_lang' => $request->input('name_lang'),
            'level_lang' => $request->input('level_lang'),
        ]);

        $skill = $user->Skill()->create([
            'name_skl' => $request->input('name_skl'),
            'level_skl' => $request->input('level_skl'),
        ]);

        return redirect('/profil_user')->with('message', 'Data User berhasil diubah');
    }

    public function profil_perusahaan()
    {
        return view('visitor/company/profil_company', array('company' => Auth::guard('company')->user()));
    }

    public function profil_perusahaan_edit()
    {
        return view(
            'visitor/company/profil_company_edit',
            array(
                'company' => Auth::guard('company')->user(),
                'business_fields' => BusinessField::all(),
                'provinces' => Province::all()
            )
        );
    }

    public function profil_perusahaan_update(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'businessfield_id' => ['required', 'exists:businessfields,id'],
            'description' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
            'province_id' => ['required', 'exists:provinces,id'],
            'website' => ['nullable', 'url'],
            'facebook' => ['nullable'],
            'instagram' => ['nullable'],
            'password' => ['sometimes'],
        ]);

        if ($file = $request->file('photo')) {
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $folder = 'foto_company';
            $file->move($folder, $nama_file);
        }

        $company = Company::find(Auth::guard('company')->id());

        if ($file) {
            $company->photo = $nama_file;
        }

        $company->name = $request->name;
        $company->businessfield_id = $request->businessfield_id;
        $company->description = $request->description;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->province_id = $request->province_id;
        $company->website = $request->website;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;

        $company->save();

        return redirect('/profil_perusahaan')->with('message', 'Data Perusahaan berhasil diubah');
    }

    public function ubah_password()
    {
        return view('visitor/profil/ubah_password');
    }

    public function ubah_password_update(Request $request)
    {
        $guard = Auth::guard('applicant')->check() ? 'applicant' : 'company';

        $this->validate($request, [
            'password_old' => ['required', 'password:' . $guard],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::find(Auth::guard($guard)->id());
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->back()->with('message', 'Password berhasil diubah');
    }

    public function berkas()
    {
        return view('visitor/user/berkas', array('user' => Auth::guard('applicant')->user()));
    }

    public function berkas_update(Request $request)
    {
        $this->validate($request, [
            'resume' => 'mimes:pdf',
            'cv' => 'mimes:pdf'
        ]);

        $user = User::find(Auth::guard('applicant')->id());

        if ($file = $request->file('resume')) {
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $folder = 'resume';
            $file->move($folder, $nama_file);

            if (!empty($user->resume)) {
                Storage::delete('resume/' . $user->resume);
            }

            $user->resume = $nama_file;
        }

        if ($file = $request->file('cv')) {
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $folder = 'cv';
            $file->move($folder, $nama_file);

            if (!empty($user->cv)) {
                Storage::delete('cv/' . $user->cv);
            }

            $user->cv = $nama_file;
        }

        $user->save();

        return redirect('/berkas')->with('message', 'Berhasil mengunggah berkas');
    }

    public function perusahaan_lamaran()
    {
        $company = Auth::guard('company')->user();

        $advertisements = $company->advertisement()->with('vacancy')->get();

        return view('visitor/company/lamaran', compact('company', 'advertisements'));
    }

    public function perusahaan_lamaran_reply(Vacancy $vacancy, Request $request)
    {
        $this->validate($request, [
            'status' => ['in:accepted,rejected']
        ]);

        $vacancy->status = $request->status;
        $vacancy->save();

        $is_accepting = $request->status === 'accepted';
        $not_accepted = $request->status === 'rejected';
        $action_word = $is_accepting ? 'menerima' : 'menolak';

        if ($is_accepting) {
            Mail::to($vacancy->user->email)->send(new ApplicantAccepted($vacancy));
        }
        if ($not_accepted) {
            Mail::to($vacancy->user->email)->send(new ApplicantNotAccepted($vacancy));
        }

        return redirect()->back()->with('message', "Berhasil $action_word lamaran");
    }

    public function perusahaan_iklan()
    {
        $company = Auth::guard('company')->user();
        $advertisements = $company->advertisement()->where('show', 1)->get();

        return view('visitor/company/profil_iklan', array('advertisements' => $advertisements, 'company' => $company));
    }
    public function perusahaan_iklan_inactive()
    {
        $company = Auth::guard('company')->user();
        $advertisements = $company->advertisement()->where('show', 0)->get();

        return view('visitor/company/profil_iklan_inactive', array('advertisements' => $advertisements, 'company' => $company));
    }

    public function perusahaan_iklan_create()
    {
        $company = Auth::guard('company')->user();
        $action = [
            'url' => '/profil_perusahaan/iklan/buat',
            'label' => 'Buat',
            'method' => 'POST',
            'submit' => 'Buat Iklan'
        ];

        return view('visitor/company/profil_iklan_form', array('company' => $company, 'action' => $action));
    }

    public function perusahaan_iklan_store(Request $request)
    {
        $this->validate($request, [
            'position' => ['required'],
            'classification' => ['required', 'in:Fulltime,Parttime'],
            'work_experience' => ['required', 'integer', 'min:0'],
            'education' => ['required', 'in:sd,smp,sma/smk,d1,d2,d3,d4,s1'],
            'workdescription' => ['required'],
            'qualification' => ['required'],
            'salary' => ['required', 'integer', 'min:1'],
            'needed' => ['required', 'integer', 'min:1'],
            'start_at' => ['required', 'date'],
            'end_at' => ['required', 'date'],
        ]);

        $company = Auth::guard('company')->user();

        $ads = $company->advertisement()->create($request->only([
            'position',
            'classification',
            'work_experience',
            'education',
            'workdescription',
            'qualification',
            'salary',
            'needed',
            'start_at',
            'end_at'
        ]));

        return redirect("/profil_perusahaan/iklan/")->with('message', 'Berhasil membuat iklan, Hubungi Admin untuk aktifasi iklan');
    }

    public function perusahaan_iklan_edit(Advertisement $ads)
    {
        $company = Auth::guard('company')->user();
        $action = [
            'url' => "/profil_perusahaan/iklan/$ads->id",
            'label' => 'Edit',
            'method' => 'PUT',
            'submit' => 'Perbarui Iklan'
        ];

        return view('visitor/company/profil_iklan_form', array('company' => $company, 'ads' => $ads, 'action' => $action));
    }

    public function perusahaan_iklan_update(Advertisement $ads, Request $request)
    {
        $this->validate($request, [
            'position' => ['required'],
            'classification' => ['required', 'in:Fulltime,Parttime'],
            'work_experience' => ['required', 'integer', 'min:0'],
            'education' => ['required', 'in:sd,smp,sma/smk,d1,d2,d3,d4,s1'],
            'workdescription' => ['required'],
            'qualification' => ['required'],
            'salary' => ['required', 'integer', 'min:1'],
            'needed' => ['required', 'integer', 'min:1'],
            'start_at' => ['required', 'date'],
            'end_at' => ['required', 'date'],
        ]);

        $ads->position = $request->position;
        $ads->classification = $request->classification;
        $ads->work_experience = $request->work_experience;
        $ads->education = $request->education;
        $ads->workdescription = $request->workdescription;
        $ads->qualification = $request->qualification;
        $ads->salary = $request->salary;
        $ads->needed = $request->needed;
        $ads->start_at = $request->start_at;
        $ads->end_at = $request->end_at;

        $ads->save();

        return redirect("/profil_perusahaan/iklan/")->with('message', 'Berhasil memperbarui data iklan');
    }
}
