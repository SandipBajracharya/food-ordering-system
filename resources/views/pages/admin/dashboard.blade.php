@extends('layouts.adminLayout')

@section('dashboard-content')
    <div>
        Hi! {{auth()->user()->username}}
    </div>
@endsection