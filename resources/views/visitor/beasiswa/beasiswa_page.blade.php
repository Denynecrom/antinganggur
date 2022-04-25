@extends('visitor.master')

@section('content')

<div class="container">
    <div class="section">
        <p><b>Search</b></p>
        <div class="col-6">
            <form action="/beasiswa/cari" method="GET">
                <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4 mr-3">
                    <div class="input-group">
                        <input type="search" placeholder="Cari Informasi Beasiswa ......" aria-describedby="button-addon1"
                            name="beasiswa_cari" class="form-control border-0 bg-light" value="{{ old('beasiswa_cari') }}">
                        <div class="input-group-append">
                            <button id="button-addon1" type="submit" class="btn btn-link text-primary" value="{{ old('beasiswa_cari') }}"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="section-title" style="margin-bottom: -10px; margin-top:-20px;">
            <h1 class="title">
                <span>Info Beasiswa Yang Paling Diminati</span>
            </h1>
        </div>
    </div>

    <div class="row">
        @foreach ($beasiswa as $beasiswa)
        {{-- card --}}
        <div class="col-sm-4" style="padding-bottom:50px">
            <div class="card shadow">
                <img class="card-img-top" src="{{ $beasiswa->photo ? url('/foto_beasiswa/'.$beasiswa->photo) : url('/images/no-images.png') }}" alt="Card image"
                    style="height:250px; padding: 25px;">
                <div class="card-body">
                    <h5 class="card-title lenght-title"> {{$beasiswa->title}} </h5>
                    <div class="separator"></div>
                    <div class="card-text lenght-char">
                        <p class="text-justify"> {!! $beasiswa->description !!} </p>
                    </div>
                    <a href="/beasiswa/{{$beasiswa->id}}" class="btn btn-primary">Baca Lebih Lanjut</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- pengaturan size dan pagination belum --}}

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
