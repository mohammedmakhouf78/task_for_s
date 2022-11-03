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
    <script>
        let page = 1;
        let categories = [];
        let brands = [];
        let search = "";


        let productsCount = $('#more').data('productscount')

        ajaxToGetProduct()



        $('#search').on('input',function(){
            search = $(this).val()
            ajaxToGetProduct(page = 1, categories, brands, search)
        })

        $('#more').on('click',function(){
            page += 1;
            ajaxToGetProduct(page, categories, brands, search)
        })


        $('.categoryCheckBox').each(function(index, element){
            $(element).change(function(){
                $('.categoryCheckBox').each(function(index, element){
                    if(element.checked)
                    {
                        categories[index] = $(element).val()
                    }
                    else
                    {
                        categories = categories.filter( item => item != $(element).val())
                    }
                })
                ajaxToGetProduct(page = 1, categories, brands , search)
            })
        })

        $('.brandCheckBox').each(function(index, element){
            $(element).change(function(){
                $('.brandCheckBox').each(function(index, element){
                    if(element.checked)
                    {
                        brands[index] = $(element).val()
                    }
                    else
                    {
                        brands = brands.filter( item => item != $(element).val())
                    }
                })
                ajaxToGetProduct(page = 1, categories, brands, search)
            })
        })


         function ajaxToGetProduct(page = 1, categories, brands, search){
            if(productsCount > (page - 1) * 6)
            {
                $.ajax({
                    url: `/task2/get-products?page=${page}`,
                    type: 'GET',
                    data:{
                        categories: categories,
                        brands: brands,
                        search: search
                    },
                    success: function(response) {
                        $('#products-con').html('')
                        response.products.forEach(product => {
                            $('#products-con').append(`
                                <div class="col-4 bg-info my-3 p-3 mx-3">
                                    <div class="product">
                                        <h2>${product.product}</h2>
                                        <h2 class="badge bg-danger">${product.category}</h2>
                                        <h2 class="badge bg-warning text-dark">${product.brand}</h2>
                                        <h2 class="badge bg-success">${product.id}</h2>
                                    </div>
                                </div>
                            `)
                        });
                    },
                    error: function() {}
                })
            }
            
         }

        
    </script>
@endpush