@extends('admin.master')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            @if (session('message'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">{{ session('message') }}</div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Tabel Lowongan</h5>
                        <div class="card-body">
                            <!-- <a href="/admins/vacancy/add" class="btn btn-rounded btn-primary">Tambah Lowongan</a> -->
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Pelamar</th>
                                            <th>Nama Perusahaan</th>
                                            <th>ID Iklan</th>
                                            <th>CV</th>
                                            <th>Resume</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vacancy as $v)
                                            <tr>
                                                <td>{{ $v->id }}</td>
                                                <td>{{ $v->user->name }}</td>
                                                <td>{{ $v->advertisement->company->name }}</td>
                                                <td>{{ $v->advertisement_id }}</td>
                                                <td>{{ $v->user->cv }}</td>
                                                <td>{{ $v->user->resume }}</td>
                                                <td>
                                                    <!-- <a href="/admins/vacancy/edit/{{ $v->id }}" class="fas fa-pencil-alt"> Edit</a> -->
                                                    <a href="/admins/vacancy/delete/{{ $v->id }}" class="fas fa-trash"> Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br />
                                Halaman : {{$vacancy->currentPage()}} <br />
                                Jumlah Data : {{$vacancy->total()}} <br />
                                Data Per Halaman : {{$vacancy->perPage()}} <br /> <br>

                                <div style="align-content: right;">{{$vacancy->links()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
