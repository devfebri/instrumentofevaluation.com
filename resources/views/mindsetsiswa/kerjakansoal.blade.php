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
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Kerjakan Soal Mindset </h4>

                        <table id="datatable1" class="table table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Soal</th>
                                    <th style="width: 35%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($soal as $key=>$row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->soal }}</td>
                                    <td>
                                       <div class="form-group row">
                                           <div class="col-md-9">
                                               <div class="form-check-inline my-1">
                                                   <div class="custom-control custom-radio">
                                                       <input type="radio" id="pilihan1" name="customRadio" class="custom-control-input">
                                                       <label class="custom-control-label" for="pilihan1">1</label>
                                                   </div>
                                               </div>
                                               <div class="form-check-inline my-1">
                                                   <div class="custom-control custom-radio">
                                                       <input type="radio" id="pilihan2" name="customRadio" class="custom-control-input">
                                                       <label class="custom-control-label" for="pilihan2">2</label>
                                                   </div>
                                               </div>
                                               <div class="form-check-inline my-1">
                                                   <div class="custom-control custom-radio">
                                                       <input type="radio" id="pilihan3" name="customRadio" class="custom-control-input">
                                                       <label class="custom-control-label" for="pilihan3">3</label>
                                                   </div>
                                               </div>
                                               <div class="form-check-inline my-1">
                                                   <div class="custom-control custom-radio">
                                                       <input type="radio" id="pilihan4" name="customRadio" class="custom-control-input">
                                                       <label class="custom-control-label" for="pilihan4">4</label>
                                                   </div>
                                               </div>
                                               <div class="form-check-inline my-1">
                                                   <div class="custom-control custom-radio">
                                                       <input type="radio" id="pilihan5" name="customRadio" class="custom-control-input">
                                                       <label class="custom-control-label" for="pilihan5">5</label>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>


                                    </td>
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
<script src="{{ asset('template/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src='{{ asset('template/assets/plugins/select2/select2.min.js') }}'></script>
<script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var table = $('#datatable1').DataTable();
    });

</script>

@stop

