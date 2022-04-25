@extends('admin.master')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Edit Iklan {{ $advertisement->id }}</h5>
                    <div class="card-body">
                        <form id="addcompany" method="POST" action="/admins/advertisement/update/{{ $advertisement->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Posisi</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="position" id="position" type="text"  placeholder="Masukkan Nama Posisi" class="form-control @error('position') is-invalid @enderror" value="{{ $advertisement->position }}">
                                    @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Waktu Kerja</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="classification" id="classification" class="form-control @error('classification') is-invalid @enderror" value="{{ $advertisement->classification }}">
                                        <option value="Fulltime" {!!  $advertisement->classification == "Fulltime" ? "selected" : "" !!}>Full Time</option>
                                        <option value="Parttime" {!! $advertisement->classification == "Parttime" ? "selected" : "" !!}>Part Time</option>
                                    </select>
                                    @error('classification')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Pengalaman <span>(tahun)</span></label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="work_experience" id="work_experience" type="number"  placeholder="Masukkan Lama Pengalaman" class="form-control @error('work_experience') is-invalid @enderror" value="{{ $advertisement->work_experience }}">
                                    @error('work_experience')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Tingkatan</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="education"
                                            class="form-control @error('education') is-invalid @enderror" value="{{ $advertisement->education }}">
                                            <option value="sd" {!! $advertisement->education == "sd" ? "selected" : "" !!}>SD</option>
                                            <option value="smp" {!! $advertisement->education == "smp" ? "selected" : "" !!}>SMP</option>
                                            <option value="sma/smk" {!! $advertisement->education == "sma/smk" ? "selected" : "" !!}>SMA/SMK</option>
                                            <option value="d1" {!! $advertisement->education == "d1" ? "selected" : "" !!}>D1</option>
                                            <option value="d2" {!! $advertisement->education == "d2" ? "selected" : "" !!}>D2</option>
                                            <option value="d3" {!! $advertisement->education == "d3" ? "selected" : "" !!}>D3</option>
                                            <option value="d4" {!! $advertisement->education == "d4" ? "selected" : "" !!}>D4</option>
                                            <option value="s1" {!! $advertisement->education == "s1" ? "selected" : "" !!}>S1</option>
                                        </select>
                                        @error('education')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                             </div>
                             <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Deskripsi Pekerjaan <span>(format list)</span></label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea name="workdescription" id="editor-workdescription"  class="form-control @error('workdescription') is-invalid @enderror">{{ $advertisement->workdescription }}</textarea>
                                    @error('workdescription')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Kualifikasi <span>(format list)</span></label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea name="qualification" id="editor-qualification"  class="form-control @error('qualification') is-invalid @enderror">{{ $advertisement->qualification }}</textarea>
                                    @error('qualification')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Gaji</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="salary" id="salary" type="text"  placeholder="Masukkan Gaji" class="form-control @error('salary') is-invalid @enderror" value="{{ $advertisement->salary }}">
                                    @error('salary')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Dibutuhkan</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="needed" id="needed" type="number"  placeholder="Yang Dibutuhkan" class="form-control @error('needed') is-invalid @enderror" value="{{ $advertisement->needed }}">
                                    @error('needed')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Mulai Tayang</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="start_at" id="start_at" type="date"  class="form-control datetimepicker-input @error('start_at') is-invalid @enderror" value="{{ $advertisement->start_at }}">
                                    @error('start_at')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Selesai Tayang</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="end_at" id="end_at" type="date"  class="form-control datetimepicker-input @error('end_at') is-invalid @enderror" value="{{ $advertisement->end_at }}">
                                    @error('end_at')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Tayang</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="show" id="show" value="{{ $advertisement->show }}" class="form-control @error('show') is-invalid @enderror">
                                        <option value="0" {!! $advertisement->show == "0" ? "selected" : "" !!}>Tidak</option>
                                        <option value="1" {!! $advertisement->show == "1" ? "selected" : "" !!}>Ya</option>
                                    </select>
                                    @error('show')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Perusahaan</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="company_id" id="company_id" class="form-control @error('company_id') is-invalid @enderror">
                                        <!-- <option value="" selected disabled>Pilih Perusahaan</option> -->
                                        @foreach ($company as $comp)
                                        <option value="{{ $comp->id }}" {{$advertisement->company_id == $comp->id  ? 'selected' : ''}}> 
                                            {{ $comp->name }} 
                                        </option>
                                        @endforeach
                                        @error('company_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </select>
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

<!-- ckeditor -->
<script src="/vendor/ckeditor5/ckeditor.js"></script>

<!-- ckeditor - description, qualification -->
<script>
    ClassicEditor
            .create( document.querySelector( '#editor-workdescription' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
    ClassicEditor
            .create( document.querySelector( '#editor-qualification' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endsection