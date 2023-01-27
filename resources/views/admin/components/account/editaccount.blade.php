@extends('admin.layouts.master')
@section('title')
    Account
@endsection
@section('css')
    <!-- third party css -->
    <link href="{{ asset('adm/assets/css/vendor/fullcalendar.min.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->
@endsection
@section('js')
    <!-- third party js -->
    <!-- plugin js -->
    <script src="{{ asset('adm/assets/js/vendor/dropzone.min.js') }}"></script>
    <!-- init js -->
    <script src="{{ asset('adm/assets/js/ui/component.fileupload.js') }}"></script>
    <!-- third party js ends -->
@endsection
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                            <li class="breadcrumb-item active">Calendar</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Create Account</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session()->get('success') }}
            </div>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('admin.account.update', $user->id) }}" enctype="multipart/form-data"
                            class="needs-validation" novalidate method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <a href="{{ route('admin.account.index') }}" class="btn btn-danger mb-2"><i
                                            class="uil-angle-double-left"></i>back to list</a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="justify-content-end">
                                        <select data-toggle="select2" name="role" id="role">
                                            <option value="">Chọn nhóm quyền</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}"
                                                    {{ $role->name == $user->getRoleNames()->first() ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="fullname">FullName:</label>
                                        <input type="text" class="form-control" name="fullname" id="fullname"
                                            placeholder="Enter your fullname"
                                            value="{{ old('fullname') ? old('fullname') : $user->fullname }}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username:</label>
                                        <input type="text" class="form-control" name="username" id="username"
                                            placeholder="Enter your username"
                                            value="{{ old('username') ? old('username') : $user->username }}" readonly>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email:</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="Enter your email" aria-describedby="inputGroupPrepend" required
                                                value="{{ old('email') ? old('email') : $user->email }}">
                                            <div class="invalid-feedback">
                                                Please choose a email.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone_number">Phone:</label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                                            data-toggle="input-mask" data-mask-format="(000) 000-0000"
                                            placeholder="E.g (xxx) xxx-xxxx"
                                            value="{{ old('phone_number') ? old('phone_number') : $user->phone_number }}">
                                        <span class="font-13 text-muted"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="address">Address:</label>
                                        <input type="text" name="address" class="form-control" id="address"
                                            value="{{ old('address') ? old('address') : $user->address }}"
                                            placeholder="Enter your address" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid zip.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image:</label>
                                        <input class="form-control" name="image" id="image" type="file"
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success mb-2" type="submit">Submit</button>
                        </form>
                        <!-- File Upload -->
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>

    </div> <!-- container -->
@endsection
