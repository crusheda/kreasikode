@extends('layouts.admin.index')

@section('content')
<!-- main-panel started -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                            <a class="text-muted mb-0 hover-cursor">Data Karyawan PT.Kreasi Kode</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <button class="btn btn-success mt-2 mt-xl-0" onclick="window.location.
                        href='{{ route('karyawan.create') }}'">
                        <i class="mdi mdi-account-plus mr-3 icon-sm"></i>Tambah Karyawan
                    </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body dashboard-tabs p-0">
                        <div class="tab-content py-0 px-0">
                            <div class="tab-pane fade show active" id="" role="tabpanel">
                                <div class="d-flex flex-wrap justify-content-xl-between">
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <h5 class="mr-2 mb-0">Total Karyawan</h5><br>
                                        <i class="mdi mdi-account-multiple mr-3 icon-lg text-primary"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <h5 class="mr-2 mb-0">{{ $list['count'] }}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-checkbox-multiple-marked-outline mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Total Disiplin</small>
                                            <h5 class="mr-2 mb-0">{{ $list['jmldsp'] }}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-checkbox-multiple-marked-outline mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Total Tanggungjawab</small>
                                            <h5 class="mr-2 mb-0">{{ $list['jmltjb'] }}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-checkbox-multiple-marked-outline mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Total Planningskill</small>
                                            <h5 class="mr-2 mb-0">{{ $list['jmlpns'] }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>              
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Tabel Karyawan</p>
                        <div class="table-responsive">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <table id="tabelkaryawan" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Disiplin</th>
                                    <th>Tanggungjawab</th>
                                    <th>Planningskill</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(count($list) > 0)
                                    @foreach($list['show'] as $list)
                                        <tr>
                                            <td>{{ $list->id }}</td>
                                            <td>{{ $list->nama }}</td>
                                            <td>{{ $list->kategori }}</td>
                                            <td>{{ $list->disiplin }}</td>
                                            <td>{{ $list->tanggungjawab }}</td>
                                            <td>{{ $list->planningskill }}</td>
                                            <td>
                                                <center>
                                                    <button class="btn btn-warning" onclick="window.location.
                                                        href='{{ route('karyawan.edit', $list->id) }}'">Ubah
                                                    </button>
                                                </center>
                                                <hr>
                                                <center>
                                                    <form action="{{ route('karyawan.destroy', $list->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-primary">Hapus</button>
                                                    </form>
                                                </center>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan=3>Tidak Ada Karyawan</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-panel ends -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabelkaryawan').dataTable( {
            paging: true,
            searching: true
        } );
    } );
</script>
@endsection