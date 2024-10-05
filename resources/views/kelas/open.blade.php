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
                    <h4 class="page-title"> <a href="javascript:history.back()" class="btn btn-primary">Kembali</a> &nbsp;Kelas {{ $data->nama_kelas }}

                        @if (auth()->user()->role=='admin')

                        <button type="button" class="btn btn-primary ml-2 float-right btn-sm" id="tombol-tambahmahasiswa">
                            Tambah Mahasiswa
                        </button>

                        <button type="button" class="btn btn-primary ml-2 float-right btn-sm" id="tombol-tambahmatakuliah">
                            Tambah Matakuliah
                        </button>
                        @endif

                        {{-- <button type="button" class="btn btn-primary ml-2  float-right btn-sm" id="tombol-tambahmateri">
                            Tambah Materi
                        </button> --}}

                    </h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">

                    <div class="card-body">
                        <h4 class="mt-0 header-title">Matakuliah</h4>
                        <table id="datatablemk" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Matakuliah</th>
                                    <th>Nama Dosen</th>
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
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Mahasiswa</h4>
                        <table id="datatable1" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
                                    @if (auth()->user()->role=='admin')

                                    <th>Aksi</th>
                                    @endif
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

<!-- Modal matakuliah-->
<div class="modal fade" id="tambahmatakuliah-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="form-matakuliah-tambah-edit" name="form-matakuliah-tambah-edit">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Nama Matakuliah</h6>
                        <input type="text" class="form-control" name="nama_mk" id="nama_mk" required>
                        <input type="hidden" class="form-control" name="kelas_id" id="kelas_id" value="{{ $id }}" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Nama Dosen</h6>
                        <select name="dosen_id" id="dosen_id" class="form-control select2"  style="width: 100%">
                            <option value="">-Pilih-</option>
                            @foreach($dosen as $row1)
                            <option value="{{ $row1->id }}">{{ $row1->nip }}-{{ $row1->name }}</option>
                            @endforeach
                        </select>
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
<!-- Modal materi-->
<div class="modal fade" id="tambahmateri-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="form-materi-tambah-edit" name="form-materi-tambah-edit">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Nama Materi</h6>
                        <input type="text" class="form-control" name="nama_materi" id="nama_materi" required>
                        <input type="hidden" class="form-control" name="kelas_id" id="kelas_id" value="{{ $id }}" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Deskripsi</h6>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" maxlength="225" rows="3" ></textarea>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">File</h6>
                        <input type="file" class="form-control" name="file_materi" id="file_materi" >
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

