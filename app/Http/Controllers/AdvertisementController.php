<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisement = Advertisement::where('show', 1)->paginate(10);
        $company = Company::all();
        return view('admin.advertisement.advertisementdata', compact('advertisement', 'company'));
    }
    public function index_inactive()
    {
        $advertisement = Advertisement::where('show', 0)->paginate(10);
        $company = Company::all();
        return view('admin.advertisement.advertisementdata_inactive', compact('advertisement', 'company'));
    }

    public function show()
    {
        $advertisement = Advertisement::where('show', 1)->get();
        $company = Company::all();
        $title = "| Lowongan";
        return view('visitor.lowongan.list_iklan2', compact('advertisement', 'company', 'title'));
    }
    public function show_detail($id)
    {
        $advertisement = Advertisement::find($id);
        $title = "| Lowongan";
        $guard = 'applicant';

        $is_applicant = Auth::guard($guard)->check();
        $user = Auth::guard($guard)->user();

        $is_eligible = $is_applicant && !empty($user->resume) && !empty($user->cv);
        $is_applied = $is_applicant && $advertisement->vacancy()->where('user_id', Auth::guard($guard)->id())->count() > 0;

        return view('visitor.lowongan.iklan_details2', compact('advertisement', 'title', 'is_eligible', 'is_applied'));
    }

    public function add()
    {
        return view('admin.advertisement.createads');
    }

    public function proses_add(Request $request)
    {
        $this->validate($request, [
        	'position' => ['required'],
        	'classification' => ['required'],
            'work_experience' => ['required'],
            'education' => ['required'],
            'workdescription' => ['required'],
            'qualification' => ['required'],
            'salary' => ['required', 'numeric'],
            'needed' => ['required', 'numeric'],
            'start_at' => ['required', 'date_format:Y-m-d'],
            'end_at' => ['required', 'date_format:Y-m-d', 'after:start_at'],
            'company_id' => ['required'],
        ]);

        Advertisement::create([
            'position' => $request->position,
        	'classification' => $request->classification,
            'work_experience' => $request->work_experience,
            'education' => $request->education,
            'workdescription' => $request->workdescription,
            'qualification' => $request->qualification,
            'salary' => $request->salary,
            'needed' => $request->needed,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'show' => $request->show,
            'company_id' => $request->company_id,
        ]);

        return redirect('admins/advertisement/active')->with('message', 'Data Iklan berhasil dibuat');
    }

    public function edit($id)
    {
        $advertisement = Advertisement::find($id);
        $company = Company::select('id', 'name')->get();
        return view('admin.advertisement.editads', compact('advertisement', 'company'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'position' => ['required'],
            'classification' => ['required'],
            'work_experience' => ['required'],
            'education' => ['required'],
            'workdescription' => ['required'],
            'qualification' => ['required'],
            'salary' => ['required', 'numeric'],
            'needed' => ['required', 'numeric'],
            'start_at' => ['required', 'date_format:Y-m-d'],
            'end_at' => ['required', 'date_format:Y-m-d', 'after:start_at'],
            'company_id' => ['required'],
        ]);

        $advertisement = Advertisement::find($id);
        $advertisement->position = $request->position;
        $advertisement->classification = $request->classification;
        $advertisement->work_experience = $request->work_experience;
        $advertisement->education = $request->education;
        $advertisement->workdescription = $request->workdescription;
        $advertisement->qualification = $request->qualification;
        $advertisement->salary = $request->salary;
        $advertisement->needed = $request->needed;
        $advertisement->start_at = $request->start_at;
        $advertisement->end_at = $request->end_at;
        $advertisement->show = $request->show;
        $advertisement->company_id = $request->company_id;
        $advertisement->save();
        return redirect('admins/advertisement/active')->with('message', 'Data Iklan berhasil diubah');
    }


    public function delete($id)
    {
        $advertisement = Advertisement::find($id);
        $advertisement->delete();
        return redirect()->back()->with('message', 'Data Iklan berhasil dihapus');
    }

    public function apply_job($id)
    {
        $user = Auth::guard('applicant')->user();

        if (empty($user->resume) || empty($user->cv)) {
            return redirect()->back()->with('message', 'Gagal melamar pekerjaan. Anda belum mengunggah CV dan resume');
        }

        $user->vacancy()->create([
            'advertisement_id' => $id,
        ]);

        return redirect()->back()->with('message', 'Berhasil melamar pekerjaan');
    }
}
