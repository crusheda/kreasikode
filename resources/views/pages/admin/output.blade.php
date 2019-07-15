@extends('layouts.admin.index')

@section('content')
<!-- main-panel started -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h5 align="center">Tabel Penghitungan Karyawan Dengan Metode Mamdani</h5>
                        <div class="table-responsive">
                            <table id="tabelhitung" class="table">
                                <thead>
                                    <tr align="center">
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Nama Karyawan</th>
                                        <th colspan="3">Disiplin</th>
                                        <th colspan="3">Tanggungjawab</th>
                                        <th colspan="3">Planingskill</th>
                                        <th rowspan="2">Predikat</th>
                                    </tr>
                                    <tr>
                                        <th>Buruk</th>
                                        <th>Cukup</th>
                                        <th>Baik</th>
                                        <th>Jelek</th>
                                        <th>Lumayan</th>
                                        <th>Bagus</th>
                                        <th>Buruk</th>
                                        <th>Cukup</th>
                                        <th>Baik</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($data['list']) > 0)
                                @foreach($data['list'] as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        @foreach($item['hasildsp'] as $items)
                                            <td>{{ $items }}</td>
                                        @endforeach
                                        @foreach($item['hasiltjb'] as $items)
                                            <td>{{ $items }}</td>
                                        @endforeach
                                        @foreach($item['hasilpns'] as $items)
                                            <td>{{ $items }}</td>
                                        @endforeach
                                        <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#predikat{{ $item['id'] }}">
                                            Tampil
                                        </button>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td>Tidak Ada Data</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        @if ($data['active_button'])
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button style="position:relative" class="btn btn-primary mt-2 mt-xl-0 btn-lg" onclick="window.location.
                        href='{{ url('/mamdani/hitung/simpan') }}'">
                        <i class="mdi mdi-chart-areaspline mr-3 icon-sm"></i>Simpan
                    </button>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title" align="center">Karyawan Berprestasi Saat Ini</p>
                        <div class="table-responsive">
                            <p align="center">Dari hasil perhitungan dengan menggunakan Metode Mamdani, dihasilkan output Karyawan Berprestasi yaitu :</p>
                            {{-- @foreach ($data['hasil'] as $item) --}}
                            {{-- <b><h2 align="center">{{ $data['hasil']['nama'] }}</h2></b> --}}
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($data['list'] as $item)
<div class="modal fade bd-example-modal-sm" id="predikat{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLongTitle">Hasil Predikat Untuk Karyawan : <br><b>{{ $item['nama'] }}</b></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th >Role ke-</th>
                            <th >Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1
                        @endphp
                        @foreach($item['predikat'] as $key => $items)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $items }}</td>
                        </tr>
                        @if ($i == count($item['predikat']) - 11)
                            @break
                        @endif
                        @php
                            $i++
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <h5 class="modal-title">Nilai Max Untuk Komposisi Aturan :</h5>
                <p>Max Buruk : <b>{{ $item['predikat']['maxburuk'] }}</b></p>
                <p>Max Baik : <b>{{ $item['predikat']['maxbaik'] }}</b></p>
                <h5 class="modal-title">Penentuan Komposisi Aturan :</h5>
                <p>Z1 : <b>{{ $item['predikat']['z1'] }}</b></p>
                <p>Z2 : <b>{{ $item['predikat']['z2'] }}</b></p>
                <h5 class="modal-title">Penentuan Momen Untuk Setiap Daerah :</h5>
                <p>M1 : <b>{{ $item['predikat']['m1'] }}</b></p>
                <p>M2 : <b>{{ $item['predikat']['m2'] }}</b></p>
                <p>M3 : <b>{{ $item['predikat']['m3'] }}</b></p>
                <h5 class="modal-title">Penentuan Area Untuk Setiap Daerah :</h5>
                <p>A1 : <b>{{ $item['predikat']['a1'] }}</b></p>
                <p>A2 : <b>{{ $item['predikat']['a2'] }}</b></p>
                <p>A3 : <b>{{ $item['predikat']['a3'] }}</b></p>
                <h5 class="modal-title">Penentuan Titik Pusat Dari Daerah Fuzzy :</h5>
                <p>Z : <b>{{ $item['predikat']['z'] }}</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabelhitung').dataTable( {
            paging: true,
            searching: true
        } );
    } );
</script>
@endsection