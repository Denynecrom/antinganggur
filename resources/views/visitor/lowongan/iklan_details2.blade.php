@extends('visitor.master')

@section('content')
<style>
  .title-iklan a {
    text-decoration: none;
    color: black;
  }
</style>

<div class="wrapper-iklan">
  <div class="table_title" style="margin-top:50px">
    <table>
      <tr class="tb_title_iklan">
        <td rowspan="2"><img src="{!! $advertisement->company->photo ? url('/foto_company/'.$advertisement->company->photo) : url('/images/no-images.png') !!}" class="icon-perusahaan"></td>
        <td colspan="2">
          <h2 class="title-iklan"><a href="/company/detail/{{ $advertisement->company->id }}">{!! $advertisement->company->name !!}</a></h2>
        </td>
      </tr>
      <tr class="tb_tag_iklan">
        <td><img src="/images/icon_location.svg" class="icon_tag"><span> {!! strtoupper($advertisement->company->province->name) !!}</span></td>
        <td><img src="/images/icon_taglabel.svg" class="icon_tag"><span> {!! strtoupper($advertisement->company->businessfield->name) !!}</span></td>
      </tr>
    </table>
  </div>
  <div class="content_iklan">
    <button class="info tablink active" onclick="detailIklan(event,'detail_iklan')">INFORMASI</button><button class="profil tablink" onclick="detailIklan(event, 'detail_profile_perusahaan')">PROFIL</button>
  </div>

  <!-- detail Iklan -->

  <div class="tb_detail iklann" id="detail_iklan" style="display: block">
    <table>
      <thead>
        <tr>
          <th colspan="3">{{ $advertisement->position }}</th>
        </tr>
      </thead>
      <tbody>
        <tr class="part_satu">
          <td class="head">Jenjang Karir</td>
          <td>:</td>
          <td>{{ $advertisement->work_experience }} Tahun</td>
        </tr>
        <tr class="part_satu">
          <td class="head">Pendidikan</td>
          <td>:</td>
          <td>{{ strtoupper($advertisement-> education) }}</td>
        </tr>
        <tr class="part_satu">
          <td class="head">Gaji Yang ditawarkan</td>
          <td>:</td>
          <td>Rp {{ $advertisement->salary }}</td>
        </tr>
        <tr class="part_satu">
          <td class="head">Jumlah Yang Dibutuhkan</td>
          <td>:</td>
          <td>{{ $advertisement->needed }} Orang</td>
        </tr>
        <tr class="part_satu">
          <td class="head">Ditempatkan</td>
          <td>:</td>
          <td>{{ strtoupper($advertisement->company->province->name) }}</td>
        </tr>
        <tr class="part_dua">
          <td colspan="3">
            <hr>
          </td>
        </tr>
        <tr class="part_dua">
          <td colspan="3"><b>Deskripsi Pekerjaan</b></td>
        </tr>
        <tr class="part_dua">
          <td colspan="3">
            {!! $advertisement->workdescription !!}

          </td>
        </tr>
        <tr class="part_dua">
          <td colspan="3"><b>Kualifikasi</b></td>
        </tr>
        <tr class="part_dua">
          <td colspan="3">
            {!! $advertisement->qualification !!}

          </td>
        </tr>
      </tbody>
    </table>
    @auth('applicant')
    <form action="/lamar/{{ $advertisement->id }}" method="post" class="button_low mx-auto">
      @csrf
      <button type="submit" class="lamar" {{ $is_eligible && !$is_applied ? '' : 'disabled' }}>Lamar Sekarang</button>
      @if (!$is_eligible)
      <p class="text-center text-danger small mt-2">Anda belum mengunggah CV dan/atau resume</p>
      @elseif ($is_applied)
      <p class="text-center small mt-2">Anda sudah melamar pekerjaan ini</p>
      @endif
    </form>
    @endauth
  </div>
  <!-- end detail iklan -->

  <!-- detail Perusahaan -->

  <div class="tb_detail iklann" id="detail_profile_perusahaan" style="display: none">
    <div class="info_peru">
      <div class="title_peru">
        <h4>TENTANG PERUSAHAAN</h4>
        <hr>
        {!! $advertisement->company->description !!}
      </div>
      <div class="info detail_peru">
        <table>
          <tr>
            <!-- <td rowspan="5">
              <div id="map"></div>
            </td> -->
            <td>
              <h5>ALAMAT</h5>
            </td>
          </tr>
          <tr>
            <td>{{ $advertisement->company->address }}</td>
          </tr>
          <tr>
            <td>
              <h5>KONTAK</h5>
            </td>
          </tr>
          <tr>
            <td><i class="fas fa-phone"></i> {{ $advertisement->company->phone }}</td>
          </tr>
          <tr>
            <td><i class="fas fa-envelope"></i> {{ $advertisement->company->email }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <!-- end detail perusahaan -->
</div>
<script>
  function detailIklan(evt, tabName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("iklann");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
  }
</script>

@endsection