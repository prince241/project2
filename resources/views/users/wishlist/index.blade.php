
@extends('users.layouts.app')
@section('content') 

  <div class="content-detached content-right"> 

<div class="content-body">
    
    <!-- Ecommerce Content Section Starts -->
     <section id="ecommerce-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="ecommerce-header-items">
                    <div class="result-toggler">
                        <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
                            <span class="navbar-toggler-icon d-block d-lg-none"><i class="feather icon-menu"></i></span>
                        </button>
                         <div class="search-results">
                            16285 results found
                        </div> 
                    </div>
                      {{-- <div class="view-options">
                        <select class="price-options form-control" id="ecommerce-price-options">
                            <option selected>Featured</option>
                            <option value="1">Lowest</option>
                            <option value="2">Highest</option>
                        </select>
                        <div class="view-btn-option">
                            <button class="btn btn-white view-btn grid-view-btn active">
                                <i class="feather icon-grid"></i>
                            </button>
                            <button class="btn btn-white list-view-btn view-btn">
                                <i class="feather icon-list"></i>
                            </button>
                        </div>
                    </div>   --}}

                      <div class="view-options">
                          <select class="price-options form-control select2-hidden-accessible" id="ecommerce-price-options" onchange="sendAjax()" data-select2-id="ecommerce-price-options" tabindex="-1" aria-hidden="true">  
                             <option value="asc" >Lowest</option>
                            <option value="desc">Highest</option>
                        </select>  
                           <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 100%;">
                            <span class="selection">
                              <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ecommerce-price-options-container">
                                <span class="select2-selection__rendered" id="select2-ecommerce-price-options-container" role="textbox" aria-readonly="true" title="Featured">Featured</span> 
                                <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                            </span>  
                            </span>
                               <span class="dropdown-wrapper" aria-hidden="true"></span>
                            </span>  
                            <div class="view-btn-option">
                            <button class="btn btn-white view-btn grid-view-btn waves-effect waves-light active">
                                <i class="feather icon-grid"></i>
                            </button>
                            <button class="btn btn-white list-view-btn view-btn waves-effect waves-light">
                                <i class="feather icon-list"></i>
                            </button>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="shop-content-overlay"></div>  --}}
    <!-- background Overlay when sidebar is shown  ends-->


  
    
      <!-- Ecommerce Search Bar Starts -->
     <section id="ecommerce-searchbar">
        <div class="row mt-1">
            <div class="col-sm-12">
                <fieldset class="form-group position-relative">
                    <input type="text" class="form-control search-product" id="productSearch" placeholder="Search here">
                    <div class="form-control-position">
                        <i class="feather icon-search"></i>
                    </div>
                </fieldset>
            </div>
        </div>
    </section> 
    <!-- Ecommerce Search Bar Ends -->  


                    <!-- Ecommerce Products Starts -->
     <section id="ecommerce-products" class="grid-view">       
        @foreach ($products as $product)

         <div class="card ecommerce-card wishlistitem">
            <div class="card ecommerce-card">
                 <div class="card-content"> 
                   <div class="item-img text-center  img-container ">
                    <img class="img-fluid" src="{{ '/images/'.$product->image }}" alt="img-placeholder"/>
                      </div>
                    <div class="card-body">
                        <div class="item-wrapper">
                            <div class="item-rating">
                                <div class="badge badge-primary badge-md">
                                    <span>4</span> <i class="feather icon-star"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="item-price">
                                    {{ $product->price }}
                                </h6>
                            </div>
                        </div>
                        <div>
                            <p class="item-description">
                               {{ $product->description }}
                            </p>
                        </div>
                        <div>
                            <p class="item-size">
                               {{ $product->size }}
                            </p>
                        </div>
                        <div>
                            <p class="item-name">
                               {{ $product->name }}
                            </p>
                        </div>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <div class="badge badge-primary badge-md">
                                        <span>4</span> <i class="feather icon-star"></i>
                                    </div>
                                </div>
                                <div class="item-cost">
                                    <h6 class="item-price">  
                                        {{ $product->price }}
                                    </h6>
                                </div>
                            </div>
                            <div class="item-options text-center">
                                <div class="wishlist remove-wishlist" onclick="removeWishList(this,{{ $product->id }})">
                                    <i class="feather icon-x align-middle"></i>Remove
                                </div>
                                <div class="cart move-cart" onclick="addToCart(this,{{ $product->id }})">
                                    <i class="feather icon-shopping-cart"></i> <span class="move-to-cart">Move to cart</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div> 
        
            @endforeach
</section>

</div>
</div> 

  @endsection    
       
  
  <style>
    .img-container{
        /* border: 1px solid #ddd; */
      border-radius: 4px;
      /* padding: 5px; */
      width: 100px;
        margin: auto;
    }    
    
    </style>
    

