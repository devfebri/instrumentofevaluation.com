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
                                    <th>Jumlah Pertanyaan</th>
                                    <th>Nilai</th>
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

<div class="modal fade" id="tambah-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul">Kerjakan Mindset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="form-tambah-edit" name="form-tambah-edit">
                <div class="modal-body" style="display: none" id="form">




                </div>
                <div class="modal-body" style="display: none" id="hasil">

                    <img src="{{ asset('img/4.png') }}" width="300px" height="200px" id="my_image" class="rounded mx-auto d-block" alt="">
                    <h3 class="text-center" id="skor">Skor Anda : </h3>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="tombol-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
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

    $('body').on('click', '.mulai', function(id) {
         $('#form').show();
         $('#hasil').hide();

        var dataid = $(this).attr('data-id');
        var url = "{{ route(auth()->user()->role.'_getSoal', ':dataid') }}";
        urls = url.replace(':dataid', dataid);
        var soal='';
        var key=1;

        alertify.confirm('Pengerjaan mindset hanya bisa 1 kali pengerjaan saja, apakah anda yakin ingin mengerjakan pertanyaan ini ?', function(){

            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#tambah-edit-modal').modal('show');
            $('#form').html('');
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: urls,
                dataType: 'json',
                success: function (data) {
                    $('#modal-judul').html('Mengerjakan Mindset Pada Indikator "'+data['indikator']['nama_indikator']+'"')
                    $.each(data['soal'], function(index, item) {
                        // console.log(item);
                        // console.log(index);

                        soal+=`<div class="form-group mb-1">
                            <label for="formGroupExampleInput2"><b>`+key+`. `+item['soal']+` ?</b> </label>
                            <input type="hidden" name="indikator_id" value="`+data['indikator']['id']+`">
                            <input type="hidden" name="mindset_id" value="`+data['mindset']['id']+`">
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jawaban[`+key+`]" id="inlineRadio1`+key+`" value="1#`+item['id']+`">
                                <label class="form-check-label" for="inlineRadio1`+key+`">Sangat Tidak Setuju</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jawaban[`+key+`]" id="inlineRadio2`+key+`" value="2#`+item['id']+`">
                                <label class="form-check-label" for="inlineRadio2`+key+`">Tidak Setuju</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jawaban[`+key+`]" id="inlineRadio3`+key+`" value="3#`+item['id']+`">
                                <label class="form-check-label" for="inlineRadio3`+key+`">Netral </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jawaban[`+key+`]" id="inlineRadio4`+key+`" value="4#`+item['id']+`">
                                <label class="form-check-label" for="inlineRadio4`+key+`">Setuju </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jawaban[`+key+`]" id="inlineRadio5`+key+`" value="5#`+item['id']+`">
                                <label class="form-check-label" for="inlineRadio5`+key+`">Sangat Setuju </label>
                            </div>
                        </div>
                        <br>`;
                        ++key;


                    });
                    $('#form').append(soal);
                },error:function(data){
                    console.log(data);
                }
            });
         });

        // alert('ok');

    });

    if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function(form) {
                    var actionType = $('#tombol-simpan').val();
                    var simpan = $('#tombol-simpan').html('Sending..');
                    var data = new FormData(form);

                    $.ajax({
                        type: "POST", //karena simpan kita pakai method POST
                        enctype: "multipart/form-data",
                        url: "{{ route(auth()->user()->role.'_siswakirimtugas') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function (row) { //jika berhasil
                            console.log(row);
                            $('#form-tambah-edit').trigger("reset"); //form
                            $('#hasil').hide();
                            $('#hasil').show();
                            if(row>=60){
                                $('#skor').html("Skor Anda : "+row);
                                $("#my_image").attr("src","{{ asset('img/4.png') }}");
                            }else if(row>=0){
                                $('#skor').html("Skor Anda : "+row);

                                $("#my_image").attr("src","{{ asset('img/1.png') }}");
                            }else{
                                $('#skor').html("Ada yang belum di isi nih, Periksa kembali ya!");

                                 $("#my_image").attr("src","{{ asset('img/2.png') }}");
                            }

                            // $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            $('#tombol-simpan').attr('disabled','true');

                            var oTable = $('#datatable1').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false);
                            alertify.success('Berhasil Mengerjakan Pertanyaan');
                        },
                        error: function (row) { //jika error tampilkan error pada console
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

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
                }, {
                    data: 'nilai'
                    , name: 'nilai'
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

