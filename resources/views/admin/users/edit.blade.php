@extends('admin.layouts.header-sidebar')
@section('styles')
    <link href="{{asset('admin-src/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin-src/libs/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin-src/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin-src/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin-src/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('admin-src/libs/mohithg-switchery/switchery.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('title')
    Shop edit
@endsection
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Update User</h4>
                                <p class="text-muted font-13"></p>

                                <form class="needs-validation" method="post" id="form" novalidate
                                      enctype="multipart/form-data"
                                      action="{{route('users.update', $user->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="inputEmail4" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmail4" name="email"
                                                   placeholder="Email" value="{{$user->email}}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="inputName" name="name"
                                                   placeholder="Name" value="{{$user->name}}" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="password" class="form-label">Show/Hide Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="password" class="form-control" name="password"
                                                       placeholder="Enter your password">
                                                <div class="input-group-text show-password" data-password="true">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                        </div>
{{--                                        <div class="mb-3 col-md-6">--}}
{{--                                            <label for="country" class="form-label">Country</label>--}}
{{--                                            <select class="form-control" id="country" name="country"--}}
{{--                                                    data-toggle="select2" data-width="100%">--}}
{{--                                                <option value="">Select</option>--}}
{{--                                                @foreach($countries as $country)--}}
{{--                                                    <option value="{{$country->name}}"--}}
{{--                                                            @if(isset($user->country) && $user->country === $country->name) selected @endif--}}
{{--                                                    >{{$country->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}

                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="phone" class="form-label">Phone number</label>
                                            <input type="text" class="form-control" id="phone" name="phone_number"
                                                   value="{{$user->phone}}"
                                                   placeholder="+374 77 777 777">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="example-date" class="form-label">Birth date</label>
                                            <input class="form-control" id="example-date" type="date" name="birth_date"
                                                   value="{{\Carbon\Carbon::parse($user->birth_date)->format('Y-m-d')}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="inputAddress" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="inputAddress" name="address"
                                                   value="{{$user->address}}"
                                                   placeholder="1234 Main St">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputAddress2" class="form-label">Address 2</label>
                                            <input type="text" class="form-control" id="inputAddress2" name="address2"
                                                   value="{{$user->address2}}"
                                                   placeholder="Apartment, studio, or floor">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="inputCity" class="form-label">City</label>
                                            <input type="text" class="form-control" id="inputCity" name="city"
                                                   value="{{$user->city}}">
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="inputState" class="form-label">State</label>
                                            <input type="text" class="form-control" id="inputState" name="state"
                                                   value="{{$user->state}}"
                                            >
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label for="inputZip" class="form-label">Zip</label>
                                            <input type="text" class="form-control" id="inputZip" name="zip_code"
                                                   value="{{$user->zip_code}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label for="image" class="form-label">Avatar</label>
                                            <input type="file" id="image" name="avatar"
                                                   data-plugins="dropify" data-default-file="{{asset($user->avatar)}}"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="inputRole" class="form-label">Role</label>
                                            <select id="inputRole" class="form-select" name="role" required>
                                                <option value="">Select Role</option>
                                                @foreach($roles as $role)
                                                    @switch($role->name)

                                                        @case(\App\Enum\UserRoleEnum::ADMIN->value)
                                                            @can(\App\Enum\PermissionEnum::CREATE_ADMIN->value)
                                                                <option value="{{$role->id}}"
                                                                        @if($user->hasRole($role->name)) selected @endif>{{$role->name}}</option>
                                                            @endcan
                                                            @break
                                                        @case(\App\Enum\UserRoleEnum::MANAGER->value)
                                                            @can(\App\Enum\PermissionEnum::CREATE_MANAGER->value)
                                                                <option value="{{$role->id}}"
                                                                        @if($user->hasRole($role->name)) selected @endif>{{$role->name}}</option>
                                                            @endcan
                                                            @break

                                                    @endswitch
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    @can(\App\Enum\PermissionEnum::ASSIGN_PERMISSION_TO_USERS->value)
                                        <div class="row mt-3">
                                            <div class="col-md-12">

                                                <label for="permissionsSelect"
                                                       class="mb-1 fw-bold text-muted mt-3 mt-md-0">Permissions</label>
                                                <select class="form-control select2-multiple" data-toggle="select2"
                                                        data-width="100%" multiple="multiple"
                                                        data-placeholder="Choose Permissions"
                                                        disabled
                                                        id="permissionsSelect">
                                                    @foreach($user->roles as $role)
                                                        @foreach($role->permissions as $permission)
                                                            <option
                                                                value="{{$permission->id}}"
                                                                selected>{{$permission->name}}</option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endcan
                                    <button class="btn btn-primary mt-3" type="submit">Update User</button>
                                </form>

                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin-src/libs/selectize/js/standalone/selectize.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/mohithg-switchery/switchery.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/multiselect/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('admin-src/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/devbridge-autocomplete/jquery.autocomplete.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/dropify/js/dropify.min.js')}}"></script>


    <script src="{{asset('admin-src/js/pages/form-advanced.init.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('[data-plugins="dropify"]').dropify({
                messages: {
                    default: "Drag and drop a file here or click",
                    replace: "Drag and drop or click to replace",
                    remove: "Remove",
                    error: "Ooops, something wrong appended."
                }, error: {fileSize: "The file size is too big (1M max)."}
            });
            let role = $('#inputRole').val(); // Get the role value on page load
            if (role === '4') {
                $('#parentSelection').show(); // Show parent selection for student
                $('#teachersSelection').show(); // Show parent selection for student
            } else {
                $('#parentSelection').hide(); // Hide for other roles
                $('#teachersSelection').hide(); // Hide for other roles
            }
            let id = $('#inputRole').val(); // Get the role ID
            if (id) {
                $.ajax({
                    url: `/admin/users/getRolePermissions/${id}`,
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        if (data.success === true) {
                            $('#permissionsSelect').html('');
                            let html = '';
                            for (let item of data.permissions) {
                                let selected = '';
                                if (data.selectedPermissions.find(x => x.id === item.id)) {
                                    selected = 'selected';
                                }
                                html += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                            }
                            $('#permissionsSelect').html(html);
                        } else {
                            Swal.fire({
                                title: "Something went wrong",
                                icon: 'error',
                            });
                        }
                    }
                });
            }
             $('#inputRole').on('click', function () {
                let id = this.value;
                let role = $(this).val();
                if (role === '4') {
                    $('#parentSelection').show(); // Show parent selection for student
                    $('#teachersSelection').show(); // Show parent selection for student
                } else {
                    $('#parentSelection').hide(); // Hide for other roles
                    $('#teachersSelection').hide(); // Hide for other roles
                }
                $.ajax({
                    url: `/admin/users/getRolePermissions/${id}`,
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        if (data.success === true) {
                            $('#permissionsSelect').html('');
                            let html = "";
                            for (let item of data.permissions) {
                                let selected = "";
                                if (data.selectedPermissions.find(x => x.id === item.id)) {
                                    selected = 'selected';
                                }
                                html += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                            }
                            $('#permissionsSelect').html(html);
                        } else {
                            Swal.fire({
                                title: "Something went wrong",
                                icon: 'error',
                            });
                        }
                    }
                });
             });

        })
    </script>
@endsection
