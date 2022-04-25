@extends('visitor.profil.layout')

@section('name', $user->name)
@section('photo', $user->photo ? '/foto_user/'.$user->photo : null)
@section('profile_content')
  <form method="POST" action="/profil_user/update" class="container-content_company tabcontent" id="profile" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- content -->
    <div class="info_com">
      <div class="list_part">
        <h3>Informasi Pribadi</h3>
        <div class="garis"></div>
        <div class="list_content">
          <label for="photo">Foto</label>
          <img src="{{ $user->photo ? '/foto_user/'.$user->photo : '/images/no-images.png' }}" style="width: 150px">
          <input type="file" name="photo" id="photo" class="d-block mt-3 @error('photo') invalid @enderror" accept=".jpeg,.jpg,.png">
          @error('photo')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="name">Nama Lengkap</label>
          <input type="text" name="name" value="{{ old('name', $user->name) }}" id="name" class="w-100 @error('name') invalid @enderror">
          @error('name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="gender">Jenis Kelamin</label>
          <select name="gender" id="gender" class="w-100 @error('gender') invalid @enderror">
            <option value="" disabled>Pilih jenis kelamin</option>
            <option value="Laki-Laki" {{ old('gender', $user->gender) === 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
            <option value="Perempuan" {{ old('gender', $user->gender) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
          </select>
          @error('gender')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="birthdate">Tanggal Lahir</label>
          <input type="date" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" id="birthdate" class="w-100 @error('birthdate') invalid @enderror">
          @error('birthdate')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="list_part">
        <h3>Informasi Kontak</h3>
        <div class="garis"></div>
        <div class="list_content">
          <label for="email">Email</label>
          <input type="email" name="email" value="{{ old('email', $user->email) }}" id="email" class="w-100 @error('email') invalid @enderror">
          @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="phone">Telepon</label>
          <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" id="phone" class="w-100 @error('phone') invalid @enderror">
          @error('phone')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="address">Alamat</label>
          <textarea name="address" id="address" class="w-100 @error('address') invalid @enderror" rows="5">{{ old('address', $user->address) }}</textarea>
          @error('address')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="list_part">
        <h3>Informasi Pendidikan</h3>
        <div class="garis"></div>
        <div class="list_content">
          <label for="institution">Institusi</label>
          <input type="text" name="institution" value="{{ old('institution', $user->education ? $user->education->institution : '') }}" id="institution" class="w-100 @error('institution') invalid @enderror">
          @error('institution')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="level_edu">Tingkatan</label>
          <select name="level_edu" id="level_edu" class="w-100 @error('level_edu') invalid @enderror">
            <option value="" disabled {{ old('level_edu', $user->education) == null ? 'selected' : '' }}>Pilih tingkatan</option>
            <option value="sd" {{ old('level_edu', $user->education && $user->education->level_edu === 'sd' ? 'selected' : '') }}>SD</option>
            <option value="smp" {{ old('level_edu', $user->education && $user->education->level_edu === 'smp' ? 'selected' : '') }}>SMP</option>
            <option value="sma/smk" {{ old('level_edu', $user->education && $user->education->level_edu === 'sma/smk' ? 'selected' : '') }}>SMA/SMK</option>
            <option value="d1" {{ old('level_edu', $user->education && $user->education->level_edu === 'd1' ? 'selected' : '') }}>D1</option>
            <option value="d2" {{ old('level_edu', $user->education && $user->education->level_edu === 'd2' ? 'selected' : '') }}>D2</option>
            <option value="d3" {{ old('level_edu', $user->education && $user->education->level_edu === 'd3' ? 'selected' : '') }}>D3</option>
            <option value="d4" {{ old('level_edu', $user->education && $user->education->level_edu === 'd4' ? 'selected' : '') }}>D4</option>
            <option value="s1" {{ old('level_edu', $user->education && $user->education->level_edu === 's1' ? 'selected' : '') }}>S1</option>
          </select>
          @error('level_edu')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="major">Jurusan</label>
          <input type="text" name="major" value="{{ old('major', $user->education ? $user->education->major : '') }}" id="major" class="w-100 @error('major') invalid @enderror">
          @error('major')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="graduated_date">Tanggal Lulus</label>
          <input type="date" name="graduated_date" value="{{ old('graduated_date', $user->education ? $user->education->graduated_date : '') }}" id="graduated_date" class="w-100 @error('graduated_date') invalid @enderror">
          @error('graduated_date')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="list_part">
        <h3>Informasi Keahlian</h3>
        <div class="garis"></div>
        <div class="list_content d-flex">
          <div class="w-50">
            <label for="name_lang">Bahasa Dikuasai</label>
            <input type="text" name="name_lang" value="{{ old('name_lang', $user->languange ? $user->languange->name_lang : '') }}" id="name_lang" class="w-100 @error('name_lang') invalid @enderror">
            @error('name_lang')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="ml-3 w-50">
            <label for="level_lang">Tingkatan</label>
            <select name="level_lang" id="level_lang" class="w-100 @error('level_lang') invalid @enderror">
              <option value="" disabled {{ old('level_lang', $user->language) == null ? 'selected' : '' }}>Pilih tingkatan</option>
              <option value="pasif" {{ old('level_lang', $user->languange && $user->language->level_lang === 'pasif' ? 'selected' : '') }}>Pasif</option>
              <option value="aktif" {{ old('level_lang', $user->languange && $user->language->level_lang === 'aktif' ? 'selected' : '') }}>Aktif</option>
            </select>
            @error('level_lang')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="list_content d-flex">
          <div class="w-50">
            <label for="name_skl">Keahlian</label>
            <input type="text" name="name_skl" value="{{ old('name_skl', $user->skill ? $user->skill->name_skl : '') }}" id="name_skl" class="w-100 @error('name_skl') invalid @enderror">
            @error('name_skl')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="ml-3 w-50">
            <label for="level_skl">Tingkatan</label>
            <select name="level_skl" id="level_skl" class="w-100 @error('level_skl') invalid @enderror">
              <option value="" disabled {{ old('level_skl', $user->skill) == null ? 'selected' : '' }}>Pilih tingkatan</option>
              <option value="biasa" {{ old('level_skl', $user->skill && $user->skill->level_skl === 'biasa' ? 'selected' : '') }}>Biasa</option>
              <option value="mahir" {{ old('level_skl', $user->skill && $user->skill->level_skl === 'mahir' ? 'selected' : '') }}>Mahir</option>
              <option value="sangat_mahir" {{ old('level_skl', $user->skill && $user->skill->level_skl === 'sangat_mahir' ? 'selected' : '') }}>Sangat Mahir</option>
            </select>
            @error('level_skl')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
    </div>
    <!-- endcontent -->
    <!-- button -->
    <div class="button_ubah">
      <h5><button type="submit">Perbarui data</button></h5>
    </div>
    <!-- endbutton -->
  </form>
@endsection
