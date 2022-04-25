<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use Illuminate\Http\Request;
use File;

class MagangController extends Controller
{
    public function create()
    {
        // $magang = Magang::all();
        $magang = Magang::paginate(10);

        return view('admin.magang.magangdata', compact('magang'));
    }
    public function add()
    {
        return view('admin.magang.createmagang');
    }
    public function proses_add(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'no_hp' => ['nullable', 'numeric', 'min:0', 'max:9999999999999'],
            'keahlian' => ['required'],
            'pendidikan' => ['required'],
            'gaji' => ['required', 'numeric', 'min:0'],
            'photo' => ['nullable', 'mimes:jpeg,jpg,png'],
            'description' => ['required'],
        ]);

        $file = $request->file('photo');
        $nama_file = $file->getClientOriginalName();
        $folder = 'foto_magang';
        $file->move($folder, $nama_file);

        Magang::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'keahlian' => $request->keahlian,
            'pendidikan' => $request->pendidikan,
            'gaji' => $request->gaji,
            'photo' => $nama_file,
            'description' => $request->description,
        ]);

        return redirect('admins/magang/data')->with('message', 'Data Magang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $magang = Magang::find($id);
        return view('admin.magang.editmagang', compact('magang'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [

            'name' => ['required'],
            'email' => ['required', 'email'],
            'no_hp' => ['nullable', 'numeric', 'min:0', 'max:9999999999999'],
            'keahlian' => ['required'],
            'pendidikan' => ['required'],
            'gaji' => ['required', 'numeric', 'min:0'],
            'photo' => ['nullable', 'mimes:jpeg,jpg,png'],
            'description' => ['required'],
        ]);

        if ($file = $request->file('photo')) {
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $folder = 'foto_magang';
            $file->move($folder, $nama_file);
        }
        $magang = Magang::find($id);
        if ($file) {
            $magang->photo = $nama_file;
        }
        $magang->name = $request->name;
        $magang->email = $request->email;
        $magang->no_hp = $request->no_hp;
        $magang->keahlian = $request->keahlian;
        $magang->pendidikan = $request->pendidikan;
        $magang->gaji = $request->gaji;
        $magang->description = $request->description;
        $magang->save();



        return redirect('admins/magang/data')->with('message', 'Data Magang berhasil diubah');
    }
    public function delete($id)
    {
        $magang = Magang::find($id);
        File::delete('foto_magang/' . $magang->photo);
        $magang->delete();
        return redirect()->back()->with('message', 'Data Magang berhasil dihapus');
    }
}
