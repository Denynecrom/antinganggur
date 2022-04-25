@extends('admin.master')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Tambahkan Info Magang</h5>
                    <div class="card-body">
                        <form id="addmagang" method="POST" action="/admins/magang/proses" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="name" type="text"  placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="email" type="email"  data-parsley-type="email" placeholder="Enter a valid e-mail" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                    @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Pendidikan</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea name="pendidikan"  class="form-control @error('pendidikan') is-invalid @enderror">{{ old('pendidikan') }}</textarea>
                                    @error('pendidikan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">no_hp</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="no_hp" type="text"  placeholder="Enter Phone Number" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}">
                                    @error('no_hp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Keahlian</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea name="keahlian"  class="form-control @error('keahlian') is-invalid @enderror">{{ old('keahlian') }}</textarea>
                                    @error('keahlian')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Gaji</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="gaji" type="text" class="form-control date-inputmask" placeholder="masukkan gajinya @error('gaji') is-invalid @enderror" value="{{ old('gaji') }}">
                                    @error('gaji')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Photo</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="photo" id="photo" type="file"  class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}">
                                    @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Deskripsi</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea name="description" id="editor-description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row text-right">
                                <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                    <button class="btn btn-space btn-secondary">Cancel</button>
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
<!-- <script src="/node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script> -->

<!-- implementasi ck editor -->
<!-- editor photo -->
<!-- <script>
    ClassicEditor
            .create( document.querySelector( '#editor-photo' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script> -->

<!-- editor description -->
<script>
    ClassicEditor
            .create( document.querySelector( '#editor-description' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endsection