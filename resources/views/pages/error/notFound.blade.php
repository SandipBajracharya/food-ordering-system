@extends('layouts.basicLayout')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div>
            <img src="{{asset('image/not-found.jpg')}}" alt="" style="max-height: 60vh; max-width: 100%;">
            <div class="text-center">
                <a href="/" class="btn btn-primary text-white"> Go to homepage </a>
            </div>
        </div>
    </div>
@endsection
