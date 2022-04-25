@extends('visitor.master')

@section('content')
<div class="company_dashboard">
  <!-- banner -->
  <img src="/images/banner_company.png" class="banner">
  <!-- endbanner -->
  <!-- wrapsidebar -->
  <div class="cont_dashcom">
    <!-- siebar -->
    <div class="sidebar_dashcom">
      <img src="@yield('photo', '/images/no-images.png')">
      <h5>@yield('name')</h5>
      <div class="menu_dashcom">
        @auth('company')
          <a href="/profil_perusahaan" class="tablinks">Profile</a>
        @endauth
        @auth('applicant')
          <a href="/profil_user" class="tablinks">Profile</a>
          <a href="/berkas" class="tablinks">Berkas</a>
        @endauth
        {{-- <a href="/ubah_password" class="tablinks">Ubah Password</a> --}}
        @auth('company')
          <button class="dropdown-btn">
            Iklan Lowongan
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="/profil_perusahaan/iklan" class="tablinks">Iklan Aktif</a>
            <a href="/profil_perusahaan/iklan/buat" class="tablinks">Pasang Iklan</a>
          </div>
          {{-- <button class="tablinks" onclick="detailCompany(event, 'riwayat')">Riwayat</button> --}}
          <a href="/profil_perusahaan/iklan/riwayat" class="tablinks">Riwayat</a>
          <a href="/profil_perusahaan/lamaran" class="tablinks">Lamaran</a>
        @endauth
      </div>
    <!-- endsidebar -->
    </div>
  <!-- endwrapsidebar -->
  @if(session('message'))
    <div class="mb-0 container-content_company">
      <div class="mt-4 alert alert-success">
        {{ session('message') }}
      </div>
    </div>
  @endif
  @yield('profile_content')
</div>
<script>
// accordion
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
// endaccordion
</script>
@endsection