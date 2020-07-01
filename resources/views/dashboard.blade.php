@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                        <div class="float-left">
                            <i class="fa fa-city text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Prefeituras</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">8</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                        <div class="float-left">
                            <i class="fa fa-stethoscope text-warning icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Médicos</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">55</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                        <div class="float-left">
                            <i class="fa fa-notes-medical text-success icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Exames Realizados</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">5693</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                        <div class="float-left">
                            <i class="fa fa-heartbeat text-primary icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Tipos de Exame</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">56</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-4 main-session-titles">Meus Exames</h2>
                    <hr>
                    <div class="fluid-container">
                        <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">

                            <div class="col-12 col-sm-12 col-md-2 col-xl-2 text-center">
                                <img class="img-lg" src="https://scontent.fpoa6-1.fna.fbcdn.net/v/t31.0-8/p960x960/1291835_381876865273664_1243818015_o.jpg?_nc_cat=106&_nc_sid=85a577&_nc_eui2=AeF8lEKiyH6kab29M4gZfOcxJifhUpf6yUQmJ-FSl_rJRNeth5zMvTKPEimA0h2gnlwEb_j3gjO0pnwURqvd1m5Z&_nc_ohc=KD7v9GhK5gYAX_i1RYo&_nc_ht=scontent.fpoa6-1.fna&_nc_tp=6&oh=ea1ae1b845e31e7b16dab54f1cae068b&oe=5EC7BC15" alt="profile image">
                            </div>

                            <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                                <div class="d-flex">
                                    <p class="hall-town-health-unit-titles font-weight-bold mr-2 mb-0 no-wrap">Prefeitura de Sumaré | Unidade de saúde</p>
                                </div>
                                <div class="row text-gray d-md-flex d-none">
                                    <div class="col-12 d-flex">
                                        <small class="Last-responded mr-2 mb-0 text-muted text-muted">Adicionado em : 15/04/2019</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                                <p class="exams-title mb-2">Urina, TCGH, Colesterol Total</p>
                            </div>

                            <div class="col-12 col-sm-12 col-md-2 col-xl-2">

                                <button type="button" class="btn btn-block btn-green-alternative"><i class="fa fa-download"></i> Efetuar download </button>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-6">

        <div class="card mt-3">
            <div class="p-4 pr-5 border-bottom bg-light d-sm-flex justify-content-between">
                <h4 class="">Gráfico de Queixas</h4>
                <div id="pie-chart-legend" class="mr-4"></div>
            </div>
            <div class="card-body d-flex">
                <canvas class="my-auto" id="pieChart" height="50"></canvas>
            </div>
        </div>

        </div>

        <div class="col-6">

            <div class="card mt-3">
                <div class="p-4 pr-5 border-bottom bg-light d-sm-flex justify-content-between">
                    <h4 class="">Gráfico de Queixas</h4>
                    <div id="pie-chart-legend" class="mr-4"></div>
                </div>
                <div class="card-body d-flex">
                    <canvas class="my-auto" id="pieChart" height="50"></canvas>
                </div>
            </div>

        </div>

    </div>



        @endsection


        @push('plugin-scripts')
            <script src="{{asset('/assets/plugins/chartjs/chart.min.js')}}"></script>
            <script src="{{asset('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        @endpush

        @push('custom-scripts')
            <script src="{{asset('/assets/js/dashboard.js')}}"></script>
            <script>

                if ($("#pieChart").length) {
                    var pieChartCanvas = $("#pieChart")
                        .get(0)
                        .getContext("2d");
                    var pieChart = new Chart(pieChartCanvas, {
                        type: "pie",
                        data: {
                            datasets: [
                                {
                                    data: [30, 40, 30],
                                    backgroundColor: [
                                        ChartColor[0],
                                        ChartColor[1],
                                        ChartColor[2]
                                    ],
                                    borderColor: [
                                        ChartColor[0],
                                        ChartColor[1],
                                        ChartColor[2]
                                    ]
                                }
                            ],
                            labels: ["Dor na febre", "Dor nas pernas", "Dor nas mãos"]
                        },
                        options: {
                            responsive: true,
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            },
                            legend: {
                                display: false
                            },
                            legendCallback: function(chart) {
                                var text = [];
                                text.push('<div class="chartjs-legend"><ul>');
                                for (
                                    var i = 0;
                                    i < chart.data.datasets[0].data.length;
                                    i++
                                ) {
                                    text.push(
                                        '<li><span style="background-color:' +
                                        chart.data.datasets[0].backgroundColor[i] +
                                        '">'
                                    );
                                    text.push("</span>");
                                    if (chart.data.labels[i]) {
                                        text.push(chart.data.labels[i]);
                                    }
                                    text.push("</li>");
                                }
                                text.push("</div></ul>");
                                return text.join("");
                            }
                        }
                    });
                    document.getElementById(
                        "pie-chart-legend"
                    ).innerHTML = pieChart.generateLegend();
                }

            </script>

        @endpush
