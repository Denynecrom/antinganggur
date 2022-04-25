@extends('visitor.master')

@section('content')
<!-- Background -->
<div class="container">
  <div class="banner-area">
    <div class="content-area">
      <div class="content">

        <h1>You Open Jobs Quickly.<br>
          Get Job Needed.</h1>
        <a href="#" class="btn">Mempekerjakan Sekarang</a>
        <a href="#" class="btn">Melamar Pekerjaan</a>

      </div>
    </div>
  </div>
</div>
<!-- Akhir Background -->

<!-- Container -->
<div class="sub-title">
  <h2>Klien Kami</h2>
</div>
<div class="container">
  <div class="logos">
    <img src="images/home/Logos-Section.png" alt="logos" class="w-100">
  </div>
</div>
<div class="section1">
  <div class="sub-title-loker">
    <h2>LOWONGAN KERJA TERKINI</h2>
  </div>
  <!--slider------------------->
  <ul id="autoWidth" class="cs-hidden">
    <!--1------------------------------>
    @foreach($advertisement as $ads)
    <li class="item-a">
      <!--slider-box-->
      <div class="box-slide">
        <!--model-->
        <img src="{!! $ads->company->photo ? url('/foto_company/'.$ads->company->photo) : url('/images/no-images.png') !!}" class="model" style="width: 30%">
        <p class="perusahaan">{{$ads->company->name}}</p>
        <p class="profesi">{{ $ads->position }}</p>
        <!--details-->
        <!-- <div class="details">
                    <p>WAJIB MELAMPIRKAN SURAT KETERANGAN RAPID TEST</p>
                </div> -->
        <div class="aji">
          <i class="fas fa-map-marker-alt" aria-hidden="true"></i> {!! strtoupper($ads->company->province->name) !!}<br>
          <i class="fas fa-dollar-sign" aria-hidden="true"></i> Rp {{ $ads->salary }}
        </div>
        <a href="/iklan/detail/{{ $ads->id }}" class="btn-loker">LIHAT</a>
      </div>
    </li>
    @endforeach
  </ul>
</div>
<div class="section2">
  <!-- <div class="sub-title-magang">
    <h2>LOWONGAN MAGANG TERKINI</h2>
  </div> -->
</div>
<div class="logos2">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="feature">
          <h4>{{ $company_count }}</h4>
          <h5>Perusahaan terdaftar</h5>
        </div>
      </div>
      <div class="col-md-6">
        <div class="feature">
          <h4>{{ $applicant_count }}</h4>
          <h5>Calon Pelamar terdaftar</h5>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section3">
  <div class="sub-title-beasiswa">
    <h2>INFO BEASISWA YANG PALING DIMINATI</h2>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card shadow h-100">
          <img src="images/home/bea4.webp" class="logo-beasiswa">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Dibuka Beasiswa S1 di Boston University</h5>
            <p class="card-text">Siapa yang bermimpi kuliah di Boston University? Salah satu universitas ternama
              yang jadi incaran para...
            </p>
            <a href="#" class="btn-beasiswa">BACA LEBIH LANJUT</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow h-100">
          <img src="images/home/bea3.webp" class="logo-beasiswa">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Beasiswa S2 Full di Denmark dari Pemerintah Denmark </h5>
            <p class="card-text">Buat kamu yang mau melanjutkan studi di Denmark, Program Beasiswa S2
              ...
            </p>
            <a href="#" class="btn-beasiswa">BACA LEBIH LANJUT</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow h-100">
          <img src="images/home/bea1.png" class="logo-beasiswa">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Beasiswa Gates Cambridge Sudah Dibuka!</h5>
            <p class="card-text">Program beasiswa internasional ini merupakan salah satu beasiswa kuliah yang
              popular, nggak asing dengan...</p>
            <a href="#" class="btn-beasiswa">BACA LEBIH LANJUT</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow h-100">
          <img src="images/home/bea2.webp" class="logo-beasiswa">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Dibuka Beasiswa S2 di University of Lausanne Swiss</h5>
            <p class="card-text">Program beasiswa di University of Lausanne, Swiss dibuka lagi nih.
              Kali ini perkuliahan akan dimulai...
            </p>
            <a href="#" class="btn-beasiswa">BACA LEBIH LANJUT</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Container -->

@endsection