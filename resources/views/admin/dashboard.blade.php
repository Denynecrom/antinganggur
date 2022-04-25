@extends('admin.master')

@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Dashboard </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Total Pengguna</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ $user }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Total Perusahaan</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ $company }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Iklan Aktif</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ $advertisement }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Total Lamaran</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ $vacancy }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Total Informasi Magang</h5>
                                <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{$magang}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Total Informasi Beasiswa</h5>
                                <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{$beasiswa}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
@endsection
