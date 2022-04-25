@extends('visitor.master')

@section('content')

<div class="container">
  <div class="position">
    <h2>PERUSAHAAN YANG TELAH BERGABUNG</h2>
    <div class="col-6">
      <form action="/company/search" method="GET">
        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4 mr-3">
          <div class="input-group">
            <input type="search" placeholder=" Cari perusahaan disini" aria-describedby="button-addon1"
            name="cari" class="form-control border-0 bg-light" value="{{ old('cari') }}">
            <div class="input-group-append">
              <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      @foreach($company as $comp)
      <div class="col-md">
      <div class="card list_iklan">
        <div class="detail_card">
          <img src="{!! $comp->photo ? url('/foto_company/'.$comp->photo) : url('/images/no-images.png') !!}" class="loper">
          <p class="company_name"> {{$comp->name}} </p>
          <div class="lg_iklan">
            @if ( $comp->businessfield_id == null)
              <i class="fas fa-briefcase" aria-hidden="true"></i> - <br>
            @else
              <i class="fas fa-briefcase" aria-hidden="true"></i> {!! strtoupper($comp->businessfield->name) !!} <br>
            @endif
            @if ($comp->province_id == null)
              <i class="fas fa-map-marker-alt" aria-hidden="true"></i> - <br>
            @else
              <i class="fas fa-map-marker-alt" aria-hidden="true"></i> {!! strtoupper($comp->province->name) !!} <br>
            @endif
            {{-- <i class="fas fa-briefcase" aria-hidden="true"></i> {!! strtoupper($comp->businessfield->name) !!} <br> --}}
            {{-- <i class="fas fa-map-marker-alt" aria-hidden="true"></i> {!! strtoupper($comp->province->name) !!} <br> --}}
          </div>
          <a href="/company/detail/{{ $comp->id }}" class="btn loker">LIHAT</a>
        </div>
      </div>
      </div>
      @endforeach
    </div>

    <br><br>

    <ul class="pagination justify-content-end" style="margin-right:20px">
      <li class="page-item">
        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </div>

  @endsection
