@extends('layouts.app')
@section('we')
    /
@endsection
@section('se')
    /
@endsection
@section('con')
    /
@endsection

@section('content')
    <div class="welcome-area" id="welcome">
        <div class="container" id="container">
          <div class="row " style="margin-top: 15%" >
            <div class="card bounce-in-top " id="cards">
                   <div id="Paris" class="w3-container city" >
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                      </div>
                  </div>
                       </p>
                        </div>       
                     </div>
    </div>
@endsection
@section('script')
<script>
    window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "الأشهر"
        },
        axisY: {
            title: "عدد الزيارات "
        },
        data: [{        
            type: "column",  
            showInLegend: true, 
            legendMarkerColor: "grey",
            legendText: "MMbbl = one million barrels",
            dataPoints: [      
                { y: 300878, label: "يناير" },
                { y: 266455,  label: "فبراير" },
                { y: 169709,  label: "مارس" },
                { y: 158400,  label: "أبريل" },
                { y: 142503,  label: "مايو" },
                { y: 101500, label: "يونيو" },
                { y: 97800,  label: "يوليو" },
                { y: 300878,  label: "أغسطس" },
                { y: 1000,  label: "سبتمبر" },
                { y: 5000,  label: "أكتوبر" },

            ]
        }]
    });
    chart.render();
    }
    </script>
    @endsection
