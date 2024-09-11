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
                    <h4 class="page-title">User
                        <button type="button" class="btn btn-primary mb-2  float-right btn-sm" id="tombol-tambah">
                            Tambah Data
                        </button>
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
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Akses</th>
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
                <h5 class="modal-title" id="modal-judul"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="form-tambah-edit" name="form-tambah-edit">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Name</h6>
                        <input type="text" class="form-control" name="name" id="name" required>
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
                        <h6 class="text-muted fw-400">Role</h6>
                        <select class=" form-control mb-3 custom-select" name="role" id="role" style="width: 100%; height:36px;" required>
                            <option value="">-pilih-</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dosen">Dosen</option>
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
    $(document).ready(function() {
        var table = $('#datatable1').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ route(auth()->user()->role.'_user') }}"
            , columns: [{
                    data: null
                    , sortable: false
                    , render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                , },
                {
                    data: 'name'
                    , name: 'name'
                }
                , {
                    data: 'username'
                    , name: 'username'
                }
                , {
                    data: 'username'
                    , name: 'username'
                }
                , {
                    data: 'role'
                    , name: 'role'
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
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah User"); //valuenya tambah pegawai baru
            $('#tambah-edit-modal').modal('show');
        });


        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function(form) {

                    var actionType = $('#tombol-simpan').val();
                    var simpan = $('#tombol-simpan').html('Sending..');
                    $.ajax({
                        data: $('#form-tambah-edit').serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('admin_usertambah') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json'
                        , success: function(data) { //jika berhasil
                            $('#form-tambah-edit').trigger("reset"); //form
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#datatable1').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false);
                        }
                        , error: function(data) { //jika error tampilkan error pada console

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

