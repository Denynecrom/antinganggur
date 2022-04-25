@extends('visitor.profil.layout')

@section('name', $company->name)
@section('photo', $company->photo ? '/foto_company/'.$company->photo : null)
@section('profile_content')
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
                    {{-- <th>Aksi</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach($advertisements as $ads)
                  <tr>
                    <td>{{ $ads->id }}</td>
                    <td>{{ $ads->position }}</td>
                    <td>{{ $ads->classification }}</td>
                    <td>{{ $ads->education }}</td>
                    <td>Rp {{ $ads->salary }}</td>
                    <td>{{ $ads->work_experience }} Tahun</td>
                    <td>{{ $ads->needed }} Orang</td>
                    <td>{!! $ads->workdescription !!}</td>
                    <td>{!! $ads->qualification !!}</td>
                    {{-- <td>
                      <a href="/profil_perusahaan/iklan/{{ $ads->id }}" class="fas fa-pencil-alt btn-edit">
                        Edit
                      </a>
                      <a href="#" class="fas fa-trash btn-hapus">
                        Hapus
                      </a>
                    </td> --}}
                  </tr>
                  @endforeach
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
                    {{-- <th>Aksi</th> --}}
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