@extends('layouts.adminLayout')

@section('page-specific-css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('dashboard-content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{route('slider.create')}}" class="btn btn-success">Add Slider</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SN.</th>
                        <th>Slider Image</th>
                        <th>Slider title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $c = 1;
                    @endphp
                    @if (isset($sliders) && count($sliders) > 0)
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{$c}}</td>
                                <td>
                                    <img src="{{asset('storage/slider/'.$slider->slider_image)}}" alt="{{$slider->slider_image}}" width="100px">
                                </td>
                                <td>{{$slider->slider_text}}</td>
                                <td class="d-flex">
                                    <a class="btn btn-info mr-4" href="slider/{{$slider->id}}/edit" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="" id="slider-delete-form">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="button" onclick="sweetAlertConfirm(event, {{$slider->id}})" title="Delete"><i class="fas fa-trash"></i></button>
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
            $("#example1").DataTable({
                "responsive": true, 
                "lengthChange": false, 
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
                    $("#slider-delete-form").attr('action', `/admin/slider/${id}`);
                    $("#slider-delete-form").submit();
                } else {
                    e.preventDefault();
                }
            })
            return ret;
        }
    </script>
@endsection