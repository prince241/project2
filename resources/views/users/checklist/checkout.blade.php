@extends('users.layouts.app')
@section('content')

    {{-- <div class="content-detached content-right"> --}}


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
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <div class="shop-content-overlay"></div>   
         
           <form action="{{ route('wishlist.update') }}" method="POST" class="icons-tab-steps checkout-tab-steps wizard-circle">
            @csrf 
            <!-- Checkout Place order starts -->
            <h6><i class="step-icon step feather icon-shopping-cart"></i>Cart</h6>
            <fieldset class="checkout-step-1 px-0">
                <section id="place-order" class="list-view product-checkout">
                                
                    <div class="checkout-items">
                        @foreach ($products as $product)
                        <div class="card ecommerce-card wishlistitem">
                            <div class="card-content">
                                <div class="item-img text-center">
                                    <img class="img-fluid" src="{{ '/images/' . $product->image }}" alt="img-placeholder"/>
                                </div>
                               
                                    <div class="card-body">
                                        <div class="item-wrapper">
                                           
                                            <div class="item-rating">
                                                <div class="badge badge-primary badge-md">
                                                    <span>4</span> <i class="feather icon-star"></i>
                                                </div>
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
                                    
                                     <div class="item-name">
                                        <span>Amazon - Fire TV Stick with Alexa Voice Remote - Black</span>
                                        <p class="item-company">By <span class="company-name">Amazon</span></p>
                                        <p class="stock-status-in">In Stock</p>
                                    </div> 
                              
                                    <div class="item-quantity">     

                                        <p class="quantity-title">Quantity</p>
                                        <div class="input-group quantity-counter-wrapper bootstrap-touchspin"  id="product-1">
                                            <span
                                                class="input-group-btn input-group-prepend bootstrap-touchspin-injected">
                                                <button class="btn btn-primary bootstrap-touchspin-down button quantity-Btn"  type="button">-</button></span>
                                                <input type="number" class="input  quantity-counter form-control" value="1">
                                                <span class="input-group-btn input-group-append bootstrap-touchspin-injected"><button
                                             class="btn btn-primary bootstrap-touchspin-up button quantity-Btn"  type="button">+</button></span>
                                        </div>
                                    </div>
                                     <p class="delivery-date">Delivery by, Wed Apr 25</p>
                                    <p class="offers">17% off 4 offers Available</p> 
                                </div>
                                <div class="item-options text-center">
                                    <div class="item-wrapper">
                                        <div class="item-rating">
                                            <div class="badge badge-primary badge-md">
                                                4 <i class="feather icon-star ml-25"></i>
                                            </div>
                                        </div>
                                          <div class="item-cost">
                                            <h6 class="item-price">
                                                {{ $product->price }}
                                            </h6>
                                             <p class="shipping">
                                                <i class="feather icon-shopping-cart"></i> Free Shipping
                                            </p> 
                                        </div>  
                                    </div>
                                    <div class="wishlist remove-wishlist" onclick="removeWishList(this,{{ $product->id }})">
                                        <i class="feather icon-x align-middle"></i>Remove
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="checkout-options">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <p class="options-title">Options</p>
                                    <div class="coupons">
                                        <div class="coupons-title">
                                            <p>Coupons</p>
                                        </div>
                                        <div class="apply-coupon">
                                            <p>Apply</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="price-details">
                                        <p>Price Details</p>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-title">
                                            Total MRP
                                        </div>
                                        <div class="detail-amt">
                                            $598
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-title">
                                            Bag Discount
                                        </div>
                                        <div class="detail-amt discount-amt">
                                            -25$
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-title">
                                            Estimated Tax
                                        </div>
                                        <div class="detail-amt">
                                            $1.3
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-title">
                                            EMI Eligibility
                                        </div>
                                        <div class="detail-amt emi-details">
                                            Details
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-title">
                                            Delivery Charges
                                        </div>
                                        <div class="detail-amt discount-amt">
                                            Free
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="detail">
                                        <div class="detail-title detail-total">Total</div>
                                        <div class="detail-amt total-amt">$574</div>
                                    </div>
                                    <div class="btn btn-primary btn-block place-order waves-effect waves-light">
                                        PLACE ORDER</div>
                                </div>
                            </div>
                        </div>
                    </div> 

                </section>

                {{-- <section id="place-order" class="list-view product-checkout">
                    <div class="checkout-items">
                        <div class="card ecommerce-card">
                            <div class="card-content">
                                <div class="item-img text-center">
                                    <img src="../../../app-assets/images/pages/eCommerce/9.png" alt="img-placeholder">
                                </div>
                                <div class="card-body">
                                    <div class="item-name">
                                        <span>Amazon - Fire TV Stick with Alexa Voice Remote - Black</span>
                                        <p class="item-company">By <span class="company-name">Amazon</span></p>
                                        <p class="stock-status-in">In Stock</p>
                                    </div>
                                    <div class="item-quantity">
                                        <p class="quantity-title">Quantity</p>
                                        <div class="input-group quantity-counter-wrapper">
                                            <input type="text" class="quantity-counter" value="1">
                                        </div>
                                    </div>
                                    <p class="delivery-date">Delivery by, Wed Apr 25</p>
                                    <p class="offers">17% off 4 offers Available</p>
                                </div>
                                <div class="item-options text-center">
                                    <div class="item-wrapper">
                                        <div class="item-rating">
                                            <div class="badge badge-primary badge-md">
                                                4 <i class="feather icon-star ml-25"></i>
                                            </div>
                                        </div>
                                        <div class="item-cost">
                                            <h6 class="item-price">
                                                $39.99
                                            </h6>
                                            <p class="shipping">
                                                <i class="feather icon-shopping-cart"></i> Free Shipping
                                            </p>
                                        </div>
                                    </div>
                                    <div class="wishlist remove-wishlist">
                                        <i class="feather icon-x align-middle"></i> Remove
                                    </div>
                                    <div class="cart remove-wishlist">
                                        <i class="fa fa-heart-o mr-25"></i> Wishlist
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="checkout-options">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <p class="options-title">Options</p>
                                    <div class="coupons">
                                        <div class="coupons-title">
                                            <p>Coupons</p>
                                        </div>
                                        <div class="apply-coupon">
                                            <p>Apply</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="price-details">
                                        <p>Price Details</p>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-title">
                                            Total MRP
                                        </div>
                                        <div class="detail-amt">
                                            $598
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-title">
                                            Bag Discount
                                        </div>
                                        <div class="detail-amt discount-amt">
                                            -25$
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-title">
                                            Estimated Tax
                                        </div>
                                        <div class="detail-amt">
                                            $1.3
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-title">
                                            EMI Eligibility
                                        </div>
                                        <div class="detail-amt emi-details">
                                            Details
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-title">
                                            Delivery Charges
                                        </div>
                                        <div class="detail-amt discount-amt">
                                            Free
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="detail">
                                        <div class="detail-title detail-total">Total</div>
                                        <div class="detail-amt total-amt">$574</div>
                                    </div>
                                    <div class="btn btn-primary btn-block place-order">PLACE ORDER</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}
            </fieldset>
            <!-- Checkout Place order Ends -->

            <!-- Checkout Customer Address Starts -->
            <h6><i class="step-icon step feather icon-home"></i>Address</h6>
            <fieldset class="checkout-step-2 px-0">
                <section id="checkout-address" class="list-view product-checkout">
                    <div class="card">
                        <div class="card-header flex-column align-items-start">
                            <h4 class="card-title">Add New Address</h4>
                            <p class="text-muted mt-25">Be sure to check "Deliver to this address" when you have finished</p>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">hfhjfg
                                    <form  action="{{ route('wishlist.update') }}" id="idForm"  method="POST">
                                        @csrf
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="checkout-name">Full Name:</label>
                                            <input type="text" id="checkout-name" class="form-control required" name="name">
                                            @error('name')
                                            <i style="color: red; font-size:small">{{ $message }}</i>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="checkout-number">Mobile Number:</label>
                                            <input type="number" id="checkout-number" class="form-control required" name="mnumber">
                                            @error('number')
                                            <i style="color: red; font-size:small">{{ $message }}</i>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="checkout-apt-number">Flat, House No:</label>
                                            <input type="number" id="checkout-apt-number" class="form-control required" name="address">
                                            @error('apt-number')
                                            <i style="color: red; font-size:small">{{ $message }}</i>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="checkout-landmark">Landmark e.g. near apollo hospital:</label>
                                            <input type="text" id="checkout-landmark" class="form-control required" name="landmark">
                                            @error('landmark')
                                            <i style="color: red; font-size:small">{{ $message }}</i>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="checkout-city">Town/City:</label>
                                            <input type="text" id="checkout-city" class="form-control required" name="city">
                                            @error('city')
                                            <i style="color: red; font-size:small">{{ $message }}</i>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="checkout-pincode">Pincode:</label>
                                            <input type="number" id="checkout-pincode" class="form-control required" name="pincode">
                                            @error('pincode')
                                            <i style="color: red; font-size:small">{{ $message }}</i>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="checkout-state">State:</label>
                                            <input type="text" id="checkout-state" class="form-control required" name="state">
                                            @error('state')
                                            <i style="color: red; font-size:small">{{ $message }}</i>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="add-type">Address Type:</label>
                                            <select class="form-control" id="add-type">
                                                <option>Home</option>
                                                <option>Work</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 offset-md-6">
                                        <button class="btn btn-primary delivery-address float-right">
                                            SAVE AND DELIVER HERE
                                        </button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="customer-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">John Doe</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body actions">
                                    <p class="mb-0">9447 Glen Eagles Drive</p>
                                    <p>Lewis Center, OH 43035</p>
                                    <p>UTC-5: Eastern Standard Time (EST) </p>
                                    <p>202-555-0140</p>
                                    <hr>
                                    <div class="btn btn-primary btn-block delivery-address">DELIVER TO THIS ADDRESS</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </fieldset>

            <!-- Checkout Customer Address Ends -->

            <!-- Checkout Payment Starts -->
            <h6><i class="step-icon step feather icon-credit-card"></i>Payment</h6>
            <fieldset class="checkout-step-3 px-0">
                <section id="checkout-payment" class="list-view product-checkout">
                    <div class="payment-type">
                        <div class="card">
                            <div class="card-header flex-column align-items-start">
                                <h4 class="card-title">Payment options</h4>
                                <p class="text-muted mt-25">Be sure to click on correct payment option</p>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div class="vs-radio-con vs-radio-primary">
                                            <input type="radio" name="vueradio" checked="" value="false">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <img src="../../../app-assets/images/pages/eCommerce/bank.png" alt="img-placeholder" height="40">
                                            <span>US Unlocked Debit Card 12XX XXXX XXXX 0000
                                            </span>
                                        </div>
                                        <div class="card-holder-name mt-75">
                                            John Doe
                                        </div>
                                        <div class="card-expiration-date mt-75">
                                            11/2020
                                        </div>
                                    </div>
                                    <div class="customer-cvv mt-1">
                                        <div class="form-inline">
                                            <label class="mb-50" for="card-holder-cvv">Enter CVV:</label>
                                            <input type="number" class="form-control ml-75 mb-50 input-cvv" id="card-holder-cvv">
                                            <div class="btn btn-primary btn-cvv ml-50 mb-50">Continue</div>
                                        </div>
                                    </div>
                                    <hr class="my-2">
                                    <ul class="other-payment-options list-unstyled">
                                        <li>
                                            <div class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="vueradio" value="false">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span>
                                                    Credit / Debit / ATM Card
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="vueradio" value="false">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span>
                                                    Net Banking
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="vueradio" value="false">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span>
                                                    EMI (Easy Installment)
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="vueradio" value="false">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span>
                                                    Cash On Delivery
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                    <hr>
                                    <div class="gift-card">
                                        <p><i class="feather icon-plus-square mr-25 font-medium-5"></i>
                                            Add Gift Card
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="amount-payable checkout-options">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Price Details</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="details-title">
                                            Price of 3 items
                                        </div>
                                        <div class="detail-amt">
                                            <strong>$699.30</strong>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="details-title">
                                            Delivery Charges
                                        </div>
                                        <div class="detail-amt discount-amt">
                                            Free
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="detail">
                                        <div class="details-title">
                                            Amount Payable
                                        </div>
                                        <div class="detail-amt total-amt">$699.30</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </fieldset>

            <!-- Checkout Payment Starts -->
         </form>  

        <!-- Ecommerce Products Starts -->
        
         {{-- <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Checkout</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">eCommerce</a>
                                    </li>
                                    <li class="breadcrumb-item active">Checkout
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a
                                    class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <form action="#" class="icons-tab-steps checkout-tab-steps wizard-circle wizard clearfix" role="application"
                    id="steps-uid-0">
                    <div class="steps clearfix">
                        <ul role="tablist">
                            <li role="tab" class="first current" aria-disabled="false" aria-selected="true"><a
                                    id="steps-uid-0-t-0" href="#steps-uid-0-h-0" aria-controls="steps-uid-0-p-0"><span
                                        class="current-info audible">current step: </span><span class="step">1</span> <i
                                        class="step-icon  feather icon-shopping-cart"></i>Cart</a></li>
                            <li role="tab" class="disabled" aria-disabled="true"><a id="steps-uid-0-t-1"
                                    href="#steps-uid-0-h-1" aria-controls="steps-uid-0-p-1"><span class="step">2</span> <i
                                        class="step-icon  feather icon-home"></i>Address</a></li>
                            <li role="tab" class="disabled last" aria-disabled="true"><a id="steps-uid-0-t-2"
                                    href="#steps-uid-0-h-2" aria-controls="steps-uid-0-p-2"><span class="step">3</span> <i
                                        class="step-icon  feather icon-credit-card"></i>Payment</a></li>
                        </ul>
                    </div>
                    <div class="content clearfix">
                        <!-- Checkout Place order starts -->
                        <h6 id="steps-uid-0-h-0" tabindex="-1" class="title current"><i
                                class="step-icon step feather icon-shopping-cart"></i>Cart</h6>
                        <fieldset class="checkout-step-1 px-0 body current" id="steps-uid-0-p-0" role="tabpanel"
                            aria-labelledby="steps-uid-0-h-0" aria-hidden="false">

                        </fieldset>
                        <!-- Checkout Place order Ends -->

                        <!-- Checkout Customer Address Starts -->
                        <h6 id="steps-uid-0-h-1" tabindex="-1" class="title"><i
                                class="step-icon step feather icon-home"></i>Address</h6>
                        <fieldset class="checkout-step-2 px-0 body" id="steps-uid-0-p-1" role="tabpanel"
                            aria-labelledby="steps-uid-0-h-1" aria-hidden="true" style="display: none;">
                            <section id="checkout-address" class="list-view product-checkout">
                                <div class="card">
                                    <div class="card-header flex-column align-items-start">
                                        <h4 class="card-title">Add New Address</h4>
                                        <p class="text-muted mt-25">Be sure to check "Deliver to this address" when you have
                                            finished</p>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="checkout-name">Full Name:</label>
                                                        <input type="text" id="checkout-name" class="form-control required"
                                                            name="fname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="checkout-number">Mobile Number:</label>
                                                        <input type="number" id="checkout-number"
                                                            class="form-control required" name="mnumber">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="checkout-apt-number">Flat, House No:</label>
                                                        <input type="number" id="checkout-apt-number"
                                                            class="form-control required" name="apt-number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="checkout-landmark">Landmark e.g. near apollo
                                                            hospital:</label>
                                                        <input type="text" id="checkout-landmark"
                                                            class="form-control required" name="landmark">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="checkout-city">Town/City:</label>
                                                        <input type="text" id="checkout-city" class="form-control required"
                                                            name="city">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="checkout-pincode">Pincode:</label>
                                                        <input type="number" id="checkout-pincode"
                                                            class="form-control required" name="pincode">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="checkout-state">State:</label>
                                                        <input type="text" id="checkout-state" class="form-control required"
                                                            name="state">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="add-type">Address Type:</label>
                                                        <select class="form-control" id="add-type">
                                                            <option>Home</option>
                                                            <option>Work</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 offset-md-6">
                                                    <div
                                                        class="btn btn-primary delivery-address float-right waves-effect waves-light">
                                                        SAVE AND DELIVER HERE
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="customer-card">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">John Doe</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body actions">
                                                <p class="mb-0">9447 Glen Eagles Drive</p>
                                                <p>Lewis Center, OH 43035</p>
                                                <p>UTC-5: Eastern Standard Time (EST) </p>
                                                <p>202-555-0140</p>
                                                <hr>
                                                <div
                                                    class="btn btn-primary btn-block delivery-address waves-effect waves-light">
                                                    DELIVER TO THIS ADDRESS</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </fieldset>

                        <!-- Checkout Customer Address Ends -->

                        <!-- Checkout Payment Starts -->
                        <h6 id="steps-uid-0-h-2" tabindex="-1" class="title"><i
                                class="step-icon step feather icon-credit-card"></i>Payment</h6>
                        <fieldset class="checkout-step-3 px-0 body" id="steps-uid-0-p-2" role="tabpanel"
                            aria-labelledby="steps-uid-0-h-2" aria-hidden="true" style="display: none;">
                            <section id="checkout-payment" class="list-view product-checkout">
                                <div class="payment-type">
                                    <div class="card">
                                        <div class="card-header flex-column align-items-start">
                                            <h4 class="card-title">Payment options</h4>
                                            <p class="text-muted mt-25">Be sure to click on correct payment option</p>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between flex-wrap">
                                                    <div class="vs-radio-con vs-radio-primary">
                                                        <input type="radio" name="vueradio" checked="" value="false">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <img src="../../../app-assets/images/pages/eCommerce/bank.png"
                                                            alt="img-placeholder" height="40">
                                                        <span>US Unlocked Debit Card 12XX XXXX XXXX 0000
                                                        </span>
                                                    </div>
                                                    <div class="card-holder-name mt-75">
                                                        John Doe
                                                    </div>
                                                    <div class="card-expiration-date mt-75">
                                                        11/2020
                                                    </div>
                                                </div>
                                                <div class="customer-cvv mt-1">
                                                    <div class="form-inline">
                                                        <label class="mb-50" for="card-holder-cvv">Enter CVV:</label>
                                                        <input type="number" class="form-control ml-75 mb-50 input-cvv"
                                                            id="card-holder-cvv">
                                                        <div
                                                            class="btn btn-primary btn-cvv ml-50 mb-50 waves-effect waves-light">
                                                            Continue</div>
                                                    </div>
                                                </div>
                                                <hr class="my-2">
                                                <ul class="other-payment-options list-unstyled">
                                                    <li>
                                                        <div class="vs-radio-con vs-radio-primary py-25">
                                                            <input type="radio" name="vueradio" value="false">
                                                            <span class="vs-radio">
                                                                <span class="vs-radio--border"></span>
                                                                <span class="vs-radio--circle"></span>
                                                            </span>
                                                            <span>
                                                                Credit / Debit / ATM Card
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="vs-radio-con vs-radio-primary py-25">
                                                            <input type="radio" name="vueradio" value="false">
                                                            <span class="vs-radio">
                                                                <span class="vs-radio--border"></span>
                                                                <span class="vs-radio--circle"></span>
                                                            </span>
                                                            <span>
                                                                Net Banking
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="vs-radio-con vs-radio-primary py-25">
                                                            <input type="radio" name="vueradio" value="false">
                                                            <span class="vs-radio">
                                                                <span class="vs-radio--border"></span>
                                                                <span class="vs-radio--circle"></span>
                                                            </span>
                                                            <span>
                                                                EMI (Easy Installment)
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="vs-radio-con vs-radio-primary py-25">
                                                            <input type="radio" name="vueradio" value="false">
                                                            <span class="vs-radio">
                                                                <span class="vs-radio--border"></span>
                                                                <span class="vs-radio--circle"></span>
                                                            </span>
                                                            <span>
                                                                Cash On Delivery
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <hr>
                                                <div class="gift-card">
                                                    <p><i class="feather icon-plus-square mr-25 font-medium-5"></i>
                                                        Add Gift Card
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="amount-payable checkout-options">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Price Details</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="detail">
                                                    <div class="details-title">
                                                        Price of 3 items
                                                    </div>
                                                    <div class="detail-amt">
                                                        <strong>$699.30</strong>
                                                    </div>
                                                </div>
                                                <div class="detail">
                                                    <div class="details-title">
                                                        Delivery Charges
                                                    </div>
                                                    <div class="detail-amt discount-amt">
                                                        Free
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="detail">
                                                    <div class="details-title">
                                                        Amount Payable
                                                    </div>
                                                    <div class="detail-amt total-amt">$699.30</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </fieldset>

                        <!-- Checkout Payment Starts -->
                    </div>
                </form>

            </div>
        </div>  --}}

     </div> 

        @endsection 
{{-- 
         <section id="ecommerce-products" class="grid-view">
            @foreach ($products as $product)

                <div class="card ecommerce-card wishlistitem">
                    <div class="card ecommerce-card">
                        <div class="card-content">
                            <div class="item-img text-center">
                                <img class="img-fluid" src="{{ '/images/' . $product->image }}" alt="img-placeholder" />
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
                                    <div class="wishlist remove-wishlist"
                                        onclick="removeWishList(this,{{ $product->id }})">
                                        <i class="feather icon-x align-middle"></i>Remove
                                    </div>

                                    <div class="cart move-cart" onclick="addToCart(this,{{ $product->id }})">
                                        <i class="feather icon-shopping-cart"></i> <span
                                            class="move-to-cart">wishlist</span>
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

@endsection  --}}
