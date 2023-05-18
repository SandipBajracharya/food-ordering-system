@extends('layouts.adminLayout')

@section('page-specific-css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('dashboard-content')
    @php
        $breadcrumb = ['Dashboard' => route('vendor.dashboard'), 'Products' => '#'];
    @endphp
    @include('include.admin.breadcrumbs', ['breadcrumb' => $breadcrumb])
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('product.create')}}" class="btn btn-success">Add Product</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="product-datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SN.</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>size</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $c = 1;
                    @endphp
                    @if (isset($products) && count($products) > 0)
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$c}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->size->name}}</td>
                                <td>{{$product->status}}</td>
                                <td class="d-flex">
                                    <a href="#" class="btn btn-success mr-4">Edit</a>
                                    <a href="#" class="btn btn-danger mr-4">Delete</a>
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
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#product-datatable").DataTable({
                "responsive": true, 
                "lengthChange": false, 
                "autoWidth": false
            }).buttons().container().appendTo('#product-datatable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection