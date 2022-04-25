@extends('visitor.master')

@section('content')

<div class="container">
    <div class="section">
        <p><b>Search </b></p>
        <div class="col-6">
            <form action="/magang/cari" method="GET">
                <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4 mr-3">
                    <div class="input-group">
                        <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon1"
                            name="cari" class="form-control border-0 bg-light" value="{{ old('cari') }}">
                        <div class="input-group-append">
                            <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="section-title" style="margin-bottom: -10px; margin-top:-20px;">
            <h1 class="title">
                <span>Info Magang Yang Paling Diminati</span>
            </h1>
        </div>
    </div>
    <div class="row">
        @foreach ($magang as $m)
        {{-- card --}}
        <div class="col-sm-4" style="padding-bottom:50px">
            <div class="card shadow">
                <img class="card-img-top" src="{{ url('/foto_magang/'. $m->photo) }}" alt="Card image"
                    style="height:250px; padding: 25px;">
                <div class="card-body">
                    <h5 class="card-title lenght-title"> {{ $m->name }} </h5>
                    <div class="separator"></div>
                    <div class="card-text lenght-char">
                        <p class="text-justify"> {!! $m->description !!} </p>
                    </div>
                    <a href="/magang/{{$m->id}}" class="btn btn-primary">Baca Lebih Lanjut</a>

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
