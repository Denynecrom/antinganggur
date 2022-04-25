@extends('visitor.profil.layout')

@section('name', $company->name)
@section('photo', $company->photo ? '/foto_company/'.$company->photo : null)
@section('profile_content')
<!-- TAB PROFILE -->
<!-- wrapcontent -->
<div class="container-content_company tabcontent">
  <!-- content -->
  <div class="info_com">
    <div class="list_part">
      <h3>Lamaran</h3>
      <div class="garis"></div>
    </div>
    <div class="list_part">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered first">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>ID Iklan</th>
                    <th>Pelamar</th>
                    <th>CV</th>
                    <th>Resume</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($advertisements as $ads)
                  @foreach($ads->vacancy as $vacancy)
                  <tr>
                    <td>{{ $vacancy->id }}</td>
                    <td>{{ $ads->id }}</td>
                    <td>{{ $vacancy->user->name }}</td>
                    <td><a href="/cv/{{ $vacancy->user->cv }}">{{ $vacancy->user->cv }}</a></td>
                    <td><a href="/resume/{{ $vacancy->user->resume }}">{{ $vacancy->user->resume }}</a></td>
                    <td>
                      @if($vacancy->status === 'pending')
                      <form action="/profil_perusahaan/lamaran/{{ $vacancy->id }}" method="POST">
                        @csrf
                        @method('put')
                        <button type="submit" name="status" value="accepted" class="fas fa-check text-success border-0">
                          Terima
                        </button>
                      </form>
                      <form action="/profil_perusahaan/lamaran/{{ $vacancy->id }}" method="POST">
                        @csrf
                        @method('put')
                        <button type="submit" name="status" value="rejected" class="fas fa-trash btn-hapus">
                          Tolak
                        </button>
                      </form>
                      @else
                      Pelamar ini sudah {{ $vacancy->status === 'accepted' ? 'diterima' : 'ditolak' }}
                      @endif
                    </td>
                  </tr>
                  @endforeach
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>ID Iklan</th>
                    <th>Pelamar</th>
                    <th>CV</th>
                    <th>Resume</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- endcontent -->
</div>
<!-- endwrapcontent -->
<!-- END RIWAYAT IKLAN -->
@endsection