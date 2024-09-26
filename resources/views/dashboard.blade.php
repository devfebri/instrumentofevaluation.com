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
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        @if(auth()->user()->role=='admin')
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid" src="{{ asset('img/d1.jpg') }}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="{{ asset('img/d2.jpg') }}" alt="Second slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        @elseif(auth()->user()->role=='mahasiswa')
                            <div class="media m-b-30">
                                <img class="d-flex align-self-start m-5" src="{{ auth()->user()->getAvatar() }}" alt="Generic placeholder image" height="400">
                                <div class="media-body">
                                    <h4 class="page-title">Profile</h4>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" value="{{ $data->name }}" id="example-text-input" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">NIM</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" value="{{ $data->nim }}" id="example-text-input" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" value="{{ $data->jk }}" id="example-text-input" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Nomor HP</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" value="{{ $data->no_hp }}" id="example-text-input" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" value="{{ $data->tmpt_lahir }}" id="example-text-input" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" value="{{ $data->tgl_lahir }}" id="example-text-input" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <textarea name="" id="" rows="3" class="form-control" readonly>{{ $data->alamat }}</textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endif
                    </div>
                </div>
            </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
    </div>
</div>
@stop
@section('javascript')
<script src="{{ asset('template/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/moment/moment.js') }}"></script>
<script src='{{ asset('template/assets/plugins/fullcalendar/js/fullcalendar.min.js') }}'></script>
<script src='{{ asset('template/assets/plugins/select2/select2.min.js') }}'></script>
<script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
@stop

