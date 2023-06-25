@extends('layouts.adminLayout')

@section('page-specific-css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('dashboard-content')
    @php
        $breadcrumb = ['Dashboard' => '/admin/dashboard', 'Product Size' => '#'];
    @endphp
    @include('include.admin.breadcrumbs', ['breadcrumb' => $breadcrumb])
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="/admin/product-size/create" class="btn btn-success">Add Size</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="size-datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SN.</th>
                        <th>Size</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $c = 1;
                    @endphp
                    @if (isset($sizes) && count($sizes) > 0)
                        @foreach ($sizes as $size)
                            <tr>
                                <td>{{$c}}</td>
                                <td>{{$size->name}}</td>
                                <td class="d-flex">
                                    <a class="btn btn-info mr-4" href="/admin/product-size/{{$size->id}}/edit">Edit</a>
                                    <form method="POST" action="" id="size-delete-form">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="button" onclick="sweetAlertConfirm(event, {{$size->id}})">Delete</button>
                                    </form>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#size-datatable").DataTable({
                "responsive": true, 
                "lengthChange": false, 
                "autoWidth": false
            }).buttons().container().appendTo('#size-datatable_wrapper .col-md-6:eq(0)');
            console.log('Hello');
        });

        function sweetAlertConfirm(e, id) {
            let ret = false;
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure you want to Delete?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then(result => {
                if (result.isConfirmed) {
                    $("#size-delete-form").attr('action', `/admin/product-size/${id}`);
                    $("#size-delete-form").submit();
                } else {
                    e.preventDefault();
                }
            })
            return ret;
        }
    </script>
@endsection