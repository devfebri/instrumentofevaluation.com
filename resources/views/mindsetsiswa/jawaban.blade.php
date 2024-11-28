@extends('layouts.master')
@section('css')
<link href="{{ asset('template/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">


                    <h4 class="page-title">
                        <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>

                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <canvas id="myChart" height="50"></canvas>
                    </div>
                </div>

            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Jawaban <br> Indikator : {{ $indikator->nama_indikator }}</h4>
                        <table id="datatable1" class="table table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Mahasiswa</th>
                                    <th>Skor</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jawaban as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->nim}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->skor}}</td>
                                    {{-- <td>{{$row->skor}}</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop
@section('javascript')
<!-- Chart JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


<script src="{{ asset('template/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src='{{ asset('template/assets/plugins/select2/select2.min.js') }}'></script>
<script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>



<script>
    var data=<?php echo json_encode($value) ?>;
    $('#datatable1').DataTable();

    $(document).ready(function () {
        //creating lineChart
        // alert(countsoal);
        var lineChart = {
            labels: ["Sangat Tidak Setuju","Tidak Setuju","Netral","Setuju","Sangat Setuju"],
            datasets: [
                {
                    label: "Grafik Jawaban Mahasiswa",
                    fill: true,
                    lineTension: 0.5,
                    backgroundColor: "rgba(0, 151, 167, 0.2)",
                    borderColor: "#0097a7",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "#0097a7",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "#0097a7",
                    pointHoverBorderColor: "#eef0f2",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: [data['jwb_1'], data['jwb_2'],data['jwb_3'],data['jwb_4'],data['jwb_5'] ]



                },

            ]
        };

        var lineOpts = {
            scales: {
                yAxes: [{
                    ticks: {
                        max: 20,
                        min: 0,
                        stepSize: 10
                    }
                }]
            }
        };

        // this.respChart($("#lineChart"),'Line',lineChart, lineOpts);

        const xValues = [100,200,300,400,500,600,700,800,900,1000];

            new Chart("myChart", {
            type: "line",
            data: lineChart,
            options: lineOpts
        });
    });


</script>


@stop

