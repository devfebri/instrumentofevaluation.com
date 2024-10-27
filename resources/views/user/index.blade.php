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
                        User
                        <button type="button" class="btn btn-primary mb-2  ml-2 float-right btn-sm" id="tombol-tambah">
                            Tambah Mahasiswa
                        </button>
                        <button type="button" class="btn btn-primary mb-2  float-right btn-sm" id="tombol-tambahdosen">
                            Tambah Dosen
                        </button>
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 ">
                <div class="card  m-b-30">

                    <div class="card-body">
                        <h4 class=" header-title">Mahasiswa</h4>
                        <table id="datatable1" class="table table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    {{-- <th>Role</th> --}}
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Username</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
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
            <div class="col-12 ">
                <div class="card  m-b-30">

                    <div class="card-body">
                        <h4 class=" header-title">Dosen</h4>
                        <table id="datatable2" class="table table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
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

<!-- Modal -->
<div class="modal fade" id="tambah-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="form-tambah-mahasiswa-edit" name="form-tambah-mahasiswa-edit">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="role" id="role" value="mahasiswa">
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">NIM</h6>
                        <input type="text" class="form-control" name="nim" id="nim" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Name</h6>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400">Jenis Kelamin</h6>
                        <select class=" form-control mb-3 custom-select" name="jk" id="jk" style="width: 100%; height:36px;" required>
                            <option value="">-pilih-</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400">Kelas</h6>
                        <select class=" form-control mb-3 custom-select select2" name="kelas_id" id="kelas_id" style="width: 100%; height:36px;" required>
                            <option value="">-pilih-</option>
                            @foreach ($kelas as $row1)
                            <option value="{{ $row1->id }}">{{ $row1->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">No HP</h6>
                        <input type="number" class="form-control" name="no_hp" id="no_hp" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Email</h6>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Tempat Lahir</h6>
                        <input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Tanggal Lahir</h6>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
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
<div class="modal fade" id="tambahdosen-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul">Tambah Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="form-tambah-dosen-edit" name="form-tambah-dosen-edit">

                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="role" id="role" value="dosen">
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">NIP</h6>
                        <input type="number" class="form-control" name="nip" id="nip" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Name</h6>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400">Jenis Kelamin</h6>
                        <select class=" form-control mb-3 custom-select" name="jk" id="jk" style="width: 100%; height:36px;" required>
                            <option value="">-pilih-</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">No HP</h6>
                        <input type="number" class="form-control" name="no_hp" id="no_hp" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Email</h6>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Tempat Lahir</h6>
                        <input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir" required>
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Tanggal Lahir</h6>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
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

    $('#kelas_id').select2();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('#datatable1').DataTable({
            processing: true
            , serverSide: true,
            scrollX:true
            , ajax: "{{ route(auth()->user()->role.'_user') }}"
            , columns: [{
                    data: null
                    , sortable: false
                    , render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                , },
                {
                    data: 'nim'
                    , name: 'nim'
                },
                {
                    data: 'name'
                    , name: 'name'
                },{
                    data: 'kelas'
                    , name: 'kelas'
                }
                , {
                    data: 'username'
                    , name: 'username'
                }
                , {
                    data: 'tmpt_lahir'
                    , name: 'tmpt_lahir'
                }
                , {
                    data: 'tgl_lahir'
                    , name: 'tgl_lahir'
                }
                , {
                    data: 'jk'
                    , name: 'jk'
                }
                , {
                    data: 'no_hp'
                    , name: 'no_hp'
                }
                , {
                    data: 'action'
                    , name: 'action'
                }
            ]
        });
        $('#datatable2').DataTable({
            processing: true
            , serverSide: true,
            scrollX:true
            , ajax: "{{ route(auth()->user()->role.'_getDosen') }}"
            , columns: [{
                    data: null
                    , sortable: false
                    , render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                , },
                {
                    data: 'nip'
                    , name: 'nip'
                },
                {
                    data: 'name'
                    , name: 'name'
                }
                , {
                    data: 'username'
                    , name: 'username'
                }
                , {
                    data: 'tmpt_lahir'
                    , name: 'tmpt_lahir'
                }
                , {
                    data: 'tgl_lahir'
                    , name: 'tgl_lahir'
                }
                , {
                    data: 'jk'
                    , name: 'jk'
                }
                , {
                    data: 'no_hp'
                    , name: 'no_hp'
                }
                , {
                    data: 'action'
                    , name: 'action'
                }
            ]
        });

        // tombol tambah data
        $('#tombol-tambah').click(function() {
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-mahasiswa-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#tambah-edit-modal').modal('show');
        });
        $('#tombol-tambahdosen').click(function() {
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-dosen-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#tambahdosen-edit-modal').modal('show');
        });


        if ($("#form-tambah-mahasiswa-edit").length > 0) {
            $("#form-tambah-mahasiswa-edit").validate({
                submitHandler: function(form) {

                    var actionType = $('#tombol-simpan').val();
                    var simpan = $('#tombol-simpan').html('Sending..');
                    var data = new FormData(form);

                    $.ajax({
                        type: "POST", //karena simpan kita pakai method POST
                        enctype: "multipart/form-data",
                        url: "{{ route('admin_usertambah') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function (data) { //jika berhasil
                            $('#form-tambah-mahasiswa-edit').trigger("reset"); //form
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#datatable1').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false);
                            alertify.success('Berhasil membuat user');
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }
        if ($("#form-tambah-dosen-edit").length > 0) {
            $("#form-tambah-dosen-edit").validate({
                submitHandler: function(form) {

                    var actionType = $('#tombol-simpan').val();
                    var simpan = $('#tombol-simpan').html('Sending..');
                    var data = new FormData(form);

                    $.ajax({
                        type: "POST", //karena simpan kita pakai method POST
                        enctype: "multipart/form-data",
                        url: "{{ route('admin_usertambah') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function (data) { //jika berhasil
                            $('#form-tambah-dosen-edit').trigger("reset"); //form
                            $('#tambahdosen-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#datatable2').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false);
                            alertify.success('Berhasil membuat Dosen');
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

        $('body').on('click', '.delete', function(id) {
            var dataid = $(this).attr('data-id');
            var url = "{{ route(auth()->user()->role.'_userdelete', ':dataid') }}";
            urls = url.replace(':dataid', dataid);
            alertify.confirm('Seluruh data yang berkaitan di user ini akan ikut terhapus, apa anda yakin ?', function() {
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


    });

</script>

@stop

