@extends('layouts.app')

@section('content')
    <div class="restaurant-banner">
        <img src="{{$vendor->image_cover}}" alt="{{$vendor->brand_name}}" class="w-100">
    </div>
    <div class="incr-margin">
        <div class="container text-white">
            Here
        </div>
    </div>
    <div class="mt-5 pb-4 bg-white">
        <div class="container">
            <div class="w-100">
                <div class="p-5">
                    <div class="row mx-auto justify-content-center">
                        <div class="col-md-7">
                            <h3>Food Items</h3>
                            <div class="list-group mt-3">
                                @if (!empty($products) && count($products) > 0)
                                    {{-- {{dd($products)}} --}}
                                    @foreach ($products as $item)
                                        <div class="list-group-item list-group-item-action py-3 px-4" style="font-size: 18px;">
                                            <div class="d-flex mx-auto justify-content-between">
                                                <div>
                                                    {{$item->name}}
                                                </div>
                                                <div class="text-secondary d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <strong>
                                                            NRP {{number_format($item->price, 2)}} |-
                                                        </strong>
                                                    </div>
                                                    @guest
                                                        <a href="/login" class="ms-3 btn" title="Add to cart">
                                                            <i class="fas fa-cart-plus text-success"></i>
                                                        </a>                                                
                                                    @else
                                                        <button class="ms-3 btn" onclick="addToCart({{$item->id}})" title="Add to cart">
                                                            <i class="fas fa-cart-plus text-success"></i>
                                                        </button>
                                                        <input type="hidden" value="{{Session::get('token')}}" id="accessToken">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-specifig-js')
    <script src="{{asset('js/cart.js')}}"> </script>
@endsection