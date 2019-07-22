@extends('layouts.admin.index')

@section('content')
<!-- main-panel started -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-5">
        <div class="card">
          <div class="card-body">
            <p class="card-title"><i class="mdi mdi-account-outline"></i> Karyawan Berprestasi Bulan Ini</p>
            @if(count($list['show']) > 0)
            @foreach($list['show'] as $item)
              </i><h1 class="text-primary"><i class="mdi mdi-account"></i>{{ $item->nama }}</h1>
              <h5 class="text-secondary">Ditetapkan Menjadi Karyawan Berprestasi Pada :<br><p>{{ $item->created_at }}</p></h5><hr>
              <h5 class="text-muted">Kategori Pekerjaan : {{ $item->kategori }}</h5>
            @endforeach
            @else
            <u class="text-secondary"><h1 class="text-primary">Hasil Tidak Ditemukan</h1></u>
            @endif                  
          </div>
          {{-- <canvas id="total-sales-chart"></canvas> --}}
        </div>
      </div>
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title"><i class="mdi mdi-chart-line"></i> Grafik Karyawan Berprestasi</p>
            <canvas id="myChart" width="44" height="25"></canvas>
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
        $('#tabelhitung').dataTable( {
            paging: true,
            searching: true
        } );
    } );
</script>
<script src="{{ URL::asset('js/Chart.js') }}"></script>
<script>
jQuery.ajax({
  url: '/admin/grafik',
  method: 'GET',
  success: function(result){
      console.log(result);
      show = [];
      result.data.forEach(item => {
        var dataItem = [item.disiplin, item.planningskill, item.tanggungjawab, item.z]
        show.push({label: item.nama + " (" + item.created_at + ")" , data: dataItem , borderWidth: 1 })
      });
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: ['Disiplin', 'Planning Skill', 'Tanggungjawab', 'Hasil Total'],
              datasets: show
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });
}});
</script>
@endsection