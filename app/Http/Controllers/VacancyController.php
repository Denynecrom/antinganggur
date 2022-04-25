<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Models\User;
use App\Models\Company;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use File;

class VacancyController extends Controller
{
    public function index()
    {
        // $user = DB::table('users')->get();
        // $vacancy = Vacancy::all();
        $vacancy = Vacancy::paginate(10);
        $user = User::all();
        $company = Company::all();
        $advertisement = Advertisement::all();
        return view('admin.vacancy.vacancydata', compact('vacancy', 'user', 'company', 'advertisement'));
    }

    public function add()
    {
        return view('admin.vacancy.createvacancy');
    }

    public function proses_add(Request $request)
    {
        $this->validate($request, [
            'user_id' => ['required'],
            'company_id' => ['required'],
            'advertisement_id' => ['required'],
            'cv' => ['required'],
            'resume' => ['required'],
        ]);

        $file1 = $request->file('cv');
        $nama_file1 = $file1->getClientOriginalName();
        $folder1 = 'cv';
        $file1->move($folder1, $nama_file1);

        $file2 = $request->file('resume');
        $nama_file2 = $file2->getClientOriginalName();
        $folder2 = 'resume';
        $file2->move($folder2, $nama_file2);

        Vacancy::create([
            'user_id' => $request->user_id,
            'company_id' => $request->company_id,
            'advertisement_id' => $request->advertisement_id,
            'cv' => $nama_file1,
            'resume' => $nama_file2,
        ]);
        return redirect('admins/vacancy/data')->with('message', 'Data Lowongan berhasil dibuat');
    }

    public function edit($id)
    {
        $vacancy = Vacancy::find($id);
        $user = User::select('id', 'name')->get();
        $company = Company::select('id', 'name')->get();
        $advertisement = Advertisement::select('id')->get();
        return view('admin.vacancy.editvacancy', compact('vacancy', 'user', 'company', 'advertisement'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'user_id' => ['required'],
            'company_id' => ['required'],
            'advertisement_id' => ['required'],
            'cv' => ['required'],
            'resume' => ['required'],
        ]);
        if ($file1 = $request->file('cv')) {
            $file1->move('cv', $file1->getClientOriginalName());
        }
        if ($file2 = $request->file('resume')) {
            $file2->move('resume', $file2->getClientOriginalName());
        }
        $vacancy = Vacancy::find($id);
        if ($file1) {
            $vacancy->cv = $file1->getClientOriginalName();
        }
        if ($file2) {
            $vacancy->resume = $file2->getClientOriginalName();
        }

        $vacancy->user_id = $request->user_id;
        $vacancy->company_id = $request->company_id;
        $vacancy->advertisement_id = $request->advertisement_id;
        $vacancy->save();

        return redirect('admins/vacancy/data')->with('message', 'Data Lowongan berhasil diubah');
    }

    public function delete($id)
    {
        $vacancy = Vacancy::find($id);
        File::delete('cv/' . $vacancy->cv);
        File::delete('resume/' . $vacancy->resume);
        $vacancy->delete();
        return redirect()->back()->with('message', 'Data Lowongan berhasil dihapus');
    }
}
