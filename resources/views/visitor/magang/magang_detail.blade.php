@extends('visitor.master')


@section('content')
<!--================Home Banner Area =================-->
@foreach($magang as $m)
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>{{ $m->name }}</h2>

            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_product_img">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ url('/foto_magang/'. $m->photo) }}" alt="{{ $m->name }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="col-lg-5 offset-lg-1">
                <section class="product_description_area">
                    <div class="container">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="color: black">
                                {!! $m->description !!}
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <h6>Nama Perusahaan</h6>
                                                </td>
                                                <td>:</td>
                                                <td>{{ $m->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Alamat Email </h6>
                                                </td>
                                                <td>:</td>
                                                <td>{{ $m->email }}</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <h6>Nomer Perusahaan </h6>
                                                </td>
                                                <td>:</td>
                                                <td>{{ $m->no_hp }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Keahlian yang dibutuhkan </h6>
                                                </td>
                                                <td>:</td>
                                                <td>{{ $m->keahlian }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Minimal Pendidikan </h6>
                                                </td>
                                                <td>:</td>
                                                <td>{{ $m->pendidikan }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Gaji </h6>
                                                </td>
                                                <td>:</td>
                                                <td>{{ $m->gaji }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


@endforeach

@endsection

