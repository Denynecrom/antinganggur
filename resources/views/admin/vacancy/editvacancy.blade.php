@extends('admin.master')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Edit vacancy {{ old('user_id', $vacancy->user->name) }}</h5>
                    <div class="card-body">
                        <form id="addvacancy" method="POST" action="/admins/vacancy/update/{{ $vacancy->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama Pelamar</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                        @foreach ($user as $usr)
                                        <option value="{{ $usr->id }}" {{$vacancy->user_id == $usr->id  ? 'selected' : ''}}>{{ $usr->name }}</option>
                                        @endforeach
                                        @error('user_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </select>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama Perusahaan</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="company_id" id="company_id" class="form-control @error('company_id') is-invalid @enderror">
                                        @foreach ($company as $comp)
                                        <option value="{{ $comp->id }}" {{$vacancy->company_id == $comp->id  ? 'selected' : ''}}> 
                                            {{ $comp->name }} 
                                        </option>
                                        @endforeach
                                        @error('company_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </select>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Iklan</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="advertisement_id" id="advertisement_id" class="form-control @error('advertisement_id') is-invalid @enderror">
                                        @foreach ($advertisement as $ads)
                                        <!-- <option value="{{ $ads->id }}"> 
                                            {{ $ads->id }} 
                                        </option> -->
                                        <option value="{{ $ads->id }}" {{$vacancy->advertisement_id == $ads->id  ? 'selected' : ''}}>{{ $ads->id }}</option>
                                        @endforeach
                                        @error('advertisement_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </select>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">CV</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="cv" id="cv" type="file" required="" class="form-control @error('cv') is-invalid @enderror" value="{{ old('cv') }}">
                                    @error('cv')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Resume</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="resume" id="resume" type="file" required="" class="form-control @error('resume') is-invalid @enderror" value="{{ old('resume') }}">
                                    @error('resume')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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