@extends('layouts.admin.index')

@section('content')
<!-- main-panel started -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-body">
                        <h4 class="card-title"><i class="mdi mdi-account-plus mr-3 icon-sm text-success"></i>Ubah Data Karyawan #{{ $list->id }}</h4>
                        <form action="{{url('karyawan', [$list->id])}}" method="POST">
                            {{method_field('PUT')}}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <Label>Nama Karyawan</Label>
                            <input type="text" class="form-control" name="nama" value="{{ $list->nama }}" placeholder="{{ $list->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Pekerjaan</label>
                                <select class="form-control" name="kategori">
                                    <option disabled selected>Pilih Deskripsi Pekerjaan</option>
                                    <option value="senior-developer"    <?php if ($list->kategori == 'senior-developer' ) echo 'selected' ; ?>>Senior Developer</option>
                                    <option value="junior-developer"    <?php if ($list->kategori == 'junior-developer' ) echo 'selected' ; ?>>Junior Developer</option>
                                    <option value="tester-system"       <?php if ($list->kategori == 'tester-system' ) echo 'selected' ; ?>>Tester System</option>
                                    <option value="product-manager"     <?php if ($list->kategori == 'product-manager' ) echo 'selected' ; ?>>Product Manager</option>
                                    <option value="app-support"         <?php if ($list->kategori == 'app-support' ) echo 'selected' ; ?>>Application Support</option>
                                    <option value="designer"            <?php if ($list->kategori == 'designer' ) echo 'selected' ; ?>>Designer</option>
                                    <option value="system-analyst"      <?php if ($list->kategori == 'system-analyst' ) echo 'selected' ; ?>>System Analyst</option>
                                    <option value="technical-supp"      <?php if ($list->kategori == 'technical-supp' ) echo 'selected' ; ?>>Technical Support</option>
                                    <option value="system-admin"        <?php if ($list->kategori == 'system-admin' ) echo 'selected' ; ?>>System Admin</option>
                                    <option value="database-engineer"   <?php if ($list->kategori == 'database-engineer' ) echo 'selected' ; ?>>Database Engineer</option>
                                    <option value="implementator"       <?php if ($list->kategori == 'implementator' ) echo 'selected' ; ?>>Implementator</option>
                                </select>
                            </div>
                            <hr>
                            <div class="form-group">
                                    <label>Disiplin</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Poin 0 - 50</span>
                                    </div>
                                    <input type="number" class="form-control" name="disiplin" value="{{ $list->disiplin }}" maxlength="1" max="50" min="1" data-min_max data-min="1" data-max="50" placeholder="{{ $list->disiplin }}">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label>Tanggungjawab</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Poin 40 - 80</span>
                                    </div>
                                    <input type="number" class="form-control" name="tanggungjawab" value="{{ $list->tanggungjawab }}" maxlength="1" max="80" min="40" data-min_max data-min="1" data-max="80" placeholder="{{ $list->tanggungjawab }}">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label>Planningskill</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Poin 60 - 130</span>
                                    </div>
                                    <input type="number" class="form-control" name="planningskill" value="{{ $list->planningskill }}" maxlength="1" max="130" min="60" data-min_max data-min="1" data-max="130" placeholder="{{ $list->planningskill }}">
                                </div>
                            </div>
                            <button class="btn btn-success">Submit</button>
                        </form>
                    </div>
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