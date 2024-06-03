@extends('layouts.frontend')

@section('title', __('Home'))
@php
@endphp

@section('content')
    <style>
        .yellow-bar {
            height: auto;
            /* Change height to auto */
            min-height: 50px;
            /* Set a minimum height */
            background-color: #ffd700;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* margin-bottom: 20px; */
        }

        .product-info {
            font-size: 8px;
            height: 50px;
            background-color: #fff;
            /* padding: 10px 15px; */
            margin: 5px;
            border-radius: 2px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            align-items: center;
            justify-content: center;
            flex: 1;
            /* Allow product info to expand within yellow bar */
            margin: 0 5px;
            /* Add margin between product infos */
        }

        .product-info:hover {
            transform: translateY(-2px);
        }

        .product-info section {
            margin-bottom: 8px;
        }

        .post-slide.zoomable {
            transition: transform 0.3s ease;
        }

        .post-slide.zoomable:hover {
            transform: scale(1.1);
        }
    </style>
    <div class="row mt-5">
        <div class="col-md-12">
            <div id="news-slider" class="owl-carousel">
                @foreach ($products1 as $product)
                    <div class="post-slide zoomable">
                        <div class="yellow-bar">
                            <div class="product-info d-flex align-items-center justify-content-center">
                                <strong><span>{{$product->seller->name}}</span></strong>
                            </div>
                            <div class="product-info mt-2 mb-2 p-1 " style="max-height:50px; overflow:hidden">
                                <p><strong><span>Example Product</span></strong></p>
                                <div class="row">
                                    <div class="col-6">
                                        <p><strong>Min Qty:<span>{{$product->stock_qty}}</span></strong> </p>
                                    </div>
                                    <div class="col-6">
                                        <p> <strong>SL: <span>{{$product->id}}</span></strong> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info d-flex align-items-center justify-content-center">
                                <p> Seller Review: <span>{{count($product->reviews)}}</span></p>
                            </div>
                        </div>
                        <div class="post-img">
                            <img src="{{ asset('public') }}/media/{{ $product->f_thumbnail }}" />
                            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="yellow-bar">
                            <div class="product-info d-flex align-items-center justify-content-center">
                                <strong><span>{{$product->created_at->diffForHumans()}}</span></strong>
                            </div>
                            <div class="product-info mt-2 mb-2 p-1 " style="max-height:50px; overflow:hidden">
                                <div class="product-info d-flex align-items-center justify-content-center">
                                    <strong><span><i class="fas fa-location"></i>{{$product->seller->address??'Dhaka'}}</span></strong>
                                </div>
                            </div>
                            <div class="product-info d-flex align-items-center justify-content-center">
                                <p> <span>Original</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="news-slider" class="owl-carousel mt-5">
                @foreach ($products2 as $product)
                    <div class="post-slide zoomable">
                        <div class="yellow-bar">
                            <div class="product-info d-flex align-items-center justify-content-center">
                                <strong><span>{{$product->seller->name}}</span></strong>
                            </div>
                            <div class="product-info mt-2 mb-2 p-1 " style="max-height:50px; overflow:hidden">
                                <p><strong><span>Example Product</span></strong></p>
                                <div class="row">
                                    <div class="col-6">
                                        <p><strong>Min Qty:<span>{{$product->stock_qty}}</span></strong> </p>
                                    </div>
                                    <div class="col-6">
                                        <p> <strong>SL: <span>{{$product->id}}</span></strong> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info d-flex align-items-center justify-content-center">
                                <p> Seller Review: <span>{{count($product->reviews)}}</span></p>
                            </div>
                        </div>
                        <div class="post-img">
                            <img src="{{ asset('public') }}/media/{{ $product->f_thumbnail }}" />
                            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="yellow-bar">
                            <div class="product-info d-flex align-items-center justify-content-center">
                                <strong><span>{{$product->created_at->diffForHumans()}}</span></strong>
                            </div>
                            <div class="product-info mt-2 mb-2 p-1 " style="max-height:50px; overflow:hidden">
                                <div class="product-info d-flex align-items-center justify-content-center">
                                    <strong><span><i class="fas fa-location"></i>{{$product->seller->address??'Dhaka'}}</span></strong>
                                </div>
                            </div>
                            <div class="product-info d-flex align-items-center justify-content-center">
                                <p> <span>Original</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <style>
        p {
            padding: 0px;
            margin: 0px;
        }
    </style>
@endsection
