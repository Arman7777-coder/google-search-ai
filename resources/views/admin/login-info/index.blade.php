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
    Login Info
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
                                <table id="datatable-info"
                                       class="table table-bordered table-responsive">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>IP address</th>
                                        <th>Browser</th>
                                        <th>Date</th>
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
            $('#datatable-info').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('login_info.paginate') }}",
                    type: "POST",
                    data: function (data) {
                        data.search = $('input[type="search"]').val();
                    }
                },
                order: ['1', 'DESC'],
                pageLength: 10,
                searching: true,
                aoColumns: [
                    {
                        data: 'user.name',
                    },
                    {
                        data: 'user.email',
                    },
                    {
                        data: 'ip_address',
                    },
                    {
                        data: 'browser',
                    },
                    {
                        data: 'login_date',
                    },
                ]
            });
        });
    </script>
@endsection
