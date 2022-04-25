@extends('visitor.master')

@section('content')

<div class="container">
    <div class="position">
        <h2>IKLAN LOWONGAN KERJA</h2>
    </div>
    <div class="row">
        @foreach($advertisement as $ads)
        <div class="col-md">
        <div class="card list_iklan">
            <div class="detail_card">
                <img src="{!! $ads->company->photo ? url('/foto_company/'.$ads->company->photo) : url('/images/no-images.png') !!}" class="loper">
                <p class="company_name"> {{$ads->company->name}} </p>
                <p class="posisi_low"> {{ $ads->position }} </p>
                <div class="lg_iklan">
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i> {!! strtoupper($ads->company->province->name) !!} <br>
                    <i class="fas fa-dollar-sign" aria-hidden="true"></i> Rp {{ $ads->salary }}  
                </div>
                <a href="/iklan/detail/{{ $ads->id }}" class="btn loker">LIHAT</a>
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
