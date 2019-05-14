@extends('layouts.admin.index')

@section('content')
<!-- main-panel started -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button style="position:relative" class="btn btn-primary mt-2 mt-xl-0 btn-lg" onclick="window.location.
                        href=''">
                        <i class="mdi mdi-chart-areaspline mr-3 icon-sm"></i>Hitung
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <p class="card-title">Pencarian Nilai Keanggotaan Fuzzy</p>
                        <p><i class="mdi mdi-check mr-3 icon-sm"></i><b>Nilai keanggotaan himpunan fuzzy dari variabel KPI :<br>{{ $list['msgkpi'] }}</b></p>
                        <p>Maka, Nilai yang dipakai adalah {{ $list['hasilkpi'] }}</p>
                        <p><i class="mdi mdi-check mr-3 icon-sm"></i><b>Nilai keanggotaan himpunan fuzzy dari variabel Softskill :<br>{{ $list['msgsoftskill'] }}</b></p>
                        <p>Maka, Nilai yang dipakai adalah {{ $list['hasilsoftskill'] }}</p>
                        <p><i class="mdi mdi-check mr-3 icon-sm"></i><b>Nilai keanggotaan himpunan fuzzy dari variabel Hardskill :<br>{{ $list['msghardskill'] }}</b></p>
                        <p>Maka, Nilai yang dipakai adalah {{ $list['hasilhardskill'] }}</p> --}}
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p>Dari hasil aplikasi fungsi implikasi dari tiap aturan,
                        digunakan metode MAX untuk melakukan komposisi antar semua aturan. 
                        Penghitungannya sebagai berikut :</p>
                        <p></p>
                        <br>
                        @foreach ($list as $item)
                            <div>{{$item['id']}}  -  {{$item['nama']}}  -  {{$item['predikat']}}</div>
                        @endforeach
                        {{-- <p>{{ $list['show'] }}</p>     --}}

                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Proses Penghitungan Metode Mamdani</p>
                        <div class="table-responsive">
                        {{-- <p>{{ $list['totalpredikat']}}</p>     --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Proses Penghitungan Metode Mamdani</p>
                        <div class="table-responsive">
                        {{-- <p>{{ $list['show'] }}</p>  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-panel ends -->
@endsection