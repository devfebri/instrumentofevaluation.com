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
                    <h4 class="page-title"> <a href="javascript:history.back()" class="btn btn-primary">Kembali</a> &nbsp; Kelas "{{ $kelas->nama_kelas }}" Matakuliah "{{ $matakuliah->nama_mk }}"
                        @if(auth()->user()->role=='dosen')
                        <button type="button" class="btn btn-primary ml-2  float-right btn-sm" id="tombol-tambahmateri">
                            Tambah Materi
                        </button>
                        <button type="button" class="btn btn-primary ml-2  float-right btn-sm" id="tombol-tambahtugas">
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
                        <table id="datatable0" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Materi</th>
                                    <th>Deskripsi</th>
                                    <th>File</th>
                                    <th>Link</th>
                                     @if(auth()->user()->role=='dosen')
                                    <th>Aksi</th>
                                    @endif
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
                        <table id="datatable1" class="table table-bordered" style="width:100%">
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

<!-- Modal materi-->
<div class="modal fade" id="tambahmateri-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judulmateri"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="form-materi-tambah-edit" name="form-materi-tambah-edit">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="kelas_id" id="kelas_id" value="{{ $matakuliah->kelas_id }}">
                    <input type="hidden" name="matakuliah_id" id="matakuliah_id" value="{{ $id }}">
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Nama Materi</h6>
                        <input type="text" class="form-control" name="nama_materi" id="nama_materi" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Deskripsi</h6>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" maxlength="225" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">File</h6>
                        <input type="file" class="form-control" name="file_materi" id="file_materi">
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Link Materi</h6>
                        <textarea id="link_materi" name="link_materi" class="form-control" maxlength="225" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="tombol-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal tugas-->
<div class="modal fade" id="tambahtugas-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judultugas"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="form-tugas-tambah-edit" name="form-tugas-tambah-edit">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_tugas">
                     <input type="hidden" name="kelas_id" id="kelas_id" value="{{ $matakuliah->kelas_id }}">
                     <input type="hidden" name="matakuliah_id" id="matakuliah_id" value="{{ $id }}">


                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Nama Tugas</h6>
                        <input type="text" class="form-control" name="nama_tugas" id="nama_tugas" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Deskripsi</h6>
                        <textarea id="deskripsi_tugas" name="deskripsi" class="form-control" maxlength="225" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">File</h6>
                        <input type="file" class="form-control" name="file_tugas" id="file_tugas">
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Link Tugas</h6>
                        <textarea id="link_tugas" name="link_tugas" class="form-control" maxlength="225" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="tombol-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal input tugas-->
