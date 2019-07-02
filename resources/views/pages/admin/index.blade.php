@extends('layouts.admin.index')

@section('content')
<!-- main-panel started -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Karyawan Berprestasi</p>
            <h1>N U L L</h1>
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
              Repellendus nemo dignissimos asperiores obcaecati delectus corrupti, similique 
              voluptatibus aliquam itaque iure modi repellat, omnis illo aut natus distinctio atque fugiat reiciendis.</p>
            <div id="total-sales-chart-legend"></div>                  
          </div>
          <canvas id="total-sales-chart"></canvas>
        </div>
      </div>
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Grafik Karyawan Berprestasi</p>
            {{-- <canvas id="prestasi-karyawan"></canvas> --}}
            <canvas id="myChart" width="400" height="400"></canvas>
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
{{-- <script>
  var chartData = {
    labels: ["Disiplin", "Tanggungjawab", "Planningskill", "Hasil Total"],
    datasets: [
      {label: '# of Votes', data: [589, 445, 483, 503] },
      { data: [639, 465, 493, 478] }
    ]
  };
  var chLine = document.getElementById("prestasi-karyawan");
  if (chLine) {
    new Chart(chLine, {
    type: 'line',
    data: chartData,
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
    });
  }
</script> --}}
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