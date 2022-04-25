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
                    <h5 class="card-header">Tabel Perusahaan</h5>
                    <div class="card-body">
                        <a href="/admins/company/add" class="btn btn-rounded btn-primary">Tambah Perusahaan</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Foto</th>
                                        <th>Bidang Usaha</th>
                                        <th>Nama</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Deskripsi</th>
                                        <th>Website</th>
                                        <th>Facebook</th>
                                        <th>Instagram</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($company as $c)
                                    <tr>
                                        <td>{{ $c->id }}</td>
                                        <td><img width="150px" src="{{ $c->photo ? url('/foto_company/'.$c->photo) : url('/images/no-images.png') }}"></td>
                                        {{-- <td>{{ $c->businessfield->name }}</td> --}}
                                        @if ( $c->businessfield_id == null)
                                            <td> - </td>
                                        @else
                                            <td>{{ $c->businessfield->name }}</td>
                                        @endif
                                        <td>{{ $c->name }}</td>
                                        <td>{{ $c->phone }}</td>
                                        <td>{{ $c->email }}</td>
                                        <td>{{ $c->address }}</td>
                                        <!-- <td>{!! $c->description !!}</td> -->
                                        <td>{{ str_word_count($c->description) > 10 ? substr($c->description, 0, 80). " .." : ($c->description) }}</td>
                                        <td>{!! $c->website !!}</td>
                                        <td>{!! $c->facebook !!}</td>
                                        <td>{!! $c->instagram !!}</td>
                                        <td>
                                            {{-- <a href="/admins/company/edit/{{ $c->id }}" class="fas fa-pencil-alt"> Edit</a> --}}
                                            <a href="/admins/company/delete/{{ $c->id }}" class="fas fa-trash"> Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        <br />
                            Halaman : {{$company->currentPage()}} <br />
                            Jumlah Data : {{$company->total()}} <br />
                            Data Per Halaman : {{$company->perPage()}} <br /> <br>

                            <div style="align-content: right;">{{$company->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
