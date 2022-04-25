@extends('visitor.profil.layout')

@section('name', $company->name)
@section('photo', $company->photo ? '/foto_company/'.$company->photo : null)
@section('profile_content')
  <form method="POST" action="/profil_perusahaan/update" class="container-content_company tabcontent" id="profile" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- content -->
    <div class="info_com">
      <div class="list_part">
        <h3>Informasi Perusahaan</h3>
        <div class="garis"></div>
        <div class="list_content">
          <label for="photo">Logo Perusahaan</label>
          <img src="{{ $company->photo ? '/foto_company/'.$company->photo : '/images/no-images.png' }}" style="width: 150px">
          <input type="file" name="photo" id="photo" class="d-block mt-3 @error('photo') invalid @enderror" accept=".jpeg,.jpg,.png">
          @error('photo')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="name">Nama Perusahaan</label>
          <input type="text" name="name" value="{{ old('name', $company->name) }}" id="name" class="w-100 @error('name') invalid @enderror">
          @error('name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="businessfield_id">Bidang Usaha</label>
          <select name="businessfield_id" id="businessfield_id" class="w-100 @error('businessfield_id') invalid @enderror">
            <option value="" disabled {{ old('businessfield_id', $company->businessfield) == null ? 'selected' : '' }}>Pilih bidang usaha</option>
            @foreach($business_fields as $field)
              <option value="{{ $field->id }}" {{ old('businessfield_id', $company->businessfield && $company->businessfield->id === $field->id ? 'selected' : '') }}>{{ $field->name }}</option>
            @endforeach
          </select>
          @error('businessfield_id')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="description">Deskripsi Perusahaan</label>
          <textarea name="description" id="description" class="w-100 @error('description') invalid @enderror" rows="5">{{ old('description', $company->description) }}</textarea>
          @error('description')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="list_part">
        <h3>Kontak Perusahaan</h3>
        <div class="garis"></div>
        <div class="list_content">
          <label for="email">Email Perusahaan</label>
          <input type="email" name="email" value="{{ old('email', $company->email) }}" id="email" class="w-100 @error('email') invalid @enderror">
          @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="phone">Telepon Perusahaan</label>
          <input type="tel" name="phone" value="{{ old('phone', $company->phone) }}" id="phone" class="w-100 @error('phone') invalid @enderror">
          @error('phone')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="address">Alamat Perusahaan</label>
          <textarea name="address" id="address" class="w-100 @error('address') invalid @enderror" rows="5">{{ old('address', $company->address) }}</textarea>
          @error('address')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="province_id">Provinsi</label>
          <select name="province_id" id="province_id" class="w-100 @error('province_id') invalid @enderror">
            <option value="" disabled {{ old('province_id', $company->province) == null ? 'selected' : '' }}>Pilih provinsi</option>
            @foreach($provinces as $province)
              <option value="{{ $province->id }}" {{ old('province_id', $company->province && $company->province->id === $province->id ? 'selected' : '') }}>{{ $province->name }}</option>
            @endforeach
          </select>
          @error('province_id')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="list_part">
        <h3>Sosial Media Perusahaan</h3>
        <div class="garis"></div>
        <div class="list_content">
          <label for="website">Website</label>
          <input type="url" name="website" value="{{ old('website', $company->website) }}" id="website" class="w-100 @error('website') invalid @enderror">
          @error('website')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for= "facebook">Facebook</label>
          <input type="text" name="facebook" value="{{ old('facebook', $company->facebook) }}" id="facebook" class="w-100 @error('facebook') invalid @enderror">
          @error('facebook')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="list_content">
          <label for="instagram">Instagram</label>
          <input type="text" name="instagram" value="{{ old('instagram', $company->instagram) }}" id="instagram" class="w-100 @error('instagram') invalid @enderror">
          @error('instagram')
            <span class="text-danger">{{ $message }}</span>
          @enderror
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
