@extends('visitor.profil.layout')

@section('name', $company->name)
@section('photo', $company->photo ? '/foto_company/'.$company->photo : null)
@section('profile_content')
  <!-- TAB PROFILE -->
  <!-- wrapcontent -->
  <div class="container-content_company tabcontent" id="profile">
    @if (!$company->has_complete_data())
      <div class="alert alert-info">Harap lengkapi data terlebih dahulu sebelum mulai menggunakan platform</div>
    @endif
    <!-- content -->
    <div class="info_com">
      <div class="list_part">
        <h3>Informasi Perusahaan</h3>
        <div class="garis"></div>
        <div class="list_content">
          <h4>Logo Perusahaan</h4>
          <img src="{{ $company->photo ? '/foto_company/'.$company->photo : '/images/no-images.png' }}" style="width: 150px">
        </div>
        <div class="list_content">
          <h4>Nama Perusahaan</h4>
          <p>{{ $company->name }}</p>
        </div>
        <div class="list_content">
          <h4>Bidang Usaha</h4>
          <p>{{ $company->businessfield ? $company->businessfield->name : 'Belum ada data' }}</p>
        </div>
        <div class="list_content">
          <h4>Deskripsi Perusahaan</h4>
          <p>{{ $company->description ? $company->description : 'Belum ada data' }}</p>
        </div>
      </div>
      <div class="list_part">
        <h3>Kontak Perusahaan</h3>
        <div class="garis"></div>
        <div class="list_content">
          <h4>Email Perusahaan</h4>
          <p>{{ $company->email }}</p>
        </div>
        <div class="list_content">
          <h4>Telepon Perusahaan</h4>
          <p>{{ $company->phone ? $company->phone : 'Belum ada data' }}</p>
        </div>
        <div class="list_content">
          <h4>Alamat Perusahaan</h4>
          <p>{{ $company->address ? $company->address : 'Belum ada data' }}</p>
        </div>
      </div>
      <div class="list_part">
        <h3>Sosial Media Perusahaan</h3>
        <div class="garis"></div>
        <div class="list_content">
          <h4>Website</h4>
          <p>{{ $company->website ? $company->website : 'Belum ada data' }}</p>
        </div>
        <div class="list_content">
          <h4>Facebook</h4>
          <p>{{ $company->facebook ? $company->facebook : 'Belum ada data' }}</p>
        </div>
        <div class="list_content">
          <h4>Instagram</h4>
          <p>{{ $company->instagram ? $company->instagram : 'Belum ada data' }}</p>
        </div>
      </div>
    </div>
    <!-- endcontent -->
    <!-- button -->
    <div class="button_ubah">
      <h5><a href="/profil_perusahaan/edit">Ubah</a></h5>
    </div>
    <!-- endbutton -->
  </div>
  <!-- endwrapcontent -->
  <!-- END TAB PROFILE -->
  <!-- TAB IKLAN AKTIF-->
  <!-- wrapcontent -->
  <div class="container-content_company tabcontent" id="iklanAktif">
    <!-- content -->
    <div class="info_com">
      <div class="list_part">
        <h3>Iklan Aktif</h3>
        <div class="garis"></div>
      </div>
      <div class="list_part">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Posisi</th>
                      <th>Waktu Kerja</th>
                      <th>Min Pendidikan</th>
                      <th>Gaji</th>
                      <th>Pengalaman</th>
                      <th>Dibutuhkan</th>
                      <th>Deskripsi</th>
                      <th>Kualifikasi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Manajer Keuangan</td>
                      <td>Full Time</td>
                      <td>S1</td>
                      <td>Rp 5000000</td>
                      <td>1 Tahun</td>
                      <td>1 Orang</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                      <td>
                        <a href="#" class="fas fa-pencil-alt btn-edit">
                        Edit</a>
                        <a href="#" class="fas fa-trash btn-hapus">
                        Hapus</a>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Staff admin</td>
                      <td>Full Time</td>
                      <td>S1</td>
                      <td>Rp 5000000</td>
                      <td>1 Tahun</td>
                      <td>1 Orang</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation uelit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud  Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                      <td>
                        <a href="#" class="fas fa-pencil-alt btn-edit">
                        Edit</a>
                        <a href="#" class="fas fa-trash btn-hapus">
                        Hapus</a>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>System Architect</td>
                      <td>Full Time</td>
                      <td>S1</td>
                      <td>Rp 5000000</td>
                      <td>1 Tahun</td>
                      <td>1 Orang</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor inte velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud datat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                      <td>
                        <a href="#" class="fas fa-pencil-alt btn-edit">
                        Edit</a>
                        <a href="#" class="fas fa-trash btn-hapus">
                        Hapus</a>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Posisi</th>
                      <th>Waktu Kerja</th>
                      <th>Min Pendidikan</th>
                      <th>Gaji</th>
                      <th>Pengalaman</th>
                      <th>Dibutuhkan</th>
                      <th>Deskripsi</th>
                      <th>Kualifikasi</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- endcontent -->
  </div>
  <!-- endwrapcontent -->
  <!-- END TAB IKLAN AKTIF -->
  <!-- TAB PASANG IKLAN -->
  <!-- wrapcontent -->
  <div class="container-content_company tabcontent" id="pasangIklan">
    <!-- content -->
    <div class="info_com">
      <div class="list_part">
        <h3>Pasang Iklan</h3>
        <div class="garis"></div>
        <div class="list_content">
          <label><h4>Posisi Lowongan</h4></label>
          <input type="text" name="position" class="form-control form-control-lg" placeholder="Masukkan Posisi">
        </div>
        <div class="list_content">
          <label><h4>Waktu Kerja</h4></label>
          <select name="classification" class="form-control form-control-lg">
            <option value="" selected disabled>Pilih Waktu Kerja</option>
            <option value="Fulltime">Full Time</option>
            <option value="Parttime">Part Time</option>
          </select>
        </div>
        <div class="list_content">
          <label><h4>Pengalaman</h4></label><span> (tahun)</span>
          <input type="number" name="work_experience" class="form-control form-control-lg" placeholder="Masukkan Min Pengalaman">
        </div>
        <div class="list_content">
          <label><h4>Tingkat Pendidikan</h4></label>
          <select name="education"
          class="form-control form-control-lg">
          <option value="" selected disabled>Pilih Tingkatan</option>
          <option value="sd">SD</option>
          <option value="smp">SMP</option>
          <option value="sma/smk">SMA/SMK</option>
          <option value="d1">D1</option>
          <option value="d2">D2</option>
          <option value="d3">D3</option>
          <option value="d4">D4</option>
          <option value="s1">S1</option>
        </select>
        </div>
        <div class="list_content">
          <label><h4>Deskripsi Pekerjaan</h4></label><span> (format list)</span>
          <textarea name="workdescription" id="editor-workdescription"  class="form-control"></textarea>
        </div>
        <div class="list_content">
          <label><h4>Kualifikasi</h4></label><span> (format list)</span>
          <textarea name="qualification" id="editor-qualification"  class="form-control"></textarea>
        </div>
        <div class="list_content">
          <label><h4>Gaji</h4></label>
          <input type="number" name="salary" class="form-control form-control-lg" placeholder="Masukkan Gaji">
        </div>
        <div class="list_content">
          <label><h4>Dibutuhkan</h4></label>
          <input type="number" name="needed" class="form-control form-control-lg" placeholder="Yang Dibutuhkan">
        </div>
      </div>


    </div>
    <!-- endcontent -->
    <!-- button -->
    <div class="button_ubah">
      <h5><a href="#">Simpan</a></h5>
    </div>
    <!-- endbutton -->
  </div>
  <!-- endwrapcontent -->
  <!-- END TAB PASANG IKLAN -->
  <!-- TAB RIWAYAT IKLAN-->
  <!-- wrapcontent -->
  <div class="container-content_company tabcontent" id="riwayat">
    <!-- content -->
    <div class="info_com">
      <div class="list_part">
        <h3>Riwayat Iklan</h3>
        <div class="garis"></div>
      </div>
      <div class="list_part">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Posisi</th>
                      <th>Waktu Kerja</th>
                      <th>Min Pendidikan</th>
                      <th>Gaji</th>
                      <th>Pengalaman</th>
                      <th>Dibutuhkan</th>
                      <th>Deskripsi</th>
                      <th>Kualifikasi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Manajer Keuangan</td>
                      <td>Full Time</td>
                      <td>S1</td>
                      <td>Rp 5000000</td>
                      <td>1 Tahun</td>
                      <td>1 Orang</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                      <td>
                        <!-- <a href="#" class="fas fa-pencil-alt btn-edit">
                        Edit</a> -->
                        <a href="#" class="fas fa-trash btn-hapus">
                        Hapus</a>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Staff admin</td>
                      <td>Full Time</td>
                      <td>S1</td>
                      <td>Rp 5000000</td>
                      <td>1 Tahun</td>
                      <td>1 Orang</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation uelit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud  Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                      <td>
                       <!--  <a href="#" class="fas fa-pencil-alt btn-edit">
                        Edit</a> -->
                        <a href="#" class="fas fa-trash btn-hapus">
                        Hapus</a>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>System Architect</td>
                      <td>Full Time</td>
                      <td>S1</td>
                      <td>Rp 5000000</td>
                      <td>1 Tahun</td>
                      <td>1 Orang</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor inte velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud datat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                      <td>
                        <!-- <a href="#" class="fas fa-pencil-alt btn-edit">
                        Edit</a> -->
                        <a href="#" class="fas fa-trash btn-hapus">
                        Hapus</a>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Posisi</th>
                      <th>Waktu Kerja</th>
                      <th>Min Pendidikan</th>
                      <th>Gaji</th>
                      <th>Pengalaman</th>
                      <th>Dibutuhkan</th>
                      <th>Deskripsi</th>
                      <th>Kualifikasi</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- endcontent -->
  </div>
  <!-- endwrapcontent -->
  <!-- END RIWAYAT IKLAN -->
  <!-- TAB LAMARAN-->
  <!-- wrapcontent -->
  <div class="container-content_company tabcontent" id="lamaran">
    <!-- content -->
    <div class="info_com">
      <div class="list_part">
        <h3>Lamaran</h3>
        <div class="garis"></div>
      </div>
      <div class="list_part">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>ID Iklan</th>
                      <th>Pelamar</th>
                      <th>CV</th>
                      <th>Resume</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>1</td>
                      <td>Bambang Baskara</td>
                      <td>CV_bambang.pdf</td>
                      <td>RESUME_bambang.pdf</td>
                      <td>
                        <a href="#" class="fas fa-trash btn-hapus">
                        Hapus</a>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>2</td>
                      <td>Bambang Widjaya</td>
                      <td>CV_bambangw.pdf</td>
                      <td>RESUME_bambangw.pdf</td>
                      <td>
                        <a href="#" class="fas fa-trash btn-hapus">
                        Hapus</a>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>4</td>
                      <td>Baskara Widjaya</td>
                      <td>CV_baskara.pdf</td>
                      <td>RESUME_baskara.pdf</td>
                      <td>
                        <a href="#" class="fas fa-trash btn-hapus">
                        Hapus</a>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>ID Iklan</th>
                      <th>Pelamar</th>
                      <th>CV</th>
                      <th>Resume</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- endcontent -->
  </div>
  <!-- endwrapcontent -->
  <!-- END RIWAYAT IKLAN -->
@endsection
