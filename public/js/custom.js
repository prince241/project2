$('.client-side-validation').each(function (index, element) {
    $(this).validate({
        errorElement: "div",
        errorPlacement: function (error, element) {
            element.removeClass("is-valid");
            error.addClass("invalid-feedback");
            element.after(error);
        },
        success: function (errorLable, element) {
            $(errorLable).remove();
            element.classList.add("is-valid");
        },
    });
});

gridViewBtn = $(".grid-view-btn"),
    listViewBtn = $(".list-view-btn"),
    ecommerceProducts = $("#ecommerce-products"),

    /***** CHANGE VIEW *****/
    // Grid View
    gridViewBtn.on("click", function () {
        ecommerceProducts.removeClass("list-view").addClass("grid-view");
        listViewBtn.removeClass("active");
        gridViewBtn.addClass("active");
    });

// List View
listViewBtn.on("click", function () {
    ecommerceProducts.removeClass("grid-view").addClass("list-view");
    gridViewBtn.removeClass("active");
    listViewBtn.addClass("active");
});



productSearchBar = $("#productSearch");
productList = $("#ecommerce-products");
productListData = '';
orderSelectOption = document.getElementById('ecommerce-price-options');


// $("input[type='radio'][name='rate']:checked").val();
productSearchBar.keypress(function (e) {
    if (e.key == 'Enter') {
        sendAjax()
    }
})
// orderSelectOption.change(function (e) { 
//     sendAjax()  
// });
function sendAjax() {
    range = JSON.parse($("input[type='radio'][name='price-range']:checked").val())
    filterQuery = {
        q: productSearchBar.val(),
        min: range[0],
        max: range[1],
        sortByPrice: orderSelectOption.value,
    }
    $.ajax({
        type: "get",
        url: "/search/products",
        data: filterQuery,
        success: function (response) {
            // document.getElementById()
            console.log(response)
            if (response.success) {
                productListData = response.data;
                productList.html(response.data)
            }
            //write code to display if result not found
            if (!response.success) {
                errorHtml = `<div class="alert alert-warning col-12">${response.message}</div>`
                productList.html(errorHtml)
            }
        },
        //  error: function (jqXhr, textStatus, errorMessage) {
        //      console.log(jqXhr)
        //      console.log(textStatus)
        //      console.log(errorMessage)
        // }
    });
}
function addWishList(element, product_id) {

    if (element.classList.contains('added')) {
        $.ajax({
            type: "get",
            url: "/wishlists/remove",
            data: {
                product_id: product_id
            },
            success: function (response) {
                element.classList.remove('added')
                element.children[0].classList.remove('fa-heart')
                element.children[0].classList.add('fa-heart-o')
            }
        });
    } else {
        $.ajax({
            type: "get",
            url: "/wishlists/add",
            data: {
                product_id: product_id
            },
            success: function (response) {
                element.classList.add('added')
                element.children[0].classList.add('fa-heart')
                element.children[0].classList.remove('fa-heart-o')
            }
        });
    }
}
function removeWishList(element,product_id){
$.ajax({
    type: "get",
    url: "/wishlists/remove",
    data: {
        product_id: product_id
    },
    success: function (response) {
        element.closest(".wishlistitem").remove()

    }
});
}
function addToCart(element,product_id){
    $.ajax({
        type: "get",
        url: "/cart/add",
        data: {
            product_id: product_id
        },
        success: function (response) {
            // console.log(element.getElementsByClassName('move-to-cart'));
            element.getElementsByClassName('move-to-cart')[0].innerHTML="View to card";
        }
    });
    }


    function checkToCart(element,product_id){
        $.ajax({
            type: "get",
            url: "/cart/add",
            data: {
                product_id: product_id
            },
            success: function (response) {
                // console.log(element.getElementsByClassName('move-to-cart'));
                element.getElementsByClassName('move-to-cart')[0].innerHTML="View wishlist";
            }
        });
        }




        // function checkToCart(element,product_id){
        //     $.ajax({
        //         type: "get",
        //         url: "/wishlist/add",
        //         data: {
        //             product_id: product_id
        //         },
        //         success: function (response) {
        //             // console.log(element.getElementsByClassName('move-to-cart'));
        //             element.getElementsByClassName('move-to-wishlist')[0].innerHTML="View to wishlist ";
        //         }
        //     });
        //     }


// $('.wishlist.added').click(function (e) { 
//     e.preventDefault();
//     removeWishList(this, this.productId)
// });
// function removeWishList(element, product_id) {
//     $.ajax({
//         type: "get",
//         url: "/wishlist/remove",
//         data: {
//             product_id: product_id
//         },
//         success: function (response) {
//             element.classList.remove('added')
//             element.children[0].classList.remove('fa-heart')
//             element.children[0].classList.add('fa-heart-o')
//         }
//     });
// }



// function productAdded() {
    $(".quantity-Btn").on("click", function() {
      var $button = $(this);
      var $parent = $button.parent().parent(); 
      var oldValue = $parent.find('.input').val();
     
   
      if ($button.text() == "+") {
         var newVal = parseFloat(oldValue) + 1;
       } else {
          // Don't allow decrementing below zero
         if (oldValue > 1) {
           var newVal = parseFloat(oldValue) - 1;
           } else {
           newVal = 1;
         }
         }
       $parent.find('a.add-to-cart').attr('data-quantity', newVal);
       $parent.find('.input').val(newVal);
    });
//    };




   function removeWishList(element,product_id){
    $.ajax({
        type: "get",
        url: "/checklist/remove",
        data: {
            product_id: product_id
        },
        success: function (response) {
            element.closest(".wishlistitem").remove()
    
        }
    });
    }

    $("#idForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.
    console.log('asd');

    var form = $(this);
    var url = form.attr('action');
    console.log(url);
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           }
         });

    
});