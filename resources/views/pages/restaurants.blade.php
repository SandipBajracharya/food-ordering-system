@extends('layouts.app', ['key' => !empty($key)? $key : ''])

@section('content')
    @php
        if (auth()->check() && auth()->user()->is_vendor == 1) {
            $is_approved = getVendorApprovalStatus(auth()->user()->id);
        }
    @endphp
    
    @if (auth()->check() && auth()->user()->is_vendor == 1)
        @if (isset($is_approved) && !$is_approved)
            <div class="container">
                <div class="alert alert-info">
                    Your vendor approval request is being processed. Thank you for having patience.
                </div>
            </div>
        @endif
    @endif

    <div class="bg-grey">
        <div class="container">
            <div class="py-5">
                <h3>Restaurants and stores</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row py-5">
            @if (!empty($vendors) && count($vendors) > 0)
                @foreach ($vendors as $vendor)
                    <div class="col-md-4">
                        <a href="{{route('restaurant.detail', $vendor->id)}}">
                            <div class="card restaurant-card">
                                <div>
                                    <img src="{{$vendor->image_cover}}" alt="{{$vendor->brand_name}}" class="w-100">
                                </div>
                                <div class="card-body">
                                    <h5>
                                        {{$vendor->brand_name}}
                                    </h5>
                                    <div>
                                        Location:
                                        <br>
                                        Service: {{$vendor->service}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div>
                    No restaurants available. Please use different search tags!
                </div>
            @endif
        </div>
    </div>
@endsection