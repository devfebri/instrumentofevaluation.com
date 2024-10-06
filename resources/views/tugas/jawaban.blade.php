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
                    <h4 class="page-title"><a href="javascript:history.back()" class="btn btn-primary">Kembali</a> Jawaban Tugas '{{ $tugas->nama_tugas }}'
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable1" class="table table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Deskripsi</th>
                                    <th>File Jawaban</th>
                                    <th>Link Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jawaban as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->deskripsi_jawaban}}</td>
                                    <td>
                                        @php
                                            $username = App\Models\User::find($row->user_id)->username;
                                        @endphp
                                        @if($row->file_jawaban!=null)
                                            <a href="{{ asset('storage/tugasjawaban/' . $username . '/' . $row->file_jawaban) }}" target="_blank" class="btn btn-primary btn-sm">File</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->link_jawaban!=null)
                                        <a href="{{ $row->link_jawaban }}" target="_blank" class="btn btn-primary btn-sm">Link</a>
                                        @endif
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        var table = $('#datatable1').DataTable();
    });

</script>

@stop

