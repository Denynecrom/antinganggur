@extends('visitor.profil.layout')

@section('profile_content')
  <form method="POST" action="/ubah_password" class="container-content_company tabcontent" id="profile" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- content -->
    <div class="info_com">
      <div class="list_part">
        <h3>Ubah Password</h3>
        <div class="garis"></div>
        <div class="list_content">
          <label for="password_old">Password saat ini</label>
          <input type="password" name="password_old" id="password_old" class="w-100 @error('password_old') invalid @enderror">
          @error('password_old')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="password">Password baru</label>
          <input type="password" name="password" id="password" class="w-100 @error('password') invalid @enderror">
          @error('password')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="password_confirmation">Konfirmasi password</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="w-100 @error('password') invalid @enderror">
        </div>
      </div>
    </div>
    <!-- endcontent -->
    <!-- button -->
    <div class="button_ubah">
      <h5><button type="submit">Ubah password</button></h5>
    </div>
    <!-- endbutton -->
  </form>
  <!-- endwrapcontent -->
@endsection
