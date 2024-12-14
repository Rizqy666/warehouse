@extends('layouts.master')
@section('title', 'Tambah User Baru')
@section('breadcrumb')
    <li class="breadcrumb-item active">Tambah User Baru</li>
@endsection
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#editModal{{ $item->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('users.destroy', $item->id) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                                value="{{ old('password_confirmation') }}">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                <option value="">Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($users as $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('users.update', $item->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name-{{ $item->id }}">Name</label>
                                <input type="text" class="form-control" id="name-{{ $item->id }}" name="name"
                                    value="{{ $item->name }}" autocomplete="name">
                            </div>

                            <div class="form-group">
                                <label for="email-{{ $item->id }}">Email</label>
                                <input type="email" class="form-control" id="email-{{ $item->id }}"
                                    name="email" value="{{ $item->email }}" autocomplete="email">
                            </div>

                            <div class="form-group">
                                <label for="password-{{ $item->id }}">Password</label>
                                <input type="password" class="form-control" id="password-{{ $item->id }}"
                                    name="password" autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="password-confirm-{{ $item->id }}">Confirm Password</label>
                                <input type="password" class="form-control" id="password-confirm-{{ $item->id }}"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="role-{{ $item->id }}">Role</label>
                                <select class="form-control" id="role-{{ $item->id }}" name="role">
                                    <option value="user" {{ $item->role == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $item->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('javascript')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                        text: '<i class="fa fa-plus"></i> Tambah',
                        className: 'btn btn-primary btn-sm btn-flat mr-1',
                        action: function(e, dt, node, config) {
                            $('#exampleModal form').attr('action',
                                `{{ route('users.update', ':id') }}`.replace(':id', ''));
                            $('#name').val('');
                            $('#email').val('');
                            $('#role').val('');
                            $('#exampleModal').modal('show');
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel"></i> Excel',
                        className: 'btn btn-success btn-sm btn-flat mr-1',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf"></i> PDF',
                        className: 'btn btn-danger btn-sm btn-flat mr-1',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i> Print',
                        className: 'btn btn-info btn-sm btn-flat',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
        // alert
        @if (session('success'))
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "Tutup"
            });
        @endif

        @if (session('error'))
            Swal.fire({
                title: "Gagal!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonText: "Tutup"
            });
        @endif

        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data ini akan dihapus secara permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
