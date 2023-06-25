@extends('layouts.adminLayout')

@section('page-specific-css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('dashboard-content')
    @php
        $breadcrumb = ['Dashboard' => route('dashboard'), 'Pending Vendors' => route('pendingVendorIndex')];
    @endphp
    @include('include.admin.breadcrumbs', ['breadcrumb' => $breadcrumb])
    <div class="container-fluid">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="pending-vendor-datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SN.</th>
                        <th>Username</th>
                        <th>Email address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $c = 1;
                    @endphp
                    @if (isset($users) && count($users) > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$c}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td class="d-flex">
                                    <a href="{{route('approveVendor', $user->id)}}" class="btn btn-success mr-4">Approve</a>
                                    <a href="{{route('rejectVendor', $user->id)}}" class="btn btn-danger mr-4">Reject</a>
                                </td>
                            </tr>
                            @php
                                $c++;
                            @endphp
                        @endforeach
                    @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection

@section('page-specific-js')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#pending-vendor-datatable").DataTable({
                "responsive": true, 
                "lengthChange": false, 
                "autoWidth": false
            }).buttons().container().appendTo('#pending-vendor-datatable_wrapper .col-md-6:eq(0)');
            console.log('Hello');
        });
    </script>
@endsection