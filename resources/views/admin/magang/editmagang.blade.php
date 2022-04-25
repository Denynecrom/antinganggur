@extends('admin.master')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Edit Magang</h5>
                    <div class="card-body">
                        <form id="addmagang" method="POST" action="/admins/magang/update/{{ $magang->id }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="name" id="name" type="text"  placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="{{ $magang->name }}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="email" id="email" type="email"  data-parsley-type="email" placeholder="Enter a valid e-mail" class="form-control @error('email') is-invalid @enderror" value="{{ $magang->email }}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">pendidikan</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea name="pendidikan" id="pendidikan"  class="form-control @error('pendidikan') is-invalid @enderror"> {{ $magang->pendidikan }}</textarea>
                                    @error('pendidikan')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">no_hp</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="no_hp" id="no_hp" type="text"  placeholder="Enter Phone Number" class="form-control @error('no_hp') is-invalid @enderror" value="{{ $magang->no_hp }}">
                                    @error('no_hp')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">keahlian</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea name="keahlian" id="keahlian"  class="form-control @error('keahlian') is-invalid @enderror"> {{ $magang->keahlian }}</textarea>
                                    @error('keahlian')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">gaji</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea name="gaji" id="gaji"  class="form-control @error('gaji') is-invalid @enderror"> {{ $magang->gaji }}</textarea>
                                    @error('gaji')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">photo</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="photo" id="photo" type="file" accept="image/png,image/jpg,image/jpeg"  class="form-control @error('photo') is-invalid @enderror" value="{{ $magang->photo }}">
                                    @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Deskripsi</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea name="description" id="editor" class="form-control @error('description') is-invalid @enderror">{{ $magang->description}} </textarea>
                                    @error('description')
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

<!-- ck editor plugin -->
<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>

<!-- implementasi ck editor -->
<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

@endsection