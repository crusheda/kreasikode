@extends('layouts.admin.index')

@section('content')
<!-- main-panel started -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                            <a class="text-muted mb-0 hover-cursor">Penghitungan Menggunakan Metode Mamdani</a>
                    </div>
                </div>
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
                                        <h5 class="mr-2 mb-0">KPI</h5><br>
                                        <i class="mdi mdi-numeric-1-box-outline mr-3 icon-lg text-primary"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">- Tinggi <b>> 150</b></small>
                                            <small class="mb-1 text-muted">- Sedang <b>150 < x < 75</b></small>
                                            <small class="mb-1 text-muted">- Rendah <b>< 75</b></small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <h5 class="mr-2 mb-0">Soft Skill</h5><br>
                                        <i class="mdi mdi-numeric-2-box-outline mr-3 icon-lg text-primary"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">- Baik <b>> 100</b></small>
                                            <small class="mb-1 text-muted">- Cukup <b>100 < x < 50</b></small>
                                            <small class="mb-1 text-muted">- Buruk <b>< 50</b></small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <h5 class="mr-2 mb-0">Hard Skill</h5><br>
                                        <i class="mdi mdi-numeric-3-box-outline mr-3 icon-lg text-primary"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">- Bagus <b>> 100</b></small>
                                            <small class="mb-1 text-muted">- Lumayan <b>100 < x < 50</b></small>
                                            <small class="mb-1 text-muted">- Jelek <b>< 50</b></small>
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
                        <div class="table-responsive"  style="height:500px;overflow-y: auto;width: 100%;display:block">
                            <table id="recent-purchases-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Aturan Himpunan Fuzzy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>IF KPI TINGGI AND SOFTSKILL BAIK AND HARDSKILL BAGUS THEN PRESTASI</td>
                                    </tr>
                                        <td>2</td>
                                        <td>IF KPI TINGGI AND SOFTSKILL BAIK AND HARDSKILL LUMAYAN THEN PRESTASI</td>
                                    </tr>
                                        <td>3</td>
                                        <td>IF KPI TINGGI AND SOFTSKILL BAIK AND HARDSKILL JELEK THEN PRESTASI</td>
                                    </tr>
                                        <td>4</td>
                                        <td>IF KPI TINGGI AND SOFTSKILL CUKUP AND HARDSKILL BAGUS THEN PRESTASI</td>
                                    </tr>
                                        <td>5</td>
                                        <td>IF KPI TINGGI AND SOFTSKILL CUKUP AND HARDSKILL LUMAYAN THEN PRESTASI</td>
                                    </tr>
                                        <td>6</td>
                                        <td>IF KPI TINGGI AND SOFTSKILL CUKUP AND HARDSKILL JELEK THEN PRESTASI</td>
                                    </tr>
                                        <td>7</td>
                                        <td>IF KPI TINGGI AND SOFTSKILL BURUK AND HARDSKILL BAGUS THEN PRESTASI</td>
                                    </tr>
                                        <td>8</td>
                                        <td>IF KPI TINGGI AND SOFTSKILL BURUK AND HARDSKILL LUMAYAN THEN PRESTASI</td>
                                    </tr>
                                        <td>9</td>
                                        <td>IF KPI TINGGI AND SOFTSKILL BURUK AND HARDSKILL JELEK THEN PRESTASI</td>
                                    </tr>
                                        <td>10</td>
                                        <td>IF KPI SEDANG AND SOFTSKILL BAIK AND HARDSKILL BAGUS THEN PRESTASI</td>
                                    </tr>
                                        <td>11</td>
                                        <td>IF KPI SEDANG AND SOFTSKILL BAIK AND HARDSKILL LUMAYAN THEN PRESTASI</td>
                                    </tr>
                                        <td>12</td>
                                        <td>IF KPI SEDANG AND SOFTSKILL BAIK AND HARDSKILL JELEK THEN PRESTASI</td>
                                    </tr>
                                        <td>13</td>
                                        <td>IF KPI SEDANG AND SOFTSKILL CUKUP AND HARDSKILL BAGUS THEN PRESTASI</td>
                                    </tr>
                                        <td>14</td>
                                        <td>IF KPI SEDANG AND SOFTSKILL CUKUP AND HARDSKILL LUMAYAN THEN PRESTASI</td>
                                    </tr>
                                        <td>15</td>
                                        <td>IF KPI SEDANG AND SOFTSKILL CUKUP AND HARDSKILL JELEK THEN PRESTASI</td>
                                    </tr>
                                        <td>16</td>
                                        <td>IF KPI SEDANG AND SOFTSKILL BURUK AND HARDSKILL BAGUS THEN PRESTASI</td>
                                    </tr>
                                        <td>17</td>
                                        <td>IF KPI SEDANG AND SOFTSKILL BURUK AND HARDSKILL LUMAYAN THEN PRESTASI</td>
                                    </tr>
                                        <td>18</td>
                                        <td>IF KPI SEDANG AND SOFTSKILL BURUK AND HARDSKILL JELEK THEN PRESTASI</td>
                                    </tr>
                                        <td>19</td>
                                        <td>IF KPI RENDAH AND SOFTSKILL BAIK AND HARDSKILL BAGUS THEN PRESTASI</td>
                                    </tr>
                                        <td>20</td>
                                        <td>IF KPI RENDAH AND SOFTSKILL BAIK AND HARDSKILL LUMAYAN THEN PRESTASI</td>
                                    </tr>
                                        <td>21</td>
                                        <td>IF KPI RENDAH AND SOFTSKILL BAIK AND HARDSKILL JELEK THEN PRESTASI</td>
                                    </tr>
                                        <td>22</td>
                                        <td>IF KPI RENDAH AND SOFTSKILL CUKUP AND HARDSKILL BAGUS THEN PRESTASI</td>
                                    </tr>
                                        <td>23</td>
                                        <td>IF KPI RENDAH AND SOFTSKILL CUKUP AND HARDSKILL LUMAYAN THEN PRESTASI</td>
                                    </tr>
                                        <td>24</td>
                                        <td>IF KPI RENDAH AND SOFTSKILL CUKUP AND HARDSKILL JELEK THEN PRESTASI</td>
                                    </tr>
                                        <td>25</td>
                                        <td>IF KPI RENDAH AND SOFTSKILL BURUK AND HARDSKILL BAGUS THEN PRESTASI</td>
                                    </tr>
                                        <td>26</td>
                                        <td>IF KPI RENDAH AND SOFTSKILL BURUK AND HARDSKILL LUMAYAN THEN PRESTASI</td>
                                    </tr>
                                        <td>27</td>
                                        <td>IF KPI RENDAH AND SOFTSKILL BURUK AND HARDSKILL JELEK THEN PRESTASI</td>
                                    </tr>
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
                        <p class="card-title">Proses Penghitungan Metode Mamdani</p>
                        <div class="table-responsive">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat consequuntur, qui libero voluptatibus quae illum exercitationem aperiam. Autem cumque tempore quia, quidem officiis deserunt corrupti dolore pariatur nobis ab id!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-panel ends -->
@endsection