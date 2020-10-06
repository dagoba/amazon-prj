@extends('layouts.admin')
@section('title')
 @lang('view_adminpanel.index_title')
@endsection
@section('content')

<div class="row">
{{-- <div class="col-md-4">
    <div class="card ">
    
        <div class="card-header ">
        <h4 class="card-title">Email Statistics</h4>
                            <p class="card-category">Last Campaign Performance</p>
        </div>
        
        <div class="card-body ">
            
    
            
    
            
    
            
    
            
                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
            
        </div>
        
        
        <div class="card-footer ">
            <div class="legend">
                                <i class="fa fa-circle text-info"></i> Open
                                <i class="fa fa-circle text-danger"></i> Bounce
                                <i class="fa fa-circle text-warning"></i> Unsubscribe
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                            </div>
        </div>
        
    </div>
</div> --}}
<div class="col-md-12">
<!-- Counts Section -->
{{-- <section class="dashboard-counts section-padding">
  <div class="container-fluid"> --}}
    <div class="card ">    
      <div class="card-header ">
        <h4 class="card-title">@lang('view_adminpanel.index_h4') {{$year}}</h4>
        <p class="card-category">@lang('view_adminpanel.index_description')</p>
      </div>
      <div class="card-body ">
        <div id="chartActivity" class="ct-chart"></div>
      </div>
      <div class="card-footer ">
        <div class="legend">
          <i class="fa fa-circle text-info"></i> @lang('view_adminpanel.index_attachments')
          <i class="fa fa-circle text-danger"></i> @lang('view_adminpanel.index_charges')
        </div>
        <hr>
        <div class="stats">
          <i class="fa fa-check"></i> @lang('view_adminpanel.index_info')
        </div>
      </div>
    </div>
  {{-- </div>
</section> --}}
</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function(){

        var data = {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          series: [
            [
              @foreach($rates as $rate)
                @if($rate !== NULL)
                  {{$rate}},
                @else
                  0,
                @endif
              @endforeach
            ],
            [
              {{$profits['jan']}}, 
              {{$profits['feb']}}, 
              {{$profits['mar']}}, 
              {{$profits['apr']}}, 
              {{$profits['mai']}}, 
              {{$profits['jun']}}, 
              {{$profits['jul']}}, 
              {{$profits['aug']}}, 
              {{$profits['sep']}}, 
              {{$profits['oct']}}, 
              {{$profits['nov']}}, 
              {{$profits['dec']}}
            ]
          ]
        };

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };

        var responsiveOptions = [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];

        var chartActivity = Chartist.Bar('#chartActivity', data, options, responsiveOptions);


        var dataPreferences = {
            series: [
                [25, 30, 20, 25]
            ]
        };

        var optionsPreferences = {
            donut: true,
            donutWidth: 40,
            startAngle: 0,
            total: 100,
            showLabel: false,
            axisX: {
                showGrid: false
            }
        };

        Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);

        Chartist.Pie('#chartPreferences', {
          labels: ['53%','36%','11%'],
          series: [53, 36, 11]
        });
});
</script>

@endsection
