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
                    <h4 class="page-title">Kelas  Matakuliah
                        @if(auth()->user()->role!='mahasiswa')
                        <button type="button" class="btn btn-primary ml-2  float-right btn-sm" id="tombol-tambahmatakuliah">
                            Tambah Matakuliah
                        </button>
                        <button type="button" class="btn btn-primary ml-2  float-right btn-sm" id="tombol-tambahmatakuliah">
                            Tambah Tugas
                        </button>
                        @endif
                    </h4>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Materi </h4>
                        <table id="datatable2" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Materi</th>
                                    <th>Deskripsi</th>
                                    <th>File</th>
                                    <th>Link</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Tugas </h4>
                        <table id="datatable3" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tugas</th>
                                    <th>Deskripsi</th>
                                    <th>File</th>
                                    <th>Link</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

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



</script>

@stop

