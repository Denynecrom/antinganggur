@extends('visitor.profil.layout')

@section('name', $user->name)
@section('photo', $user->photo ? '/foto_user/'.$user->photo : null)
@section('profile_content')
  <div class="container-content_company tabcontent" id="profile">
    <!-- content -->
    <div class="info_com">
      <div class="list_part">
        <h3>Informasi Pribadi</h3>
        <div class="garis"></div>
        <div class="list_content">
          <h4>Foto</h4>
          <img src="{{ $user->photo ? '/foto_user/'.$user->photo : '/images/no-images.png' }}" style="width: 150px">
        </div>
        <div class="mt-4 list_content">
          <h4>Nama Lengkap</h4>
          <p>{{ $user->name }}</p>
        </div>
        <div class="list_content">
          <h4>Jenis Kelamin</h4>
          <p>{{ $user->gender }}</p>
        </div>
        <div class="list_content">
          <h4>Tanggal Lahir</h4>
          <p>{{ $user->birthdate === '0000-00-00' ? 'Belum ada data' : $user->birthdate }}</p>
        </div>
      </div>
      <div class="list_part">
        <h3>Informasi Kontak</h3>
        <div class="garis"></div>
        <div class="list_content">
          <h4>Email</h4>
          <p>{{ $user->email ? $user->email : 'Belum ada data' }}</p>
        </div>
        <div class="list_content">
          <h4>Telepon</h4>
          <p>{{ $user->phone ? $user->phone : 'Belum ada data' }}</p>
        </div>
        <div class="list_content">
          <h4>Alamat</h4>
          <p>{{ $user->address ? $user->address : 'Belum ada data' }}</p>
        </div>
      </div>
      <div class="list_part">
        <h3>Informasi Pendidikan</h3>
        <div class="garis"></div>
        <div class="list_content">
          <h4>Institusi</h4>
          <p>{{ $user->education && $user->education->institution ? $user->education->institution : 'Belum ada data' }}</p>
        </div>
        <div class="list_content">
          <h4>Tingkatan</h4>
          <p>{{ $user->education && $user->education->level_edu ? $user->education->level_edu : 'Belum ada data' }}</p>
        </div>
        <div class="list_content">
          <h4>Jurusan</h4>
          <p>{{ $user->education && $user->education->major ? $user->education->major : 'Belum ada data' }}</p>
        </div>
        <div class="list_content">
          <h4>Tanggal Lulus</h4>
          <p>{{ $user->education && $user->education->graduated_date ? $user->education->graduated_date : 'Belum ada data' }}</p>
        </div>
      </div>
      <div class="list_part">
        <h3>Informasi Keahlian</h3>
        <div class="garis"></div>
        <div class="list_content">
          <h4>Bahasa Dikuasai</h4>
          <p>{{ $user->language && $user->language->name_lang ? $user->language->name_lang.' ('.$user->language->level_lang.')' : 'Belum ada data' }}</p>
        </div>
        <div class="list_content">
          <h4>Keahlian</h4>
          <p>{{ $user->skill && $user->skill->name_skl ? $user->skill->name_skl.' ('.$user->skill->level_skl.')' : 'Belum ada data' }}</p>
        </div>
      </div>
    </div>
    <!-- endcontent -->
    <!-- button -->
    <div class="button_ubah">
      <h5><a href="/profil_user/edit">Ubah</a></h5>
    </div>
    <!-- endbutton -->
  </div>
@endsection
