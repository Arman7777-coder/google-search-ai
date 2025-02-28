@extends('admin.layouts.header-sidebar')

@section('styles')
    <link href="{{ asset('admin-src/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin-src/libs/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin-src/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin-src/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin-src/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('title')
    Add New User
@endsection

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="mb-4">Add New User</h2>
                                <form method="POST" action="{{ route('admin.store-user') }}" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="role" class="form-control select2-multiple" data-toggle="select2" required>
                                            <option value="admin">Admin</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="student">Student</option>
                                            <option value="parent">Parent</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="parent_id" class="form-label">Parent (for Student)</label>
                                        <select name="parent_id" class="form-control select2-multiple" data-toggle="select2">
                                            <option value="">None</option>
                                            @foreach($parents as $parent)
                                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Add User</button>
                                    <a href="/admin" class="btn btn-secondary ms-2">Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin-src/libs/selectize/js/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('admin-src/libs/mohithg-switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('admin-src/libs/multiselect/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('admin-src/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-src/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script>
    <script src="{{ asset('admin-src/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>
    <script src="{{ asset('admin-src/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('admin-src/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('admin-src/js/pages/form-advanced.init.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.select2-multiple').select2({
                placeholder: 'Choose Permissions'
            });
        });
    </script>
@endsection
