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
                                        <th colspan="3">KPI</th>
                                        <th colspan="3">Soft Skill</th>
                                        <th colspan="3">Hard Skill</th>
                                        <th rowspan="2">Predikat</th>
                                    </tr>
                                    <tr>
                                        <th>Rendah</th>
                                        <th>Sedang</th>
                                        <th>Tinggi</th>
                                        <th>Jelek</th>
                                        <th>Lumayan</th>
                                        <th>Bagus</th>
                                        <th>Buruk</th>
                                        <th>Cukup</th>
                                        <th>Baik</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($list) > 0)
                                @foreach($list as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        @foreach($item['hasilkpi'] as $items)
                                            <td>{{ $items }}</td>
                                        @endforeach
                                        @foreach($item['hasilss'] as $items)
                                            <td>{{ $items }}</td>
                                        @endforeach
                                        @foreach($item['hasilhs'] as $items)
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
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Tahapan Penghitungan Metode Mamdani</p>
                        <div class="table-responsive">
                            <p>Disini dilampirkan cara penghitungan dengan menggunakan metode mamdani hingga hasil akhir.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($list as $item)
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
                        @if ($i == count($item['predikat']) - 4)
                            @break
                        @endif
                        @php
                            $i++
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <h5 class="modal-title" id="exampleModalLongTitle">Komposisi Aturan :</h5>
                <p>Max Buruk : <b>{{ $item['predikat']['maxburuk'] }}</b></p>
                <p>Max Buruk : <b>{{ $item['predikat']['maxbaik'] }}</b></p>
                <h5 class="modal-title" id="exampleModalLongTitle">Nilai Keanggotaan :</h5>
                <p>A1 : <b>{{ $item['predikat']['a1'] }}</b></p>
                <p>A2 : <b>{{ $item['predikat']['a2'] }}</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- main-panel ends -->
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