@extends('visitor.master')

@section('content')

<div class="wrapper-iklan">
    <div class="company_banner">
        <img src="images/Banner_iklan_perusahaan.svg" class="lg-banner-ikln ">
    </div>
    <div class="table_title">
        <table>
            <tr class="tb_title_iklan">
                <td rowspan="2"><img src="images/icon_perusahaan.svg" class="icon-perusahaan"></td>
                <td colspan="2">
                    <h2 class="title-iklan">PT. EKSTRA PRIMA INDONESIA</h2>
                </td>
            </tr>
            <tr class="tb_tag_iklan">
                <td><img src="images/icon_location.svg" class="icon_tag"><span> JAKARTA</span></td>
                <td><img src="images/icon_taglabel.svg" class="icon_tag"><span> Penjualan</span></td>
            </tr>
        </table>
    </div>
    <div class="content_iklan">
        <!-- <li class="info">INFORMASI PEKERJAAN</li><li class="profil">PROFIL PERUSAHAAN</li> -->
        <button class="info tablink active" onclick="detailIklan(event,'detail_iklan')">INFORMASI PEKERJAAN</button><button class="profil tablink" onclick="detailIklan(event, 'detail_profile_perusahaan')">PROFIL PERUSAHAAN</button>
    </div>

    <!-- detail Iklan -->
    <div class="tb_detail iklann" id="detail_iklan">
        <table>
            <thead>
                <tr>
                    <th colspan="3">SHOPKEEPER</th>
                </tr>
            </thead>
            <tbody>
                <tr class="part_satu">
                    <td class="head">Industri</td>
                    <td>:</td>
                    <td>Makanan & Minuman</td>
                </tr>
                <tr class="part_satu">
                    <td class="head">Jenjang Karir</td>
                    <td>:</td>
                    <td>Staff (> 1 tahun pengalaman)</td>
                </tr>
                <tr class="part_satu">
                    <td class="head">Pendidikan</td>
                    <td>:</td>
                    <td>SMA/SMK</td>
                </tr>
                <tr class="part_satu">
                    <td class="head">Gaji Yang ditawarkan</td>
                    <td>:</td>
                    <td>-</td>
                </tr>
                <tr class="part_satu">
                    <td class="head">Keahlian</td>
                    <td>:</td>
                    <td>Ms Office, Komunikasi</td>
                </tr>
                <tr class="part_satu">
                    <td class="head">Jumlah Yang Dibutuhkan</td>
                    <td>:</td>
                    <td>1 Orang</td>
                </tr>
                <tr class="part_satu">
                    <td class="head">Ditempatkan</td>
                    <td>:</td>
                    <td>Jakarta</td>
                </tr>
                <tr class="part_dua">
                    <td colspan="3">
                        <hr>
                    </td>
                </tr>
                <tr class="part_dua">
                    <td colspan="3">Kualifikasi</td>
                </tr>
                <tr class="part_dua">
                    <td colspan="3">
                        - Pendidikan SMA/SMK segala jurusan<br />
                        - Usia minimal 20 tahun<br />
                        - Sehat jasmani dan rohani<br />
                        - Mampu mongoperasikan komputer dengan baik, minimal MS Office, Internet dan Cash Register<br />
                        - Diutamakan memiliki pengalaman dibidang yang sama min 1 tahun di minimarket, convenience store
                        atau mini store<br />
                        - Berpenampilan menarik, ramah, inisiatif, semangat belajar tinggi<br />
                        - Memiliki kepribadlan yang jujur, proaktlf, bertanggung jawab, motivasi & integritas
                        tinggi<br />
                        - Mampu bekerjasama bersama team / Individu<br />
                        - Bersedia dan mampu bekerja dibawah tekanan<br />
                        - Bersedia bekerja shift di Weekend dan Hari Libur<br />
                        - Berdomisili di Jakarta<br />

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="button_low">
      <button class="lamar">Lamar Sekarang</button>
  </div>
  <!-- detail Perusahaan -->

  <div class="tb_detail iklan" id="detail_profile_perusahaan" style="display: none">
    <div class="info_peru">
        <div class="title_peru">
            <h4>TENTANG PERUSAHAAN</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="info detail_peru">
            <table>
                <tr>
                    <td rowspan="5">
                        <div id="map"></div>
                    </td>
                    <td>
                        <h5>ALAMAT</h5>
                    </td>
                </tr>
                <tr>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</td>
                </tr>
                <tr>
                    <td>
                        <h5>KONTAK</h5>
                    </td>
                </tr>
                <tr>
                    <td><i class="fas fa-phone"> 082829</i></td>
                </tr>
                <tr>
                    <td><i class="fas fa-envelope">ekstraprima@gmail.com</i></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<br/>

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
