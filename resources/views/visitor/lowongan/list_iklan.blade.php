@extends('visitor.master')

@section('content')

<div class="container">
    <div class="position">
        <h2>IKLAN LOWONGAN KERJA</h2>
    </div>
    <div class="row">
        @foreach($advertisement as $ads)
        <div class="col-sm-4" style="padding-bottom:50px">
            <div class="card shadow">
                <img class="card-img-top" src="{!! url('/foto_company/'.$ads->company->photo) !!}" alt="Card image"
                    style="height:250px; padding: 25px;">
                <div class="card-body">
                    <h6 class="card-title lenght-title"> {{$ads->company->name}} </h4>
                    <div class="separator"></div>
                    <div class="card-text lenght-char">
                        <p class="text-justify"> {{ $ads->position }} </p>
                    </div>
                    <a href="/iklan/detail/{{ $ads->id }}" class="btn btn-primary">Baca Lebih Lanjut</a>
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
