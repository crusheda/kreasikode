@extends('layouts.admin.index')

@section('content')
<!-- main-panel started -->
<div class="main-panel">
    <div class="content-wrapper">
        <form class="form-inline" action="{{ route('admin.history') }}" method="GET">
            <div class="form-group">
                <select class="form-control mb-2" name="bulan" style="color:black">
                    <option disabled selected>Filter Bulan</option>
                    <option value="07">Juli</option>
                    <option value="06">Juni</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control mx-sm-3 mb-2" name="tahun" style="color:black">
                    <option disabled selected>Filter Tahun</option>
                    <option value="2019">2019</option>
                </select>
            </div>
            <button class="btn btn-success mb-2">REFRESH</button>
        </form>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h5 align="center">History Penghitungan Karyawan Dengan Metode Mamdani</h5>
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
                                    @if(count($list['show']) > 0)
                                    @foreach($list['show'] as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->dspburuk }}</td>
                                            <td>{{ $item->dspcukup }}</td>
                                            <td>{{ $item->dspbaik }}</td>
                                            <td>{{ $item->tjbjelek }}</td>
                                            <td>{{ $item->tjblumayan }}</td>
                                            <td>{{ $item->tjbbagus }}</td>
                                            <td>{{ $item->pnsburuk }}</td>
                                            <td>{{ $item->pnscukup }}</td>
                                            <td>{{ $item->pnsbaik }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#predikat{{ $item->id }}">
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
                        <h5 align="center">History Karyawan Berprestasi</h5>
                        <div class="table-responsive">
                            <table id="tabelhistory" class="table">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($list['show'] as $item)
<div class="modal fade bd-example-modal-sm" id="predikat{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLongTitle">Hasil Predikat Untuk Karyawan : <br><b>{{ $item->nama }}</b></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <table class="table">
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
                </table> --}}
                <hr>
                <h5 class="modal-title" id="exampleModalLongTitle">Komposisi Aturan :</h5>
                <p>Max Buruk : <b>{{ $item->maxburuk }}</b></p>
                <p>Max Baik : <b>{{ $item->maxbaik }}</b></p>
                <h5 class="modal-title" id="exampleModalLongTitle">Nilai Keanggotaan :</h5>
                <p>A1 : <b>{{ $item->a1 }}</b></p>
                <p>A2 : <b>{{ $item->a2 }}</b></p>
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