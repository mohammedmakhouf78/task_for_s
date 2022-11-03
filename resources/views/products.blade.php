@extends('master')

@section('content')
    <div class="row">
        <div class="col-3 bg-warning" style="min-height: 100vh">

            <div class="my-5">
                <label class="form-check-label" for="search">
                    Search
                </label>
                <input type="text" class="form-control" name="search" id="search">
            </div>

            <h2>Categories</h2>
            @foreach ($categories as $category)
                <div class="form-check">
                    <input class="form-check-input categoryCheckBox" type="checkbox" value="{{$category}}" id="category{{$category}}" name="category">
                    <label class="form-check-label" for="category{{$category}}">
                        {{$category}}
                    </label>
                </div>
            @endforeach
            



            <h2>Brands</h2>
            @foreach ($brands as $brand)
                <div class="form-check">
                    <input class="form-check-input brandCheckBox" type="checkbox" value="{{$brand}}" id="brand{{$brand}}">
                    <label class="form-check-label" for="brand{{$brand}}">
                        {{$brand}}
                    </label>
                </div>
            @endforeach

        </div>



        <div class="col-9">
            <div class="row" id="products-con">
                
            </div>

            <div class="text-center">
                <button class="btn btn-primary" id="more" data-productscount="{{$productsCount}}">More</button>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{asset('js/products.js')}}"></script>
@endpush