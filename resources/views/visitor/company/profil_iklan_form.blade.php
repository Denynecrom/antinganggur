@extends('visitor.profil.layout')

@section('name', $company->name)
@section('photo', $company->photo ? '/foto_company/'.$company->photo : null)
@section('profile_content')
<form method="POST" action="{{ $action['url'] }}" class="container-content_company tabcontent">
  @csrf
  @method($action['method'])
  <!-- content -->
  <div class="info_com">
    <div class="list_part">
      <h3>{{ $action['label'] }} Iklan</h3>
      <div class="garis"></div>
      <div class="list_content">
        <label for="position">Posisi</label>
        <input type="text" name="position" value="{{ old('position', isset($ads) ? $ads->position : '') }}" id="position" class="w-100 @error('position') invalid @enderror">
        @error('position')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="list_content">
        <label for="workdescription">Deskripsi Pekerjaan</label>
        <textarea name="workdescription" id="workdescription" class="w-100 @error('workdescription') invalid @enderror ckeditor" rows="5">{{ old('workdescription', isset($ads) ? $ads->workdescription : '') }}</textarea>
        @error('workdescription')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="list_content">
        <label for="education">Minimal Pendidikan</label>
        <select name="education" id="education" class="w-100 @error('education') invalid @enderror">
          <option value="" disabled {{ old('education', isset($ads) ? $ads->education : null) == null ? 'selected' : '' }}>Pilih bidang usaha</option>
          <option value="sd" {{ old('education', isset($ads) ? $ads->education : null) == 'sd' ? 'selected' : '' }}>SD</option>
          <option value="smp" {{ old('education', isset($ads) ? $ads->education : null) == 'smp' ? 'selected' : '' }}>SMP</option>
          <option value="sma/smk" {{ old('education', isset($ads) ? $ads->education : null) == 'sma/smk' ? 'selected' : '' }}>SMA/SMK</option>
          <option value="d1" {{ old('education', isset($ads) ? $ads->education : null) == 'd1' ? 'selected' : '' }}>D1</option>
          <option value="d2" {{ old('education', isset($ads) ? $ads->education : null) == 'd2' ? 'selected' : '' }}>D2</option>
          <option value="d3" {{ old('education', isset($ads) ? $ads->education : null) == 'd3' ? 'selected' : '' }}>D3</option>
          <option value="d4" {{ old('education', isset($ads) ? $ads->education : null) == 'd4' ? 'selected' : '' }}>D4</option>
          <option value="s1" {{ old('education', isset($ads) ? $ads->education : null) == 's1' ? 'selected' : '' }}>S1</option>
        </select>
        @error('education')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="list_content">
        <label for="work_experience">Pengalaman (tahun)</label>
        <input type="number" name="work_experience" value="{{ old('work_experience', isset($ads) ? $ads->work_experience : '') }}" id="work_experience" class="w-100 @error('work_experience') invalid @enderror">
        @error('work_experience')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="list_content">
        <label for="classification">Waktu Kerja</label>
        <select name="classification" id="classification" class="w-100 @error('classification') invalid @enderror">
          <option value="" disabled {{ old('classification', isset($ads) ? $ads->classification : null) == null ? 'selected' : '' }}>Pilih bidang usaha</option>
          <option value="Fulltime" {{ old('classification', isset($ads) ? $ads->classification : null) == 'Fulltime' ? 'selected' : '' }}>Full time</option>
          <option value="Parttime" {{ old('classification', isset($ads) ? $ads->classification : null) == 'Parttime' ? 'selected' : '' }}>Part time</option>
        </select>
        @error('classification')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="list_content">
        <label for="qualification">Kualifikasi</label>
        <textarea name="qualification" id="qualification" class="w-100 ckeditor @error('qualification') invalid @enderror" rows="5">{{ old('qualification', isset($ads) ? $ads->qualification : '') }}</textarea>
        @error('qualification')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="list_content">
        <label for="salary">Gaji</label>
        <input type="number" name="salary" value="{{ old('salary', isset($ads) ? $ads->salary : '') }}" id="salary" class="w-100 @error('salary') invalid @enderror">
        @error('salary')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="list_content">
        <label for="needed">Jumlah Pelamar dibutuhkan</label>
        <input type="number" name="needed" value="{{ old('needed', isset($ads) ? $ads->needed : '') }}" id="needed" class="w-100 @error('needed') invalid @enderror">
        @error('needed')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="list_content">
        <label for="start_at">Waktu Iklan Mulai</label>
        <input type="date" name="start_at" value="{{ old('start_at', isset($ads) ? $ads->start_at : '') }}" id="start_at" class="w-100 @error('start_at') invalid @enderror">
        @error('start_at')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="list_content">
        <label for="end_at">Waktu Iklan Berakhir</label>
        <input type="date" name="end_at" value="{{ old('end_at', isset($ads) ? $ads->end_at : '') }}" id="end_at" class="w-100 @error('end_at') invalid @enderror">
        @error('end_at')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
  </div>
  <div class="button_ubah">
    <h5><button type="submit">{{ $action['submit'] }}</button></h5>
  </div>
</form>
@endsection