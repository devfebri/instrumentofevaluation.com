@extends('front.master')
@section('contentfront')

<!-- Service Start -->
{{-- <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <h5 class="mb-3">Skilled Instructors</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                        <h5 class="mb-3">Online Classes</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-home text-primary mb-4"></i>
                        <h5 class="mb-3">Home Projects</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                        <h5 class="mb-3">Book Library</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Service End -->

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Apa Pola Pikir Saya ?</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('welcome') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Apa Pola Pikir Saya ?</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">

            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-center text-primary pe-3"> Test Pola Pikir </h6>
                <h1 class="mb-4">Apa Pola Pikir Saya?</h1>
                <button class="btn btn-primary" id="btn-modal">Mulai Test</button>

            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop='static'>


    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apa Pola Pikir Saya ?</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <form class="needs-validation" id="form-tambah-edit" name="form-tambah-edit">
            <div class="modal-body" style="display: none" id="form">

                    @foreach ($data as $key=>$row)
                        @php
                            $number=1;
                        @endphp
                        <div class="form-group mb-1">
                            <label for="formGroupExampleInput2"><b>{{ ++$key }}. {{ $row->soal }}</b> </label>

                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jawaban[{{ $key }}]" id="inlineRadio1{{ $key }}" value="1" >
                                <label class="form-check-label" for="inlineRadio1{{ $key }}">Sangat Tidak Setuju</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jawaban[{{ $key }}]" id="inlineRadio2{{ $key }}" value="2" >
                                <label class="form-check-label" for="inlineRadio2{{ $key }}">Tidak Setuju</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jawaban[{{ $key }}]" id="inlineRadio3{{ $key }}" value="3" >
                                <label class="form-check-label" for="inlineRadio3{{ $key }}">Netral </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jawaban[{{ $key }}]" id="inlineRadio4{{ $key }}" value="4" >
                                <label class="form-check-label" for="inlineRadio4{{ $key }}">Setuju </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jawaban[{{ $key }}]" id="inlineRadio5{{ $key }}" value="5" >
                                <label class="form-check-label" for="inlineRadio5{{ $key }}">Sangat Setuju </label>
                            </div>
                        </div>
                        <br>
                        @php
                            ++$number
                        @endphp
                    @endforeach


            </div>
            <div class="modal-body" style="display: none" id="hasil">

                <h1 id="skor">Skor Anda :  </h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-modal-close">Close</button>
                <button type="submit" id="btnsimpan" class="btn btn-primary">Simpan</button>
            </div>
             </form>

        </div>
    </div>
</div>


@endsection

@section('script')

<script src="{{ asset('template/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('template/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>


<script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
        $('#btn-modal').on('click',function(){
            // alert('ok');
            $('#form').show();
            $('#hasil').hide();


            $('#exampleModal').modal('show');


        });
        $('#btn-modal-close').on('click',function(){
            $('#exampleModal').modal('hide');
        });

        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function(form) {
                    var actionType = $('#tombol-simpan').val();
                    var simpan = $('#tombol-simpan').html('Sending..');
                    $.ajax({
                        data: $('#form-tambah-edit').serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('simpanjawaban') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json'
                        , success: function(data) { //jika berhasil
                            // alert(data);
                            // $('#form-tambah-edit').trigger("reset"); //form
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            if(data=='error'){
                                alert('Silahkan isi seluruh soal terlebih dahulu');
                            }else{
                                // alert(data);
                                $('#form').hide();
                                $('#hasil').show();
                                $('#skor').html("Skor Anda : "+data);
                                $('#btnsimpan').attr('disabled',true);

                            }
                        }
                        , error: function(data) { //jika error tampilkan error pada console
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

    });
</script>
@endsection

