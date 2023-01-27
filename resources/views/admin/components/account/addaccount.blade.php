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
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <a href="{{ route('admin.account.index') }}" class="btn btn-danger mb-2"><i
                                        class="uil-angle-double-left"></i>back to list</a>
                            </div>
                        </div>
                        <form action="{{ route('admin.account.store') }}" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="fullname">FullName:</label>
                                        <input type="text" class="form-control" name="fullname" id="fullname"
                                            placeholder="Enter your fullname" required value="">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter fullname.
                                            </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username:</label>
                                        <input type="text" class="form-control" name="username" id="username"
                                            placeholder="Enter your username" required value="">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter username.
                                            </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email:</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="Enter your email" aria-describedby="inputGroupPrepend"
                                                required value="">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter email.
                                                </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone_number">Phone:</label>
                                        <input type="text" id="phone_number" name="phone_number" class="form-control"
                                            data-toggle="input-mask" data-mask-format="(000) 000-0000"
                                            placeholder="E.g (xxx) xxx-xxxx" value="">
                                        <span class="font-13 text-muted"></span>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="address">Address:</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            placeholder="Enter your address" required value="">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter address.
                                            </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Enter your password" value="" required>
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image:</label>
                                <input class="form-control" name="image" id="image" type="file" value="">
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
