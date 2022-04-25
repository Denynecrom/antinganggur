@extends('admin.master')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Tambah Perusahaan</h5>
                <div class="card-body">
                    <form id="addcompany" method="POST" action="/admins/company/proses" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Foto</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="photo" id="photo" type="file" accept="image/png,image/jpg,image/jpeg"  class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}">
                                @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="name" id="name" type="text"  placeholder="Masukkan Nama Perusahaan" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="email" id="email" type="email"  data-parsley-type="email" placeholder="Masukkan Email" class="form-control @error('email') is-invalid @enderror"" value="{{ old('email') }}">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Telepon</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="phone" id="phone" type="text"  placeholder="Masukkan Nomor Telepon" class="form-control @error('phone') is-invalid @enderror"" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Bidang Usaha</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <select name="businessfield_id" id="businessfield_id" class="form-control @error('businessfield_id') is-invalid @enderror">
                                    <option value="" selected disabled="">~ Pilih Bidang ~</option>
                                    @foreach ($business as $bu)
                                    <option value="{{ $bu->id }}"> 
                                        {{ $bu->name }} 
                                    </option>
                                    @endforeach
                                    @error('businessfield_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </select>
                            </div> 
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Provinsi</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <select name="province_id" id="province_id" class="form-control @error('province_id') is-invalid @enderror">
                                    <option value="" selected disabled="">~ Pilih Provinsi ~</option>
                                    @foreach ($province as $prov)
                                    <option value="{{ $prov->id }}"> 
                                        {{ $prov->name }} 
                                    </option>
                                    @endforeach
                                    @error('province_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </select>
                            </div> 
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Alamat</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea name="address" id="address"  class="form-control @error('address') is-invalid @enderror"">{{ old('address') }}</textarea>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Deskripsi</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea name="description" id="editor-description"  class="form-control @error('description') is-invalid @enderror"">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Website</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="website" id="website" type="text"  placeholder="Masukkan Website Perusahaan" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}">
                                @error('website')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Facebook</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="facebook" id="facebook" type="text"  placeholder="Masukkan Facebook Perusahaan" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook') }}">
                                @error('facebook')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Instagram</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="instagram" id="instagram" type="text"  placeholder="Masukkan Instagram Perusahaan" class="form-control @error('instagram') is-invalid @enderror" value="{{ old('instagram') }}">
                                @error('instagram')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input name="password" id="password" type="password"  placeholder="Masukkan Password" class="form-control @error('password') is-invalid @enderror"">
                                @error('password')
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

<!-- ckeditor -->
<script src="/vendor/ckeditor5/ckeditor.js"></script>

<!-- ckeditor - description, qualification -->
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