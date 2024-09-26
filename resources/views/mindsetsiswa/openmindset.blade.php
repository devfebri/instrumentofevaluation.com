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
                        <h4 class="mt-0 header-title">Indikator<br> Mindset : {{ $mindset->nama_mindset }} </h4>

                        <table id="datatable1" class="table table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Indikator</th>
                                    <th>Jumlah Soal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
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
<script src="{{ asset('template/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src='{{ asset('template/assets/plugins/select2/select2.min.js') }}'></script>
<script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var table = $('#datatable1').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ route(auth()->user()->role.'_siswaopenmindset',$id) }}"
            , columns: [{
                    data: null
                    , sortable: false
                    , render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                , }
                , {
                    data: 'nama_indikator'
                    , name: 'nama_indikator'
                }
                , {
                    data: 'jml_soal'
                    , name: 'jml_soal'
                }
                , {
                    data: 'action'
                    , name: 'action'
                }
            ]
        });

        

    });

</script>

@stop

