@extends('layouts.app')

@section('content')
    @php
        if (auth()->check() && auth()->user()->is_vendor == 1) {
            $is_approved = getVendorApprovalStatus(auth()->user()->id);
        }
    @endphp

    @if (auth()->check() && auth()->user()->is_vendor == 1)
        @if (isset($is_approved) && !$is_approved)
            <div class="alert alert-info">
                Your vendor approval request is being processed. Thank you for having patience.
            </div>
        @endif
    @endif

    <div>
        {{-- carousel --}}
        <div id="mainSlider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @if (isset($sliders) && count($sliders) > 0)
                    @foreach ($sliders as $key => $item)
                        <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="{{$key}}" class="{{$key == 0? 'active' : ''}}" aria-current="{{$key == 0? true : false}}" aria-label="Slide {{$key + 1}}"></button>
                    @endforeach
                @endif
            </div>
            <div class="carousel-inner">
                @if (isset($sliders) && count($sliders) > 0)
                    @foreach ($sliders as $key => $slider)
                        <div class="carousel-item {{$key == 0? 'active' : ''}}">
                            <img src="{{asset('storage/slider/'.$slider->slider_image)}}" class="d-block w-100" alt="..." style="max-height: 80vh;">
                            <div class="carousel-caption d-none d-md-block">
                                <p>{{$slider->slider_text}}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        {{-- banner --}}
        <div class="py-5 w-100" style="">
            <img src="https://foodmandu.com/Images/Foodmandu-Fresh.jpg" alt="" class="w-100">
        </div>
    </div>
@endsection
