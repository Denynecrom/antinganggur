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
@endsection
