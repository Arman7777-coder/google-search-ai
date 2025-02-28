@extends('admin.layouts.header-sidebar')
@section('styles')
    <link href="{{asset('admin-src/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('admin-src/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin-src/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('admin-src/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('admin-src/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('title')
    Admins
@endsection
@section('content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @can(\App\Enum\PermissionEnum::CREATE_USER->value)
                                    <h4 class="mt-0 header-title mb-3">
                                        @if(isset($type))
                                        <a href="{{ route('users.create', ['role' => $type])}}"
                                           class="btn btn-primary waves-effect waves-light">Create</a>
                                        @else
                                            <a href="{{ route('users.create')}}"
                                               class="btn btn-primary waves-effect waves-light">Create</a>
                                        @endif
                                    </h4>
                                @endcan
                                <table id="datatable"
                                       class="table table-bordered dt-responsive table-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Email Verified At</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($users as $user)
                                        <tr id="item-{{$user->id}}">
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->email_verified_at}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>{{$user->updated_at}}</td>
                                            <td>

                                                @switch(optional($user->roles->first())->name)

                                                    @case(\App\Enum\UserRoleEnum::ADMIN->value)
                                                        @can(\App\Enum\PermissionEnum::EDIT_ADMIN->value)
                                                            <a href="{{route('users.edit', $user->id)}}"
                                                               class="btn btn-success">
                                                                <span class="mdi mdi-pencil"></span>
                                                            </a>
                                                        @endcan
                                                        @can(\App\Enum\PermissionEnum::DELETE_ADMIN->value)
                                                            <a href="javascript:void(0)" data-id="{{$user->id}}"
                                                               class="btn btn-danger delete">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        @endcan
                                                        @break
                                                    @case(\App\Enum\UserRoleEnum::MANAGER->value)
                                                        @can(\App\Enum\PermissionEnum::EDIT_MANAGER->value)
                                                            <a href="{{route('users.edit', $user->id)}}"
                                                               class="btn btn-success">
                                                                <span class="mdi mdi-pencil"></span>
                                                            </a>
                                                        @endcan
                                                        @can(\App\Enum\PermissionEnum::DELETE_MANAGER->value)
                                                            <a href="javascript:void(0)" data-id="{{$user->id}}"
                                                               class="btn btn-danger delete">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        @endcan
                                                        @break

                                                @endswitch
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin-src/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin-src/js/pages/datatables.init.js')}}"></script>
    <script src="{{asset('admin-src/libs/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.delete').on('click', function () {
                let id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    icon: 'warning',
                    text: "Once deleted, you will not be able to recover this!",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> Delete!',
                    confirmButtonColor: '#ff8086',
                    cancelButtonText: '<i class="fa fa-thumbs-down">Cancel</i>'
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        $.ajax({
                            url: `/admin/users/${id}`,
                            type: "post",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                _method: 'DELETE',
                                id: $(this).data('id')
                            },
                            success: function (data) {
                                if (data.success === true) {
                                    $('#item-' + id).remove();
                                    Swal.fire({
                                        title: "Deleted!",
                                        icon: 'success',
                                    });
                                } else {
                                    Swal.fire({
                                        title: "Something went wrong",
                                        icon: 'error',
                                    });
                                }
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Canceled",
                            icon: "error",
                        });
                    }
                }).catch(e => {
                    Swal.fire({
                        title: "Canceled",
                        icon: 'error',
                    });
                });
            });
        });
    </script>
@endsection
