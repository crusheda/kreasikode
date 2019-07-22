@extends('layouts.admin.index')

@section('content')
<!-- main-panel started -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body dashboard-tabs p-0">
                        <center>
                            <br>
                            <p class="card-title">Himpunan Fuzzy</p>
                            <hr>
                        </center>
                        <div class="tab-content py-0 px-0">
                            <div class="tab-pane fade show active" id="" role="tabpanel">
                                <div class="d-flex flex-wrap justify-content-xl-between">
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <h5 class="mr-2 mb-0">Disiplin</h5><br>
                                        <i class="mdi mdi-numeric-1-box-outline mr-3 icon-lg text-primary"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">- Buruk</small>
                                            <small class="mb-1 text-muted">- Cukup</small>
                                            <small class="mb-1 text-muted">- Baik</small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <h5 class="mr-2 mb-0">Tanggungjawab</h5><br>
                                        <i class="mdi mdi-numeric-2-box-outline mr-3 icon-lg text-primary"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">- Jelek</small>
                                            <small class="mb-1 text-muted">- Lumayan</small>
                                            <small class="mb-1 text-muted">- Bagus</small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <h5 class="mr-2 mb-0">Planning Skill</h5><br>
                                        <i class="mdi mdi-numeric-3-box-outline mr-3 icon-lg text-primary"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">- Buruk</small>
                                            <small class="mb-1 text-muted">- Cukup</small>
                                            <small class="mb-1 text-muted">- Baik</small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <h5 class="mr-2 mb-0">Prestasi</h5><br>
                                        <i class="mdi mdi-numeric-4-box-multiple-outline mr-3 icon-lg text-primary"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">- Tidak Berprestasi</small>
                                            <small class="mb-1 text-muted">- Berprestasi</small>
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
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button style="position:relative" class="btn btn-primary mt-2 mt-xl-0 btn-lg" onclick="window.location.
                        href='{{ url('/mamdani/hitung') }}'">
                        <i class="mdi mdi-chart-areaspline mr-3 icon-sm"></i>Hitung
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Aturan Fuzzy</p>
                        <div class="table-responsive">
                            <table id="tabelrole" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Aturan Himpunan Fuzzy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($list) > 0)
                                @foreach($list as $list)
                                    <tr>
                                        <td>{{ $list->id }}</td>
                                        <td>IF DISIPLIN {{ $list->disiplin }} AND TANGGUNGJAWAB {{ $list->tanggungjawab }} AND PLANNINGSKILL {{ $list->planningskill }} THEN {{ $list->prestasi }}</td>
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
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabelrole').dataTable( {
            paging: true,
            searching: true
        } );
    } );
</script>
@endsection