<div class="modal fade" id="tambah-inputtugas-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judultugas">Kirim Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="form-inputtugas-tambah-edit" name="form-tugas-tambah-edit">
                <div class="modal-body">
                    <input type="hidden" name="tugas_id" id="tugas_id">
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Deskripsi</h6>
                        <textarea id="deskripsi_jawaban" name="deskripsi_jawaban" class="form-control" maxlength="225" rows="3" required></textarea>

                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">File</h6>
                        <input type="file" class="form-control"  name="file_jawaban" id="file_jawaban" >
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Link Tugas</h6>
                        <textarea id="link_tugas" name="link_jawaban" class="form-control" maxlength="225" rows="3" ></textarea>
                    </div>
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
    $('#mahasiswa').select2();

    $('#datatable0').DataTable({
        processing: true
        , serverSide: true
        , ajax: "{{ route(auth()->user()->role.'_kelasopen',$id) }}"
        , columns: [{
                data: null
                , sortable: false
                , render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1
                }
            , }
            , {
                data: 'nama_materi'
                , name: 'nama_materi'
            }
            , {
                data: 'deskripsi'
                , name: 'deskripsi'
            }
            , {
                data: 'file_materi'
                , name: 'file_materi'
            }
            , {
                data: 'link_materi'
                , name: 'link_materi'
            }
            @if(auth()->user()->role=='dosen')
            , {
                data: 'action'
                , name: 'action'
            }
            @endif
        ]
    });
    $('#datatable1').DataTable({
        processing: true
        , serverSide: true
        , ajax: "{{ route(auth()->user()->role.'_getTugas',$id) }}"
        , columns: [{
                data: null
                , sortable: false
                , render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1
                }
            , }
            , {
                data: 'nama_tugas'
                , name: 'nama_tugas'
            }
            , {
                data: 'deskripsi'
                , name: 'deskripsi'
            }
            , {
                data: 'file_tugas'
                , name: 'file_tugas'
            }
            , {
                data: 'link_tugas'
                , name: 'link_tugas'
            }
            , {
                data: 'action'
                , name: 'action'
            }
        ]
    });

    // $('#datatable3').DataTable();
    $(document).ready(function() {
        $('#tombol-tambahtugas').click(function() {
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tugas-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judultugas').html("Tambah Tugas"); //valuenya tambah pegawai baru
            $('#tambahtugas-edit-modal').modal('show');
        });

        @if (auth()->user()->role=='dosen')
        if ($("#form-tugas-tambah-edit").length > 0) {
            $("#form-tugas-tambah-edit").validate({
                submitHandler: function(form) {
                    var actionType = $('#tombol-simpan').val();
                    var simpan = $('#tombol-simpan').html('Sending..');
                    var data = new FormData(form);

                    $.ajax({
                        type: "POST", //karena simpan kita pakai method POST
                        enctype: "multipart/form-data"
                        , url: "{{ route(auth()->user()->role.'_tambahtugas') }}"
                        , data: data
                        , processData: false
                        , contentType: false
                        , cache: false
                        , timeout: 600000
                        , success: function(data) { //jika berhasil
                            $('#form-tugsa-tambah-edit').trigger("reset"); //form
                            $('#tambahtugas-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#datatable1').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false);
                            alertify.success('Berhasil membuat Tugas');
                        }
                        , error: function(data) { //jika error tampilkan error pada console
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }
        $('body').on('click', '.deletetugas', function(id) {
            var dataid = $(this).attr('data-id');
            var url = "{{ route(auth()->user()->role.'_deletetugas', ':dataid') }}";
            urls = url.replace(':dataid', dataid);
            alertify.confirm('Apa anda yakin ingin menghapus data ini ?', function() {
                $.ajax({
                    url: urls, //eksekusi ajax ke url ini
                    type: 'delete'
                    , success: function(data) { //jika sukses
                        setTimeout(function() {
                            var oTable = $('#datatable1').dataTable();
                            oTable.fnDraw(false); //reset datatable
                            $('#tombol-hapus').text('Yakin');
                        });
                    }
                })
                alertify.success('Data berhasil dihapus')
            }, function() {
                alertify.error('Cancel')
            });
        });
        $('body').on('click', '.edittugas-post', function () {
             var data_id = $(this).data('id');
             var url = "{{ route(auth()->user()->role.'_tugasedit',':data_id') }}";
             url = url.replace(':data_id', data_id);

            $.get(url, function (data) {
                // alert('ok');
                $('#modal-judultugas').html("Edit Tugas");
                $('#tombol-simpan').val("edit-post");
                $('#tambahtugas-edit-modal').modal('show');
                $('#id_tugas').val(data.id);
                $('#nama_tugas').val(data.nama_tugas);
                $('#deskripsi_tugas').val(data.deskripsi);


                $('#link_tugas').val(data.link_tugas);
                $('#file_tugas').prop('disabled',true);
            })
        });
        @endif



        $('#tombol-tambahmateri').click(function() {
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-materi-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judulmateri').html("Tambah Materi"); //valuenya tambah pegawai baru
            $('#tambahmateri-edit-modal').modal('show');
        });

        @if(auth()->user()->role=='dosen')
        if ($("#form-materi-tambah-edit").length > 0) {
            $("#form-materi-tambah-edit").validate({
                submitHandler: function(form) {
                    var actionType = $('#tombol-simpan').val();
                    var simpan = $('#tombol-simpan').html('Sending..');
                    var data = new FormData(form);

                    $.ajax({
                        type: "POST", //karena simpan kita pakai method POST
                        enctype: "multipart/form-data"
                        , url: "{{ route(auth()->user()->role.'_tambahmateri') }}"
                        , data: data
                        , processData: false
                        , contentType: false
                        , cache: false
                        , timeout: 600000
                        , success: function(data) { //jika berhasil
                            $('#form-materi-tambah-edit').trigger("reset"); //form
                            $('#tambahmateri-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#datatable0').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false);
                            alertify.success('Berhasil membuat Materi');
                        }
                        , error: function(data) { //jika error tampilkan error pada console
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }
        $('body').on('click', '.deletemateri', function(id) {
            var dataid = $(this).attr('data-id');
            var url = "{{ route(auth()->user()->role.'_deletemateri', ':dataid') }}";
            urls = url.replace(':dataid', dataid);
            alertify.confirm('Apa anda yakin ingin menghapus data ini ?', function() {
                $.ajax({
                    url: urls, //eksekusi ajax ke url ini
                    type: 'delete'
                    , success: function(data) { //jika sukses
                        setTimeout(function() {
                            var oTable = $('#datatable0').dataTable();
                            oTable.fnDraw(false); //reset datatable
                            $('#tombol-hapus').text('Yakin');
                        });
                    }
                })
                alertify.success('Data berhasil dihapus')
            }, function() {
                alertify.error('Cancel')
            });
        });

         $('body').on('click', '.editmateri-post', function () {
             var data_id = $(this).data('id');
             var url = "{{ route(auth()->user()->role.'_materiedit',':data_id') }}";
             url = url.replace(':data_id', data_id);

            $.get(url, function (data) {
                // alert('ok');
                $('#modal-judulmateri').html("Edit Materi"); //valuenya tambah pegawai baru

                $('#tombol-simpan').val("edit-post");
                $('#tambahmateri-edit-modal').modal('show');

                $('#id').val(data.id);
                $('#nama_materi').val(data.nama_materi);
                $('#deskripsi').val(data.deskripsi);
                $('#link_materi').val(data.link_materi);
                $('#file_materi').prop('disabled',true);


            })
        });
        @endif


        @if(auth()->user()->role=='mahasiswa')
        $('body').on('click', '.inputtugas', function(id) {
            var dataid = $(this).attr('data-id');
            // alert(dataid);

            $('#form-inputtugas-tambah-edit').trigger("reset");
            $('#tambah-inputtugas-edit-modal').modal('show');
            $('#tugas_id').val(dataid);
            if ($("#form-tugas-tambah-edit").length > 0) {


            $("#form-inputtugas-tambah-edit").validate({
                submitHandler: function(form) {
                    var actionType = $('#tombol-simpan').val();
                    var simpan = $('#tombol-simpan').html('Sending..');
                    var data = new FormData(form);

                    $.ajax({
                        type: "POST", //karena simpan kita pakai method POST
                        enctype: "multipart/form-data"
                        , url: "{{ route(auth()->user()->role.'_kirimtugas') }}"
                        , data: data
                        , processData: false
                        , contentType: false
                        , cache: false
                        , timeout: 600000
                        , success: function(data) { //jika berhasil
                            $('#form-inputtugas-tambah-edit').trigger("reset"); //form
                            $('#tambah-inputtugas-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#datatable1').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false);
                            alertify.success('Tugas Berhasil Terkirim');
                        }
                        , error: function(data) { //jika error tampilkan error pada console
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

        });
        @endif





    });

</script>

@stop

