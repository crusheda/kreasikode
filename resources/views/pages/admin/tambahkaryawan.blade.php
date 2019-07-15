@extends('layouts.admin.index')

@section('content')
<!-- main-panel started -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><i class="mdi mdi-account-plus mr-3 icon-sm text-success"></i>Tambah Data Karyawan</h4>
                        <form action="{{ route('karyawan.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <Label>Nama Karyawan</Label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Karyawan">
                            </div>
                            <div class="form-group">
                                <label>Kategori Pekerjaan</label>
                                <select class="form-control" name="kategori">
                                    <option disabled selected>Pilih Deskripsi Pekerjaan</option>
                                    <option value="senior-developer">Senior Developer</option>
                                    <option value="junior-developer">Junior Developer</option>
                                    <option value="tester-system">Tester System</option>
                                    <option value="product-manager">Product Manager</option>
                                    <option value="app-support">Application Support</option>
                                    <option value="designer">Designer UI/UX</option>
                                    <option value="system-analyst">System Analyst</option>
                                    <option value="technical-supp">Technical Support</option>
                                    <option value="system-admin">System Admin</option>
                                    <option value="database-engineer">Database Engineer</option>
                                    <option value="implementator">Implementator</option>
                                </select>
                            </div>
                            <hr>
                            <h4 class="card-title text-center"></i>Penilaian Poin Karyawan</h4>
                            <div class="form-group">
                                    <label>Disiplin</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-dark">Presentase (%) : 1 - 100</span>
                                    </div>
                                    <input type="number" class="form-control" name="disiplin" maxlength="3" max="100" min="1" data-min_max data-min="1" data-max="100">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalinfodsp">
                                            <a><i class="mdi mdi-information-outline text-dark"></i></a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label>Tanggungjawab</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-dark">Presentase (%) : 1 - 100</span>
                                    </div>
                                    <input type="number" class="form-control" name="tanggungjawab" maxlength="3" max="100" min="1" data-min_max data-min="1" data-max="100">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalinfotjb">
                                            <a><i class="mdi mdi-information-outline text-dark"></i></a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label>Planningskill</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-dark">Presentase (%) : 1 - 100</span>
                                    </div>
                                    <input type="number" class="form-control" name="planningskill" maxlength="3" max="100" min="1" data-min_max data-min="1" data-max="100">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalinfopns">
                                            <a><i class="mdi mdi-information-outline text-dark"></i></a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <p class="card-title">Keterangan Karyawan</p>
                    <p class="text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores modi beatae laboriosam consequuntur dolorum ullam, maiores molestias quam! Facilis architecto totam laborum incidunt quo eaque atque suscipit animi autem voluptas?</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Disiplin -->
<div class="modal fade" id="modalinfodsp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><i class="mdi mdi-plus-box"></i>Keterangan Presentase 0 - 100 %</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p>
                    <b>0 - 19 % : </b>   Datang terlambat dan absen tanpa alasan yang jelas<br>
                    <b>20 - 39 % : </b>   Datang kadang terlambat dan perkiraan absensi > 20%<br>
                    <b>40 - 59 % : </b>   Selalu hadir tetapi kadang terlambat dan sesekali absen di beberapa kondisi yang bisa diberi toleransi<br>
                    <b>60 - 79 % : </b>   Selalu hadir tepat waktu, dengan tingkat absensi > 60%<br>
                    <b>80 - 100 % : </b>   Secara konsisten, selalu hadir tepat waktu, dengan tingkat absensi > 8%<br>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tanggungjawab -->
<div class="modal fade" id="modalinfotjb" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><i class="mdi mdi-plus-box"></i>Keterangan Presentase 0 - 100 %</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p>
                    <b>0 - 19 % : </b>   Sering kali tidak mengerjakan tugas yang diberikan<br>
                    <b>20 - 39 % : </b>   Tugas yang diberikan dikerjakan namun kerap kali terlambat  dan banyak ditemui kesalahan<br>
                    <b>40 - 59 % : </b>   Mengerjakan tugas yang diberikan terkadang terlambat  dan kurang sesuai dengan instruksi yang diberikan namun masih dalam batas yang wajar<br>
                    <b>60 - 79 % : </b>   Selalu  mengerjakan  tugas  yang  diberikan  dengan  tepat   waktu meskipun sesekali melakukan kesalahan<br>
                    <b>80 - 100 % : </b>   Selalu  mengerjakan  tugas  yang  diberikan,  mengumpulkan tepat waktu, serta mengerjakan sesuai dengan instruksi yang diberikan<br>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Planningskill -->
<div class="modal fade" id="modalinfopns" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><i class="mdi mdi-plus-box"></i>Keterangan Presentase 0 - 100 %</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p>
                    <b>0 - 19 % : </b>   Tidak pernah bekerja tanpa rencana sama sekali<br>
                    <b>20 - 39 % : </b>   Sering membuat perencanaan dalam bekerja namun sering kali tidak mampu dieksekusi dengan baik<br>
                    <b>40 - 59 % : </b>   Terkadang tidak mengeksekusi perencanaan kerja dengan baik<br>
                    <b>60 - 79 % : </b>   Membuat perencanaan kerja dan mengeksekusinya dengan baik<br>
                    <b>80 - 100 % : </b>   Selalu membuat perencanaan sebelum bekerja serta melakukan monitoring untuk memastikan rencana berjalan dengan baik<br>
                </p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script>
$(document).on('keyup', '[data-min_max]', function(e){
    var min = parseInt($(this).data('min'));
    var max = parseInt($(this).data('max'));
    var val = parseInt($(this).val());
    if(val > max)
    {
        $(this).val(max);
        return false;
    }
    else if(val < min)
    {
        $(this).val(min);
        return false;
    }
});

$(document).on('keydown', '[data-toggle=just_number]', function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
         // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) ||
         // Allow: Ctrl+C
        (e.keyCode == 67 && e.ctrlKey === true) ||
         // Allow: Ctrl+X
        (e.keyCode == 88 && e.ctrlKey === true) ||
         // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
             // let it happen, don't do anything
             return;
    }

    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});
</script>
<!-- main-panel ends -->
@endsection