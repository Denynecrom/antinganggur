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
                        <h5 class="card-header">Magang Table</h5>
                        <div class="card-body">
                            <a href="/admins/magang/add" class="btn btn-rounded btn-primary">Tambah Info Magang</a>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Foto</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Pendidikan</th>
                                            <th>Keahlian</th>
                                            <th>Gaji</th>
                                            <th>Email</th>
                                            <th>No_HP</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($magang as $m)
                                            <tr>
                                                <td>{{ $m->id }}</td>
                                                <td><img width="150px" src="{{ url('/foto_magang/' . $m->photo) }}"></td>
                                                <td>{{ $m->name }}</td>
                                                <td>{{ $m->pendidikan }}</td>
                                                <td>{{ $m->keahlian }}</td>
                                                <td>{{ $m->gaji }}</td>
                                                <td>{{ $m->email }}</td>
                                                <td>{{ $m->no_hp }}</td>
                                                <td>{!! $m->description !!}</td>
                                                <td>
                                                    <a href="/admins/magang/edit/{{ $m->id }}" class="fas fa-pencil-alt"> Edit</a>
                                                    <a href="/admins/magang/delete/{{ $m->id }}" class="fas fa-trash"> Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br />
                                Halaman : {{$magang->currentPage()}} <br />
                                Jumlah Data : {{$magang->total()}} <br />
                                Data Per Halaman : {{$magang->perPage()}} <br /> <br>

                                <div style="align-content: right;">{{$magang->links()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
