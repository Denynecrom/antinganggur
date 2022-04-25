@extends('admin.master')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Tambah Lowongan</h5>
                    <div class="card-body">
                        <form id="addcompany" method="POST" action="/admins/vacancy/proses" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama Pelamar</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="" selected disabled>Pilih Pelamar</option>
                                        @foreach (App\Models\User::select('id','firstname', 'lastname')->get() as $user)
                                        <option value="{{ $user->id }}"> 
                                            {{ $user->firstname }} {{ $user->lastname }} 
                                        </option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama Perusahaan</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="company_id" id="company_id" class="form-control">
                                        <option value="" selected disabled>Pilih Perusahaan</option>
                                        @foreach (App\Models\Company::select('id','name')->get() as $company)
                                        <option value="{{ $company->id }}"> 
                                            {{ $company->name }} 
                                        </option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Iklan</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="advertisement_id" id="adverisement_id" class="form-control">
                                        <option value="" selected disabled>Pilih ID Iklan</option>
                                        @foreach (App\Models\Advertisement::select('id')->get() as $ads)
                                        <option value="{{ $ads->id }}"> 
                                            {{ $ads->id }} 
                                        </option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">CV</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="cv" id="cv" type="file" required="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Resume</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="resume" id="resume" type="file" required="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row text-right">
                                <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                    <button type="submit" class="btn btn-space btn-primary">Simpan</button>
                                    <button class="btn btn-space btn-secondary">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection