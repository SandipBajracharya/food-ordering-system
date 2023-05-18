@extends('layouts.adminLayout')

@section('dashboard-content')
    <div class="container-fluid">

        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include('pages.admin.slider.form')
                </div>
                <!-- /.card-body -->
            
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
