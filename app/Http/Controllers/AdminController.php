<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index(){
        // $user = DB::table('users')->get();
    $admin = Admin::all();
    return view('admin.admin_profile', compact('admin'));
  }

  // public function add(){

  // }

  // public function proses_add(Request $request){
    
  // }

  public function edit($id){
    $admin = Admin::find($id);
    return view('admin.adm_edit_profile', compact('admin'));
  }

  // public function update(Request $request, $id){

  //   // $this->validate($request, [
  //   //   'user_id' => ['required'],
  //   //   'company_id' => ['required'],
  //   //   'advertisement_id' => ['required'],
  //   //   'cv' => ['required'],
  //   //   'resume' => ['required'],
  //   // ]);
  //   // if($file1 = $request->file('cv')){
  //   //   $file1->move('cv',$file1->getClientOriginalName());
  //   // }
  //   // if($file2 = $request->file('resume')){
  //   //   $file2->move('resume',$file2->getClientOriginalName());
  //   // }
  //   // $vacancy = Vacancy::find($id);
  //   // if($file1){
  //   //   $vacancy->cv= $file1->getClientOriginalName();
  //   // }
  //   // if($file2){
  //   //   $vacancy->resume= $file2->getClientOriginalName();
  //   // }

  //   // $vacancy->user_id = $request->user_id;
  //   // $vacancy->company_id = $request->company_id;
  //   // $vacancy->advertisement_id = $request->advertisement_id;
  //   // $vacancy->save();

  //   return redirect('/vacancy/data')->with('message', 'Data Lowongan berhasil diubah');
  // }

  // public function delete($id){
  //   $vacancy = Vacancy::find($id);
  //  File::delete('cv/'.$vacancy->cv);
  //  File::delete('resume/'.$vacancy->resume);
  //  $vacancy->delete();
  //  return redirect()->back()->with('message', 'Data Lowongan berhasil dihapus');
 }
}
