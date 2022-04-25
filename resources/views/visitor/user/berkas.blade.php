@extends('visitor.profil.layout')

@section('name', $user->name)
@section('photo', $user->photo ? '/foto_user/'.$user->photo : null)
@section('profile_content')
<form method="POST" action="/berkas" class="container-content_company tabcontent" enctype="multipart/form-data">
  @csrf
  <!-- content -->
  <div class="info_com">
    <div class="list_part">
      <h3>Berkas</h3>
      <div class="garis"></div>
      <div class="list_content">
        <label for="resume">Resume</label>
        @if($user->resume)
        <div class="d-flex">
          <p class="flex-grow-1 truncate">{{ $user->resume }}</p>
          <a href="/resume/{{ $user->resume }}" class="d-flex align-items-center mb-3 px-4">Unduh</a>
        </div>
        @else
        <p>Anda belum mengunggah Resume</p>
        @endif
        <input type="file" name="resume" id="resume" class="d-block mt-3 @error('resume') invalid @enderror" accept=".pdf">
        <span>format : namalengkap_resume.pdf</span>
        @error('resume')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="list_content">
        <label for="cv">CV</label>
        @if($user->cv)
        <div class="d-flex">
          <p class="flex-grow-1 truncate">{{ $user->cv }}</p>
          <a href="/cv/{{ $user->cv }}" class="d-flex align-items-center mb-3 px-4">Unduh</a>
        </div>
        @else
        <p>Anda belum mengunggah CV</p>
        @endif
        <input type="file" name="cv" id="cv" class="d-block mt-3 @error('cv') invalid @enderror" accept=".pdf">
        <span>format : namalengkap_cv.pdf</span>
        @error('cv')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
  </div>
  <div class="button_ubah">
    <h5><button type="submit">Unggah berkas</button></h5>
  </div>
</form>
@endsection