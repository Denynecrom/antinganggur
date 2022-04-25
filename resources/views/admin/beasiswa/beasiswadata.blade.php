@extends('admin.master')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        @if(session('massage'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success">{{ session('message') }} </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Beasiswa Table</h5>
                    <div class="card-body">
                        <a href="/admins/beasiswa/add" class="btn btn-rounded btn-primary">Tambah Info Beasiswa</a>
                        <br><br>
                        <div class="table-responsive">
                            @csrf
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Foto</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Jenjang Pendidikan</th>
                                        <th>Tanggal Upload</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($beasiswa as $b)
                                    <tr>
                                        <td>{{ $b->id }}</td>
                                        <td>{{ $b->title }}</td>
                                        <td><img src="{{ url('/foto_beasiswa/'. $b->photo) }}" alt="" width="100px"></td>
                                        <td>{{ $b->email }}</td>
                                        <td>{{ $b->no_hp}}</td>
                                        <td>{{ $b->jenjang_pendidikan}}</td>
                                        <td>{{ $b->start_at}}</td>
                                        <td>{!! $b->description !!}</td>
                                        <td>
                                            <a href="/admins/beasiswa/edit/{{ $b->id }}" class="fas fa-pencil-alt"> Edit</a>
                                            <a href="/admins/beasiswa/delete/{{ $b->id }}" class="fas fa-trash"> Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br />
                            Halaman : {{$beasiswa->currentPage()}} <br/>
                            Jumlah Data : {{$beasiswa->total()}} <br/>
                            Data Per Halaman : {{$beasiswa->perPage()}} <br/> <br>

                            <div style="align-content: right;">{{$beasiswa->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
