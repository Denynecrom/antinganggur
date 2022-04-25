@extends('visitor.master')


@section('content')
<!--================Home Banner Area =================-->
@foreach($beasiswa as $beasiswa)
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>{{ $beasiswa->title }}</h2>

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
                                <img class="d-block w-100" src="{{ url('/foto_beasiswa/'. $beasiswa->photo) }}" alt="{{ $beasiswa->title }}">
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
                                <br>
                                {!! $beasiswa->description !!}
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <h6>Jenjang Pendidikan</h6>
                                                </td>
                                                <td>:</td>
                                                <td>{{ $beasiswa->jenjang_pendidikan }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Email</h6>
                                                </td>
                                                <td>:</td>
                                                <td>{{ $beasiswa->email }}</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <h6>Nomor Handphone</h6>
                                                </td>
                                                <td>:</td>
                                                <td>{{ $beasiswa->no_hp }}</td>
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

