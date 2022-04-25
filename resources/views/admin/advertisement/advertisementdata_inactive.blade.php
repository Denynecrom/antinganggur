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
                    <h5 class="card-header">Tabel Iklan Tidak Aktif</h5>
                    <div class="card-body">
                        <!-- <a href="/advertisement/add" class="btn btn-rounded btn-primary">Tambah Iklan</a> -->
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Posisi</th>
                                        <th>Waktu Kerja</th>
                                        <th>Pengalaman</th>
                                        <th>Min Pendidikan</th>
                                        <th>Lokasi</th>
                                        <th>Deskripsi Pekerjaan</th>
                                        <th>Kualifikasi</th>
                                        <th>Gaji</th>
                                        <th>Dibutuhkan</th>
                                        <th>Mulai Tayang</th>
                                        <th>Selesai Tayang</th>
                                        <th>Tayang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($advertisement as $ads)
                                    <tr>
                                        <td>{{ $ads->id }}</td>
                                        <td>{!! $ads->company->name !!}</td>
                                        <td>{{ strtoupper($ads->position) }}</td>
                                        <td>{{ $ads->classification }}</td>
                                        <td>{{ $ads->work_experience }} tahun</td>
                                        <td>{{ strtoupper($ads->education) }}</td>
                                        <td>{{ strtoupper($ads->company->province->name) }}</td>
                                        <td>{!! $ads->workdescription !!}</td>
                                        <td>{!! $ads->qualification !!}</td>
                                        <!-- <td>{{ str_word_count($ads->workdescription) > 10 ? substr($ads->workdescription, 0, 80). " .." : ($ads->workdescription) }}</td>
                                        <td>{{ str_word_count($ads->qualification) > 10 ? substr($ads->qualification, 0, 80). " .." : ($ads->qualification) }}</td> -->
                                        <td>Rp {{ $ads->salary }}</td>
                                        <td>{{ $ads->needed}} orang</td>
                                        <td>{{ $ads->start_at }}</td>
                                        <td>{{ $ads->end_at }}</td>
                                        <td>{!! $ads->show_label !!}</td>
                                        <td>
                                            <a href="/admins/advertisement/edit/{{ $ads->id }}" class="fas fa-pencil-alt">
                                                Edit</a>
                                            <a href="/admins/advertisement/delete/{{ $ads->id }}" class="fas fa-trash">
                                                Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br />
                            Halaman : {{$advertisement->currentPage()}} <br />
                            Jumlah Data : {{$advertisement->total()}} <br />
                            Data Per Halaman : {{$advertisement->perPage()}} <br /><br />

                            {{$advertisement->links()}} <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
