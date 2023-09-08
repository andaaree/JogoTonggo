<!DOCTYPE html>
@extends('admin.body')
@section('title', 'Role - Admin JogoTonggo')
@section('ext-css')
<!-- Select2 -->
<link rel="stylesheet" href="/assets/adminlte/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
@section('container')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="display-4">Daftar Role</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Role</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <button data-target="#modal-add" data-toggle="modal" class="btn btn-dark">Tambah Role</button>
                    </div>
                    <div class="card-body">
                        <table id="tb-role" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $key => $r)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $r->name }}</td>
                                    <td>'<button data-id="{{ $r->id }}" type="button" class="edit-role btn btn-success"><i class="fas fa-edit"></i></button> <button data-id="{{ $r->id }}" type="button" class="d-inline del-role btn btn-danger"><i class="fas fa-trash"></i></button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade show" aria-modal="true" id="modal-add" aria-hidden="false" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form id="fdata" action="{{ route('role.store') }}" method="POST">
                    <div class="modal-header">
                        <h1>Tambah Role</h1>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            @csrf
                            <label for="role_name">Nama Role</label>
                            <input type="text" name="role_name" id="role_name" class="form-control @error('role_name'){{'is-invalid'}}@enderror" value="{{old('role_name')}}">
                            @error('role_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" id="save-role" class="btn btn-secondary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('ext-script')
<!-- bs-custom-file-input -->

<script src="/assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="/assets/adminlte/plugins/select2/js/select2.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="/assets/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/assets/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="/assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Page specific script -->
<script>
    $(document).ready(function() {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        bsCustomFileInput.init();
        var roles = @json($roles);
        console.log(roles);
        var table = $('#tb-role').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            // "processing": true,
            // "serverSide": true,
            // "columns": [{
            //         data: roles.id,
            //         name: roles.id,
            //         orderable: false,
            //         searchable: false
            //     },
            //     {
            //         data: roles.name,
            //         name: roles.name
            //     },
            //     {
            //         data: roles.id,
            //         render: function (data) {
            //             return '<button data-id="'+data+'" type="button" class="edit-role btn btn-success"><i class="fas fa-edit"></i></button> <button data-id="'+data+'" type="button" class="d-inline del-role btn btn-danger"><i class="fas fa-trash"></i></button>';
            //         },
            //         searchable:false
            //     }
            // ],
            // "ajax": "/role/all"
        });

        $('#tb-role tbody').on('click','.edit-role',function(e){
            e.preventDefault;
            var id = $(this).attr('data-id');
            window.location.href = "role/"+id+"/edit";
        });
        $('#tb-role tbody').on('click','.del-role',function(e){
            e.preventDefault;
            var id = $(this).attr('data-id');
            Swal.fire({
                title: 'Yakin hapus?',
                text: "Anda tidak bisa kembalikan data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:"delete",
                        url:"/admin/role/"+id,
                        data:{
                            _token: "{{ csrf_token() }}",
                        },
                        success:function(data){
                            Swal.fire({
                                icon: data.status,
                                title: "Berhasil",
                                text: data.message,
                                timer: 1200
                            });
                            table.draw();
                        },error:function(data){
                            var js = data.responseJSON;
                            Swal.fire({
                                icon: 'error',
                                title: js.exception,
                                text: js.message,
                                timer: 1200
                            });
                        }
                    });
                }
            });
        });

    });
</script>
@include('admin.validator')
@endsection
