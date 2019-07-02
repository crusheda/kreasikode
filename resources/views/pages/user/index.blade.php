@extends('layouts.user.index')

@section('content')

<div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('img/bg2.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand">
          <h2><b>Sistem Pemilihan Karyawan Berprestasi</b></h2>
          <h4>Jl. Garuda No.78A, Manukan, Condong Catur, Condongcatur, Sleman, Manukan, Condongcatur,
            Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283</h4>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main main-raised">
  <div class="section section-download" id="downloadSection">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-8 ml-auto mr-auto">
          <h2>Karyawan Berprestasi</h2>
          <h4>Penghitungan dengan menggunakan Metode Mamdani pada Logika Fuzzy menghasilkan output :</h4>
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-login">
              <div class="card-header card-header-primary text-center">
                <b><h3>NULL</h3></b>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="section section-white">
    <div class="container">
      <div id="navigation-pills">
        <div class="title">
          <h3 align="center">Penilaian Karyawan</h3>
        </div>
        <div class="title">
          <h3>
            <small>Variabel</small>
          </h3>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-8">
            <ul class="nav nav-pills nav-pills-icons" role="tablist">
              <li class="nav-item">
                <a class="nav-link" href="#dsp" role="tab" data-toggle="tab">
                  <i class="material-icons">dashboard</i> Disiplin
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#tjb" role="tab" data-toggle="tab">
                  <i class="material-icons">schedule</i> Tanggungjawab
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pns" role="tab" data-toggle="tab">
                  <i class="material-icons">schedule</i> Planningskill
                </a>
              </li>
            </ul>
            <div class="tab-content tab-space">
              <div class="tab-pane active" id="dsp">
                text 1
              </div>
              <div class="tab-pane" id="tjb">
                text 2
              </div>
              <div class="tab-pane" id="pns">
                text 3
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="row">
              <div class="col-md-3">
                <ul class="nav nav-pills nav-pills-icons flex-column" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active">
                      <i class="material-icons">dashboard</i> Prestasi
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-md-8">
                <div class="tab-content">
                  <div>
                    text 4 - Prestasi
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection