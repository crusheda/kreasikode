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
                            <div class="form-group">
                                    <label>KPI</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1 - 100</span>
                                    </div>
                                    <input type="number" class="form-control" name="kpi" maxlength="3" max="100" min="1" data-min_max data-min="1" data-max="100">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label>Soft Skill</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1 - 100</span>
                                    </div>
                                    <input type="number" class="form-control" name="softskill" maxlength="3" max="100" min="1" data-min_max data-min="1" data-max="100">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label>Hard Skill</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1 - 100</span>
                                    </div>
                                    <input type="number" class="form-control" name="hardskill" maxlength="3" max="100" min="1" data-min_max data-min="1" data-max="100">
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