<!-- Modal mahasiswa-->
<div class="modal fade" id="tambahmahasiswa-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul"> Tambah Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="form-mahasiswa-tambah-edit" name="form-mahasiswa-tambah-edit">
                <div class="modal-body">
                   <div class="form-group">
                       <h6 class="text-muted fw-400 mt-3">Nama Mahasiswa</h6>
                       <input type="hidden" name="kelas_id" value="{{ $id }}">
                       <select name="mahasiswa[]" id="mahasiswa" class="form-control select2" multiple style="width: 100%">
                            <option value="">-Pilih-</option>
                            @foreach($mahasiswa as $key => $row)
                            <option value="{{ $row->id }}">{{ $row->nama_kelas }} - {{ $row->name }}</option>
                            @endforeach
                       </select>
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

    $('#datatablemk').DataTable({
        processing: true
        , serverSide: true
        , ajax: "{{ route(auth()->user()->role.'_getMatakuliah',$id) }}"
        , columns: [{
                data: null
                , sortable: false
                , render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1
                }
            , }
            , {
                data: 'nama_mk'
                , name: 'nama_mk'
            }
            , {
                data: 'nama_dosen'
                , name: 'nama_dosen'
            }

            , {
                data: 'action'
                , name: 'action'
            }
        ]
    });
    $('#datatable1').DataTable({
        processing: true
        , serverSide: true
        , ajax: "{{ route(auth()->user()->role.'_getMahasiswa',$id) }}"
        , columns: [{
                data: null
                , sortable: false
                , render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1
                }
            , }
            , {
                data: 'name'
                , name: 'name'
            }
            , {
                data: 'jk'
                , name: 'jk'
            }
            , {
                data: 'no_hp'
                , name: 'no_hp'
            }
            @if (auth()->user()->role=='admin')

            , {
                data: 'action'
                , name: 'action'
            }
            @endif
        ]
    });
    // $('#datatable2').DataTable({
    //     processing: true
    //     , serverSide: true
    //     , ajax:"{{ route(auth()->user()->role.'_kelasopen',$id) }}"
    //     , columns: [{
    //             data: null
    //             , sortable: false
    //             , render: function(data, type, row, meta) {
    //                 return meta.row + meta.settings._iDisplayStart + 1
    //             }
    //         , }
    //         , {
    //             data: 'nama_materi'
    //             , name: 'nama_materi'
    //         }
    //         , {
    //             data: 'deskripsi'
    //             , name: 'deskripsi'
    //         }
    //         , {
    //             data: 'file_materi'
    //             , name: 'file_materi'
    //         }
    //         , {
    //             data: 'link_materi'
    //             , name: 'link_materi'
    //         }
    //         , {
    //             data: 'action'
    //             , name: 'action'
    //         }
    //     ]
    // });

    // $('#datatable3').DataTable();
    $(document).ready(function(){
         $('#tombol-tambahmateri').click(function() {
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-materi-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Materi"); //valuenya tambah pegawai baru
            $('#tambahmateri-edit-modal').modal('show');
        });
         $('#tombol-tambahmahasiswa').click(function() {
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-mahasiswa-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Mahasiswa"); //valuenya tambah pegawai baru
            $('#tambahmahasiswa-edit-modal').modal('show');
        });
         $('#tombol-tambahmatakuliah').click(function() {
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-matakuliah-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Matakuliah"); //valuenya tambah pegawai baru
            $('#tambahmatakuliah-edit-modal').modal('show');
        });

        @if(auth()->user()->role=='dosen')
        if ($("#form-matakuliah-tambah-edit").length > 0) {
            $("#form-matakuliah-tambah-edit").validate({
                submitHandler: function(form) {
                    var actionType = $('#tombol-simpan').val();
                    var simpan = $('#tombol-simpan').html('Sending..');
                    var data = new FormData(form);

                    $.ajax({
                        type: "POST", //karena simpan kita pakai method POST
                        enctype: "multipart/form-data",
                        url: "{{ route(auth()->user()->role.'_tambahmatakuliah') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function (data) { //jika berhasil
                            $('#form-matakuliah-tambah-edit').trigger("reset"); //form
                            $('#tambahmatakuliah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#datatablemk').dataTable(); //inialisasi datatable

                            oTable.fnDraw(false);
                            alertify.success('Berhasil membuat matakuliah');
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }
        if ($("#form-materi-tambah-edit").length > 0) {
            $("#form-materi-tambah-edit").validate({
                submitHandler: function(form) {
                    var actionType = $('#tombol-simpan').val();
                    var simpan = $('#tombol-simpan').html('Sending..');
                    var data = new FormData(form);

                    $.ajax({
                        type: "POST", //karena simpan kita pakai method POST
                        enctype: "multipart/form-data",
                        url: "{{ route(auth()->user()->role.'_tambahmateri') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function (data) { //jika berhasil
                            $('#form-materi-tambah-edit').trigger("reset"); //form
                            $('#tambahmateri-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#datatable1').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false);
                            alertify.success('Berhasil membuat Materi');
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }
        // $('body').on('click', '.deletemateri', function(id) {
        //     var dataid = $(this).attr('data-id');
        //     var url = "{{ route(auth()->user()->role.'_deletemateri', ':dataid') }}";
        //     urls = url.replace(':dataid', dataid);
        //     alertify.confirm('Apa anda yakin ingin menghapus data ini ?', function() {
        //         $.ajax({
        //             url: urls, //eksekusi ajax ke url ini
        //             type: 'delete'
        //             , success: function(data) { //jika sukses
        //                 setTimeout(function() {
        //                     var oTable = $('#datatable2').dataTable();
        //                     oTable.fnDraw(false); //reset datatable
        //                     $('#tombol-hapus').text('Yakin');
        //                 });
        //             }
        //         })
        //         alertify.success('Data berhasil dihapus')
        //     }, function() {
        //         alertify.error('Cancel')
        //     });
        // });
        @endif
        @if(auth()->user()->role=='dosen')
            if ($("#form-mahasiswa-tambah-edit").length > 0) {
                $("#form-mahasiswa-tambah-edit").validate({
                    submitHandler: function(form) {
                        var actionType = $('#tombol-simpan').val();
                        var simpan = $('#tombol-simpan').html('Sending..');
                        var data = new FormData(form);
                        $.ajax({
                            type: "POST", //karena simpan kita pakai method POST
                            enctype: "multipart/form-data",
                            url: "{{ route(auth()->user()->role.'_tambahmahasiswa') }}",
                            data: data,
                            processData: false,
                            contentType: false,
                            cache: false,
                            timeout: 600000,
                            success: function (data) { //jika berhasil
                                $('#form-mahasiswa-tambah-edit').trigger("reset"); //form
                                $('#tambahmahasiswa-edit-modal').modal('hide'); //modal hide
                                $('#tombol-simpan').html('Simpan'); //tombol simpan
                                var oTable = $('#datatable1').dataTable(); //inialisasi datatable

                                oTable.fnDraw(false);
                                alertify.success('Berhasil Menambah Mahasiswa');
                            },
                            error: function (data) { //jika error tampilkan error pada console
                                $('#tombol-simpan').html('Simpan');
                            }
                        });
                    }
                })
            }
            $('body').on('click', '.deletemahasiswa', function(id) {
                var dataid = $(this).attr('data-id');
                var url = "{{ route(auth()->user()->role.'_deletemahasiswa', ':dataid') }}";
                urls = url.replace(':dataid', dataid);
                alertify.confirm('Apa anda yakin ingin menghapus mahasiswa ini dikelas ?', function() {
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
                    alertify.success('Kelas berhasil dihapus')
                }, function() {
                    alertify.error('Cancel')
                });
            });
            $('body').on('click', '.deletematakuliah', function(id) {
                var dataid = $(this).attr('data-id');
                var url = "{{ route(auth()->user()->role.'_deletematakuliah', ':dataid') }}";
                urls = url.replace(':dataid', dataid);
                alertify.confirm('Apa anda yakin ingin menghapus data ini ?', function() {
                    $.ajax({
                        url: urls, //eksekusi ajax ke url ini
                        type: 'delete'
                        , success: function(data) { //jika sukses
                            setTimeout(function() {
                                var oTable = $('#datatablemk').dataTable();

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
        @endif








    });
</script>

@stop

