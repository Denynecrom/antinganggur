@extends('admin.master')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        @if(session('message'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success">{{ session('message') }}</div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Tabel Pengguna</h5>
                    <div class="card-body">
                        <!-- <a href="/admins/user/add" class="btn btn-rounded btn-primary">Tambah Pengguna</a> -->
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Pendidikan</th>
                                        <th>Bahasa</th>
                                        <th>Keahlian</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td><img width="150px" src="{{ $u->photo ? url('/foto_user/'.$u->photo) : url('/images/no-images.png')}}"></td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->gender }}</td>
                                        <td>{{ $u->birthdate }}</td>
                                        <td>{{ $u->phone }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->education->institution ?? '' }} {{ $u->education->major ?? '' }}
                                        </td>
                                        <td>{{ $u->language->name_lang ?? '' }} {{ $u->language->level_lang ?? '' }}
                                        </td>
                                        <td>{{ $u->skill->name_skl ?? '' }} {{ $u->skill->level_skl ?? '' }}</td>
                                        <td>{{ $u->address }}</td>
                                        <td>
                                           <!--  <a href="/admins/user/edit/{{ $u->id }}" class="fas fa-pencil-alt"> Edit</a> -->
                                            <a href="/admins/user/delete/{{ $u->id }}" class="fas fa-trash"> Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        <br />
                            Halaman : {{$user->currentPage()}} <br />
                            Jumlah Data : {{$user->total()}} <br />
                            Data Per Halaman : {{$user->perPage()}} <br /> <br>

                            <div style="align-content: right;">{{$user->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
