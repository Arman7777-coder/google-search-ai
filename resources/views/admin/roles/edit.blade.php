@extends('admin.layouts.header-sidebar')

@section('styles')
    <link href="{{asset('admin-src/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('title')
    Edit User - {{ $user->name }}
@endsection

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h1>Edit User</h1>
                                <form class="needs-validation" method="POST" novalidate action="{{ route('users.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <!-- Name Field -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                    </div>

                                    <!-- Role Field with Dropdown Selection -->
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role:</label>
                                        <select name="role" class="form-control select2-multiple" data-toggle="select2" data-width="100%">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->name }}" @if($user->role == $role->name) selected @endif>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Submit Button -->
                                    <button class="btn btn-success mt-3" type="submit">Update</button>
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
    <script src="{{ asset('admin-src/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2-multiple').select2();
        });
    </script>
@endsection
