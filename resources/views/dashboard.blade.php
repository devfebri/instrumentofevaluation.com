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
                    <h4 class="page-title">Profile</h4>
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
                        @elseif(auth()->user()->role=='mahasiswa'||auth()->user()->role=='dosen')

                            <div class="media m-b-30">
                                <img class="d-flex align-self-start m-5" src="{{ auth()->user()->getAvatar() }}" alt="Generic placeholder image" height="300">
                                <div class="media-body">
                                    <form action="{{ route(auth()->user()->role.'_updateprofile') }}" method="POST"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Nama</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" name="name" type="text" value="{{ $data->name }}" id="example-text-input" >
                                            </div>
                                        </div>
                                        @if(auth()->user()->role=='dosen')
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">NIP</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" name="nip" type="text" value="{{ $data->nip }}" id="example-text-input">
                                            </div>
                                        </div>
                                        @elseif(auth()->user()->role=='mahasiswa')
                                         <div class="form-group row">
                                             <label for="example-text-input" class="col-sm-4 col-form-label">NIM</label>
                                             <div class="col-sm-8">
                                                 <input class="form-control" name="nim" type="text" value="{{ $data->nim }}" id="example-text-input">
                                             </div>
                                         </div>

                                        @endif

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-8">
                                                <select name="jk" id="jk" class="form-control">
                                                    <option value="">-pilih-</option>
                                                    <option @if($data->jk=='Laki-Laki') selected @endif value="Laki-Laki">Laki-Laki</option>
                                                    <option @if($data->jk=='Perempuan') selected @endif value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Nomor HP</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="no_hp" value="{{ $data->no_hp }}" id="example-text-input" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="tmpt_lahir" value="{{ $data->tmpt_lahir }}" id="example-text-input" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="tgl_lahir" value="{{ $data->tgl_lahir }}" id="example-text-input" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <textarea rows="3" class="form-control" name="alamat" >{{ $data->alamat }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Foto Profile</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file" name="avatar" id="example-text-input">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                    </form>

                                    <style>
                                        table, th, td {
                                        border: 2px solid black;
                                        border-collapse: collapse;
                                        text-align: center;
                                        height:  30px;
                                        }
                                        a{
                                            background-color: transparent;
                                        }

                                    </style>

                                    <table width="100%">
                                        <tr>
                                            <th width="25%">Kelas</th>
                                            <th width="35%">NIM</th>
                                            <th width="40%">Nama</th>

                                        </tr>
                                        
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    


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

