<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Beasiswa;
use File;
use Validator;

class BeasiswaController extends Controller
{
    public function index()
    {
        $beasiswa = Beasiswa::paginate(10); //pagination
        // $beasiswa = Beasiswa::all()->paginate(5);
        // $beasiswa = DB::table('beasiswa')->simplePaginate(10);

        return view('admin/beasiswa/beasiswadata', ['beasiswa' => $beasiswa]);
    }

    public function add()
    {
        return view('admin/beasiswa/createbeasiswa');
    }

    public function proses_add(Request $request)
    {
        $this->validate($request, [
            'title' => ['required'],
            'photo' => ['nullable'],
            'email' => ['required'],
            'no_hp' => ['required'],
            'jenjang_pendidikan' => ['required'],
            'start_at' => ['required'],
            'description' => ['required'],
        ]);

        $file = $request->file('photo');
        $nama_file = $file->getClientOriginalName();
        $folder = "foto_beasiswa";
        $file->move($folder, $nama_file);

        Beasiswa::create([
            'title' => $request->title,
            'photo' => $nama_file,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'start_at' => $request->start_at,
            'description' => $request->description,
        ]);

        return redirect('admins/beasiswa/data')->with('message', 'Data Informasi Beasiswa berhasil dibuat');
    }

    public function edit($id)
    {
        $beasiswa = Beasiswa::find($id);
        return view('admin/beasiswa/editbeasiswa', compact('beasiswa'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => ['required'],
            'photo' => ['nullable'],
            'email' => ['required'],
            'no_hp' => ['required'],
            'jenjang_pendidikan' => ['required'],
            'start_at' => ['required'],
            'description' => ['required'],
        ]);

        if ($file = $request->file('photo')) {
            $file->move('foto_beasiswa', $file->getClientOriginalName());
        }

        $beasiswa = Beasiswa::find($id);
        $beasiswa->title = $request->title;
        if ($file) {
            $beasiswa->photo = $file->getClientOriginalName();
        }
        $beasiswa->email = $request->email;
        $beasiswa->no_hp = $request->no_hp;
        $beasiswa->jenjang_pendidikan = $request->jenjang_pendidikan;
        $beasiswa->start_at = $request->start_at;
        $beasiswa->description = $request->description;
        $beasiswa->save();

        return redirect('admins/beasiswa/data')->with('message', 'Data Informasi Beasiswa berhasil diubah');
    }

    public function delete($id)
    {
        $beasiswa = Beasiswa::find($id);
        File::delete('foto_beasiswa/' . $beasiswa->photo);
        $beasiswa->delete();
        return redirect()->back()->with('massage', 'Data Perusahaan berhasil dihapus');
    }


    /* =============================== SHOW VISITOR BEASISWA ======================================*/
    // public function show()
    // {
    //     $advertisement = Beasiswa::where('show', 1)->get();
    //     $beasiswa = Beasiswa::all();
    //     $title = "| Beasiswa";
    //     return view('visitor.beasiswa.show_list_beasiswa', compact('beasiswa', 'title'));
    // }

    // public function show_detail($id)
    // {
    //     $advertisement = Beasiswa::find($id);
    //     $title = "| Beasiswa";
    //     return view('', compact('advertisement', 'title'));
    // }
}


