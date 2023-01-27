@extends('admin.layouts.master')
@section('title')
    Admin | Account System
@endsection
@section('css')
    <!-- third party css -->
    <link href="{{ asset('adm/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adm/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endsection
@section('js')
    <!-- Datatables js -->
    <script src="{{ asset('adm/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adm/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('adm/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adm/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('adm/assets/js/vendor/dataTables.buttons.min.js') }}"></script>

    <!-- Datatable Init js -->
    <script>
        $(document).ready(function() {
            "use strict";
            $("#products-datatable").DataTable({
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    },
                    info: "Showing products _START_ to _END_ of _TOTAL_",
                    lengthMenu: 'Display <select class=\'form-select form-select-sm ms-1 me-1\'><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="-1">All</option></select> products'
                },
                pageLength: 5,
                columns: [{
                    orderable: !0
                }, {
                    orderable: !0
                }, {
                    orderable: !0
                }, {
                    orderable: !0
                }, {
                    orderable: !0
                }, {
                    orderable: !0
                }, {
                    orderable: !0
                }, {
                    orderable: !1
                }],
                order: [
                    [0, "asc"]
                ],
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded"), $(
                        "#products-datatable_length label").addClass("form-label")
                }
            })

            $('.delete').on('click', function() {
                const id = $(this).attr('data-id');

                // $('#continue-btn').attr('href', '\{\{ '+'route(\' admin.account.delete \','+ $(this).data('id') +')'+' \}\}')
                // console.log(document.querySelector('#continue-btn'))
                // $("#warning-alert-modal").modal('show');
            })


        });
    </script>
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Data Tables</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Tables</h4>
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
                                <a href="{{ route('admin.account.create') }}" class="btn btn-danger mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> Add Account </a>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <button type="button" class="btn btn-success mb-2 me-1"><i
                                            class="mdi mdi-cog-outline"></i></button>
                                    <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                    <button type="button" class="btn btn-light mb-2">Export</button>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                <thead class="table-light">
                                    <tr>
                                        {{-- <th class="all" style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th> --}}
                                        <th>STT</th>
                                        <th>FullName</th>
                                        <th>Image</th>
                                        <th>Position</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th style="width: 85px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->fullname }}</td>
                                            <td>
                                                @if ($user->image == null)
                                                    <span style="color:red">No image</span>
                                                @else
                                                    <img src="{{ asset($user->image) }}" alt="contact-img" title="contact-img"
                                                        class="rounded me-3" height="48">
                                                    {{-- <p class="m-0 d-inline-block align-middle font-16"> --}}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->getRoleNames()->first() == null)
                                                    <span class="badge bg-secondary">chưa phân quyền</span>
                                                @else
                                                    <span
                                                        class="badge bg-success">{{ $user->getRoleNames()->first() }}</span>
                                                @endif

                                            </td>
                                            <td>
                                                {{ $user->username }}
                                            </td>

                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->phone_number }}
                                            </td>

                                            <td class="table-action">
                                                {{-- <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-eye"></i></a> --}}
                                                <a href="{{ route('admin.account.edit', $user->id) }}" class="action-icon" >
                                                    <i class="mdi mdi-square-edit-outline"></i></a>

                                                <a {{ $user->getRoleNames()->first() === 'admin' ? 'hidden' : '' }}
                                                    href="{{ route('admin.account.delete',$user->id) }}" data-id="{{ $user->id }}"
                                                    class="action-icon delete"> <i class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->
    <!-- Success Alert Modal -->
    <!-- Warning Alert Modal -->

    <div id="warning-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-warning h1 text-warning"></i>
                        <h4 class="mt-2">Incorrect Information</h4>
                        <p class="mt-3">Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                            facilisis in, egestas eget quam.</p>
                        <a type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Cancle</a>
                        <a id="continue-btn" type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Continue</a>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
