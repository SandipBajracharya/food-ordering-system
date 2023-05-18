@extends('layouts.adminLayout')

@section('dashboard-content')
    <div class="container-fluid">
        <div>
            Hello {{auth()->user()->username}}!
        </div>
    </div>
@endsection
