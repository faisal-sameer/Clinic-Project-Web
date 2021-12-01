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
            <div class="row " style="margin-top: 15%">
                <div class="text-center  " style="background-color: rgb(189, 189, 189)">
                    <p id="Months">احصائيات المراجعين بالاشهر </p>
                    <p id="Services">احصائيات المراجعين بالخدمات</p>
                </div>
                <div class="card bounce-in-top " id="cards">


                    <div id="Paris" class="w3-container city">
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
        var Months = @json($all[0]['Months']);
        window.onload = myFunctionNew(Months);

        function myFunctionNew(data) {

            var num = 1;


            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
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
                    dataPoints:

                        data

                }]
            });
            chart.render();
        }
    </script>

    <script>
        document.getElementById("Services").addEventListener("click", function() {
            var Service = @json($all[0]['Service']);

            myFunctionNew(Service);
        });
    </script>
    <script>
        document.getElementById("Months").addEventListener("click", function() {
            myFunctionNew(Months);
        });
    </script>
@endsection
