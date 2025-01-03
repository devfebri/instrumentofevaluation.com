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
                        <h4 class="mt-0 header-title">Jawaban <br> Indikator : {{ $indikator->nama_indikator }}</h4>

                        <canvas id="myChart" height="100" ></canvas>
                    </div>
                </div>

            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

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
    var skor1=<?php echo json_encode($skor1) ?>;
    var skor2=<?php echo json_encode($skor2) ?>;
    var skor3=<?php echo json_encode($skor3) ?>;
    var skor4=<?php echo json_encode($skor4) ?>;
    var skor5=<?php echo json_encode($skor5) ?>;
    var maxskor=<?php echo json_encode($maxskor) ?>;
    $('#datatable1').DataTable();

    $(document).ready(function () {

        var lineChart = {
            labels: ["Sangat Tidak Setuju","Tidak Setuju","Netral","Setuju","Sangat Setuju"],
            datasets: [
                {
                    label: "Jumlah Jawaban",
                    backgroundColor: "#5b6be8",
                    borderColor: "#5b6be8",
                    borderWidth: 1,
                    hoverBackgroundColor: "#5b6be8",
                    hoverBorderColor: "#5b6be8",
                    data: [skor1, skor2,skor3,skor4,skor5 ]
                },

            ]
        };

        var lineOpts = {
            scales: {
                yAxes: [{
                    ticks: {
                        max: maxskor,
                        min: 0,
                        stepSize: 10
                    }
                }]
            }
        };

        // this.respChart($("#lineChart"),'Line',lineChart, lineOpts);

        const xValues = [100,200,300,400,500,600,700,800,900,1000];

            new Chart("myChart", {
            type: "bar",
            data: lineChart,
            options: lineOpts
        });
    });


</script>


@stop

