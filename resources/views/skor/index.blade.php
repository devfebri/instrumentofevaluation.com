@extends('layouts.master')


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

                    @foreach ($dataskor as $row)
                    {{-- {{ dd($row['id_mindset']) }} --}}


                    <div class="card-body" id="item-{{ $row['id_mindset'] }}">

                        <h4 class="mt-0 header-title">Mindset : {{ $row['nama_mindset'] }} <a href="{{ route(auth()->user()->role.'_export',['id'=>$row['id_mindset']]) }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-download"></i> Excel</a></h4>




                        <canvas id="chart-{{ $row['id_mindset'] }}" height="100"></canvas>

                    </div>

                    @endforeach
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

    var dataskor = <?php echo json_encode($dataskor) ?> ;


    $('#datatable1').DataTable();

    $(document).ready(function() {
        jQuery.each(dataskor, function(index, item) {


            var lineChart= {
            labels: ["Sangat Tidak Setuju", "Tidak Setuju", "Netral", "Setuju", "Sangat Setuju"]
                , datasets: [{
                        label: "Jumlah Jawaban"
                        , backgroundColor: "#5b6be8"
                        , borderColor: "#5b6be8"
                        , borderWidth: 1
                        , hoverBackgroundColor: "#5b6be8"
                        , hoverBorderColor: "#5b6be8"
                        , data: [item['skor1'], item['skor2'], item['skor3'], item['skor4'], item['skor5']]

                    },

                ]
            };

            var lineOpts = {
                scales: {
                    yAxes: [{
                        ticks: {
                            max: item['maxskor']
                            , min: 0
                            , stepSize: 10
                        }
                    }]
                }
            };

            new Chart("chart-"+item['id_mindset'], {
                type: "bar"
                , data: lineChart
                , options: lineOpts
            });

        });



    });

</script>


@stop

