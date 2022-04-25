@extends('admin.master')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Tambah User</h5>
                        <div class="card-body">
                            <form id="adduser" method="POST" action="/admins/user/proses" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama  </label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="name" type="text" required="" placeholder="Masukkan Nama"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="email" type="email" required="" data-parsley-type="email"
                                            placeholder="Masukkan Email"
                                            class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Jenis Kelamin</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="gender" checked="" class="custom-control-input"
                                                value="Laki-Laki"><span class="custom-control-label">Laki-Laki</span>
                                        </label>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="gender" class="custom-control-input"
                                                value="Perempuan"><span class="custom-control-label">Perempuan</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Telepon</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="phone" type="text" required="" placeholder="Masukkan Nomor Telepon"
                                            class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
<!--                                 <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Provinsi</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="province_id" id="province_id" 
                                            class="form-control @error('province_id') is-invalid @enderror">
                                            <option value="" selected disabled>Pilih Provinsi</option>
                                            @foreach ($province as $prov)
                                            <option value="{{ $prov->id }}" selected>{{ $prov->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('province_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Alamat</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <textarea name="address" required=""
                                            class="form-control @error('address') is-invalid @enderror"></textarea>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Tanggal Lahir</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="birthdate" type="date"
                                            class="form-control datetimepicker-input @error('birthdate') is-invalid @enderror">
                                        @error('birthdate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="password" id="password" type="password" required=""
                                            placeholder="Password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Foto</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="photo" type="file" required=""
                                            class="form-control @error('photo') is-invalid @enderror">
                                        @error('photo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Institusi</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="institution" type="text" required=""
                                            class="form-control @error('institution') is-invalid @enderror"
                                            placeholder="Masukkan Institusi">
                                        @error('institution')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Tingkatan</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="level_edu"
                                            class="form-control @error('level_edu') is-invalid @enderror">
                                            <option value="" selected disabled>Pilih Tingkatan</option>
                                            <option value="sd">SD</option>
                                            <option value="smp">SMP</option>
                                            <option value="sma/smk">SMA/SMK</option>
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                        @error('level_edu')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Jurusan</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="major" type="text" required=""
                                            class="form-control @error('major') is-invalid @enderror"
                                            placeholder="Masukkan Jurusan">
                                        @error('major')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Tanggal Lulus</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="graduated_date" type="date" required=""
                                            class="form-control datetimepicker-input @error('graduated_date') is-invalid @enderror">
                                        @error('graduated_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Bahasa Dikuasai</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="name_lang" type="text" required=""
                                            class="form-control @error('name_lang') is-invalid @enderror"
                                            placeholder="Masukkan Bahasa">
                                        @error('name_lang')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Tingkatan</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="level_lang"
                                            class="form-control @error('level_lang') is-invalid @enderror">
                                            <option value="" selected disabled>Pilih Tingkatan</option>
                                            <option value="Pasif">Pasif</option>
                                            <option value="Aktif">Aktif</option>
                                        </select>
                                        @error('level_lang')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Keahlian</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="name_skl" type="text" required=""
                                            class="form-control @error('name_skl') is-invalid @enderror">
                                        @error('name_skl')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Tingkatan</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="level_skl"
                                            class="form-control @error('level_skl') is-invalid @enderror">
                                            <option value="" selected disabled>Pilih Tingkatan</option>
                                            <option value="biasa">Biasa</option>
                                            <option value="mahir">Mahir</option>
                                            <option value="sangat_mahir">Sangat Mahir</option>
                                        </select>
                                        @error('level_skl')
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
