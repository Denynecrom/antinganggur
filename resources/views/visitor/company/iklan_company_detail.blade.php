@extends('visitor.master')

@section('content')
<style>
.wrapper-detail_ads_comp{
  width: 80%;
  margin: auto;
  box-sizing: border-box;
}
.desc_comp h4, .address_comp h4, .contact_comp h4, .list_iklan_comp h4{
    color: #8C30F5;
    font-weight: bold;
    padding-left: 15px;
}
.desc_comp hr, .address_comp hr, .contact_comp hr, .list_iklan_comp hr{
    border: 1px solid black;
}

</style>

<div class="wrapper-detail_ads_comp">
    <div class="table_title" style="margin-top:50px">
        <table>
          <tr class="tb_title_iklan">
            <td rowspan="2"><img src="{!! $company->photo ? url('/foto_company/'.$company->photo) : url('/images/no-images.png') !!}" class="icon-perusahaan"></td>
            <td colspan="2"><h2 class="title-iklan">{!! $company->name !!}</h2></td>
        </tr>
        <tr class="tb_tag_iklan">
            @if ($company->province_id == null)
                <td><img src="/images/icon_location.svg" class="icon_tag"><span> Tidak Ditentukan </span></td>
            @else
                <td><img src="/images/icon_location.svg" class="icon_tag"><span> {!! strtoupper($company->province->name) !!}</span></td>    
            @endif
            @if ($company->businessfield_id == null)
            <td><img src="/images/icon_taglabel.svg" class="icon_tag"><span> Tidak Ditentukan </span></td>
            @else
            <td><img src="/images/icon_taglabel.svg" class="icon_tag"><span> {!! strtoupper($company->businessfield->name) !!}</span></td>
            @endif
            {{-- <td><img src="/images/icon_location.svg" class="icon_tag"><span> {!! strtoupper($company->province->name) !!}</span></td>
            <td><img src="/images/icon_taglabel.svg" class="icon_tag"><span> {!! strtoupper($company->businessfield->name) !!}</span></td> --}}
        </tr>
    </table>
</div>
<div class="desc_comp">
    <h4>DESKRIPSI PERUSAHAAN</h4>
    <hr>
    {!! $company->description !!}
</div>
<br/>
<!-- <div class="address_comp">
    <h4>ALAMAT</h4>
    <hr>
    
</div>
<br/> -->
<div class="contact_comp">
    <h4>KONTAK</h4>
    <hr>
    <i class="fas fa-map-marker-alt"></i> {{ $company->address }}
    <br/>
    <i class="fas fa-phone"></i> {{ $company->phone }}
    <br/>
    <i class="fas fa-envelope"></i> {{ $company->email }}
    <!-- <table>
      <tr>
          <td><h5>ALAMAT</h5></td>
      </tr>
      <tr>
        <td>{{ $company->address }}</td>
    </tr>
    <tr>
        <td><h5>KONTAK</h5></td>
    </tr>
    <tr>
        <td><i class="fas fa-phone"></i> {{ $company->phone }}</td>
    </tr>
    <tr>
        <td><i class="fas fa-envelope"></i> {{ $company->email }}</td>
    </tr>
</table> -->
</div>
<br/>
<div class="list_iklan_comp">
    <h4>List Iklan Aktif dari {!! $company->name !!}</h4>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-bordered first">
            <thead>
                <tr>
                    <th>Posisi</th>
                    <th>Waktu Kerja</th>
                    <th>Pengalaman</th>
                    <th>Min Pendidikan</th>
                    <th>Deskripsi Pekerjaan</th>
                    <th>Kualifikasi</th>
                    <th>Gaji</th>
                    <th>Dibutuhkan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($advertisement as $c)
                <tr>
                    <td>{{ strtoupper($c->position) }}</td>
                    <td>{{ $c->classification }}</td>
                    <td>{{ $c->work_experience }} tahun</td>
                    <td>{{ strtoupper($c->education) }}</td>
                    <td>{!! $c->workdescription !!}</td>
                    <td>{!! $c->qualification !!}</td>
                        <!-- <td>{{ str_word_count($c->workdescription) > 10 ? substr($c->workdescription, 0, 80). " .." : ($c->workdescription) }}</td>
                            <td>{{ str_word_count($c->qualification) > 10 ? substr($c->qualification, 0, 80). " .." : ($c->qualification) }}</td> -->
                            <td>Rp {{ $c->salary }}</td>
                            <td>{{ $c->needed}} orang</td>
                            <td>
                                <a href="/iklan/detail/{{$c->id}}" class="fas fa-angle-right">
                                Lihat</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">Tidak Ada Iklan Aktif</td>
                        </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection
