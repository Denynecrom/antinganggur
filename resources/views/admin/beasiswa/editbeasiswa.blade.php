@extends('admin.master')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Tambah Informasi Beasiswa {{ $beasiswa->id }} </h5>
                <div class="card-body">
                <form method="POST" action="/admins/beasiswa/update/{{ $beasiswa->id }}" id="addbeasiswa" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Judul</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $beasiswa->title}}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Foto</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <!-- <h1>{{ $beasiswa->photo }}</h1> -->
                            <input value="{{ $beasiswa->photo }}" name="photo" id="photo" type="file" class="form-control @error('photo') is-invalid @enderror">
                            @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Tanggal Upload</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                        <!-- <h1>{{ $beasiswa->start_at }}</h1> -->
                            <input name="start_at" type="datetime" id="start_at" class="form-control @error('start_at') is-invalid @enderror" value="{{ $beasiswa->start_at }}">
                            @error('start_at')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $beasiswa->email}}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">No HP</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="no_hp" id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" value="{{ $beasiswa->no_hp}}">
                            @error('no_hp')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Jenjang Pendidikan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="jenjang_pendidikan" id="jenjang_pendidikan" type="text" class="form-control @error('jenjang_pendidikan') is-invalid @enderror" value="{{ $beasiswa->jenjang_pendidikan}}">
                            @error('jenjang_pendidikan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Deskripsi</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <textarea name="description" id="editor" class="form-control @error('description') is-invalid @enderror">{{ $beasiswa->description}} </textarea>
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
