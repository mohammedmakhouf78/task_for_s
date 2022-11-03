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

        