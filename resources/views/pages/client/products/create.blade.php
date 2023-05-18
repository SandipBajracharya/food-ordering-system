@extends('layouts.adminLayout')

@section('dashboard-content')
    @php
        $breadcrumb = ['Dashboard' => route('vendor.dashboard'), 'Product' => route('product.index'), 'Product Add' => '#'];
    @endphp
    @include('include.admin.breadcrumbs', ['breadcrumb' => $breadcrumb])
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card card-primary col-md-8">
                <div class="card-header">
                <h3 class="card-title">Add Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div>
                    <form method="POST" action="{{route('product.store')}}">
                        @csrf
                        <div class="card-body">
                            @include('pages.client.products.form', ['sizes' => $sizes])
                        </div>
                        <!-- /.card-body -->
                    
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@section('page-specific-js')
    <!-- Bootstrap Switch -->
    <script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <script>
        $(function() {
            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })
        });
    </script>
@endsection
