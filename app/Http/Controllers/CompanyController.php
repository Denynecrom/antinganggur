<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Province;
use App\Models\Advertisement;
use App\Models\BusinessField;
use Illuminate\Http\Request;
use File;

class CompanyController extends Controller
{
    public function search(Request $request)
    {
        $cari = $request->cari;
        $company = Company::where('name', 'like', "%".$cari."%")->paginate();
        $title = "| Perusahaan";
        return view('visitor.company.iklan_company', compact('company', 'title'));
    }

    public function index()
    {
        // $company = DB::table('companies')->paginate(15);
        $company = Company::paginate(10);
        return view('admin.company.companydata', compact('company'));
    }

    public function show(){
        $company = Company::all();
        $title = "| Perusahaan";
        return view('visitor.company.dashboardcompany', compact('company', 'title'));
    }

    public function list_comp(){
        $company = Company::orderBy('name')->get();
        $title = "| Perusahaan";
        return view('visitor.company.iklan_company', compact('company', 'title'));
    }
    public function list_comp_detail($id){
        $company = Company::find($id);
        $advertisement = Advertisement::where('company_id', $id)->where('show', 1)->get();
        $title = "| Perusahaan";
        return view('visitor.company.iklan_company_detail', compact('company','advertisement','title'));
    }
 

    public function add()
    {
        $province = Province::all();
        $business = BusinessField::all();
        return view('admin.company.createcompany', compact('province', 'business'));
    }

    public function proses_add(Request $request)
    {
        
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric', 'min:0', 'max:9999999999999'],
            'businessfield_id' => ['required'],
            'province_id' => ['required'],
            'address' => ['required'],
            'description' => ['required'],
            'password' => ['required'],
            'photo' => ['nullable', 'mimes:jpeg,jpg,png'],
            'website' => ['nullable'],
            'facebook' => ['nullable'],
            'instagram' => ['nullable'],
        ]);

        $file = $request->file('photo');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $folder = 'foto_company';
        $file->move($folder, $nama_file);

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'businessfield_id' => $request->businessfield_id,
            'province_id' => $request->province_id,
            'address' => $request->address,
            'description' => $request->description,
            'password' => bcrypt($request->password),
            'photo' => $nama_file,
            'website' => $request->website,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
        ]);


        return redirect('admins/company/data')->with('message', 'Data Perusahaan berhasil dibuat');
    }

    public function edit($id)
    {
        $company = Company::find($id);
        $province = Province::all();
        $business = BusinessField::all();
        return view('admin.company.editcompany', compact('company', 'province', 'business'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required', 'numeric', 'min:0', 'max:9999999999999'],
            'businessfield_id' => ['required'],
            'province_id' => ['required'],
            'address' => ['required'],
            'description' => ['required'],
            'password' => ['required'],
            'photo' => ['nullable', 'mimes:jpeg,jpg,png'],
            'website' => ['nullable'],
            'facebook' => ['nullable'],
            'instagram' => ['nullable'],
        ]);
        if ($file = $request->file('photo')) {
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $folder = 'foto_company';
            $file->move($folder, $nama_file);
        }
        $company = Company::find($id);
        if ($file) {
            $company->photo = $nama_file;
        }
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->businessfield_id = $request->businessfield_id;
        $company->province_id = $request->province_id;
        $company->address = $request->address;
        $company->description = $request->description;
        $company->password = $request->password;
        $company->website = $request->website;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;
        $company->save();

        return redirect('admins/company/data')->with('message', 'Data Perusahaan berhasil diubah');
    }

    public function delete($id)
    {
        $company = Company::find($id);
        File::delete('foto_company/' . $company->photo);
        $company->delete();
        return redirect()->back()->with('message', 'Data Perusahaan berhasil dihapus');
    }
}
