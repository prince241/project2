
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
                    <style>
                        .FilterSec{
                            display: flex;
                            max-width: 200px;
                            width: 100%;
                            align-items: center;
                        }
                        .FilterSec select{
                            margin: 0px 10px;
                            min-width: 111px;
                        }
                        .FilterSec  .FilterInnerSec{
                            display: flex !important;
                            align-items: center;
                        }
                     </style>   

                      <div class="view-options FilterSec">
                          <select class="price-options form-control" id="ecommerce-price-options" onchange="sendAjax()" data-select2-id="ecommerce-price-options">  
                             <option value="asc" >Lowest</option>
                            <option value="desc">Highest</option>
                        </select>  
                        
                            </span>
                               <span class="dropdown-wrapper" aria-hidden="true"></span>
                            </span>  
                            <div class="view-btn-option FilterInnerSec">
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
             <div class="card ecommerce-card"> 
                <div class="card-content">
                   <div class="item-img text-center img-container">
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
                            <div class="wishlist {{ in_array($product->id, Auth::user()->wishLists->pluck('product_id')->toArray()) ? 'added' : '' }}" onclick="addWishList(this, {{ $product->id }})">
                                <i class="fa mr-25 {{ in_array($product->id, Auth::user()->wishLists->pluck('product_id')->toArray()) ? 'fa-heart' : 'fa-heart-o' }}"></i> Wishlist
                                   {{-- <div class="wishlist {{ in_array($product->id, Auth::user()->wishList->pluck('product_id')->toArray()) ? 'remove' : '' }}" >
                                </div>    --}}
                             </div>
                             <div class="cart" onclick="addToCart(this,{{ $product->id }})">
                                <i class="feather icon-shopping-cart mr-25"></i> <span class="add-to-cart">Add to cart</span> <a href="app-ecommerce-checkout.html" class="view-in-cart d-none">View In Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            
        
            @endforeach
</section>
{{ $products->links ('pagination') }} 
</div>
</div> 

<div class="sidebar-detached sidebar-left">
    <div class="sidebar">
        <!-- Ecommerce Sidebar Starts -->
        <div class="sidebar-shop" id="price-filter-range">

            <div class="row">
                <div class="col-sm-12">
                    <h6 class="filter-heading d-none d-lg-block">Filters</h6>
                </div>
            </div>
            <span class="sidebar-close-icon d-block d-md-none">
                <i class="feather icon-x"></i>
            </span>
            <div class="card">
                <div class="card-body">
                    <div class="multi-range-price">
                        <div class="multi-range-title pb-75">
                            <h6 class="filter-title mb-0">Multi Range</h6>
                        </div>
                        <ul class="list-unstyled price-range" id="price-range">
                            <li>
                                <span class="vs-radio-con vs-radio-primary py-25">
                                    <input type="radio" name="price-range" checked value="[null, null]">
                                    <span class="vs-radio">
                                        <span class="vs-radio--border"></span>
                                        <span class="vs-radio--circle"></span>
                                    </span>
                                    <span class="ml-50">All</span>
                                </span>
                            </li>
                            <li>
                                <span class="vs-radio-con vs-radio-primary py-25">
                                    <input type="radio" name="price-range" value="[0,10]">
                                    <span class="vs-radio">
                                        <span class="vs-radio--border"></span>
                                        <span class="vs-radio--circle"></span>
                                    </span>
                                    <span class="ml-50"> &lt;=10</span>
                                </span>
                            </li>
                            <li>
                                <span class="vs-radio-con vs-radio-primary py-25">
                                    <input type="radio" name="price-range" value="[10,100]">
                                    <span class="vs-radio">
                                        <span class="vs-radio--border"></span>
                                        <span class="vs-radio--circle"></span>
                                    </span>
                                    <span class="ml-50">10 - 100</span>
                                </span>
                            </li>
                            <li>
                                <span class="vs-radio-con vs-radio-primary py-25">
                                    <input type="radio" name="price-range" value="[100,500]">
                                    <span class="vs-radio">
                                        <span class="vs-radio--border"></span>
                                        <span class="vs-radio--circle"></span>
                                    </span>
                                    <span class="ml-50">100 - 500</span>
                                </span>
                            </li>
                            <li>
                                <span class="vs-radio-con vs-radio-primary py-25">
                                    <input type="radio" name="price-range" value="[500, 100000]">
                                    <span class="vs-radio">
                                        <span class="vs-radio--border"></span>
                                        <span class="vs-radio--circle"></span>
                                    </span>
                                    <span class="ml-50">&gt;= 500</span>
                                </span>
                            </li>

                        </ul>
                    </div>
                    
                    <!-- /Price Filter -->
                    
                    <!-- /Price Slider -->
                 
                    <div id="clear-filters">
                        <button class="btn btn-block btn-primary">CLEAR ALL FILTERS</button>
                    </div>
                    <!-- Clear Filters Ends -->

                </div>
            </div>
        </div>
        <!-- Ecommerce Sidebar Ends -->

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