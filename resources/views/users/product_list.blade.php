@foreach ($products as $product)
       
        <div class="card ecommerce-card">
            <div class="card ecommerce-card">
                <div class="card-content">
                   
    
                    <div class="item-img text-center">
                        <img class="img-fluid" src="{{ '/images/'.$product->image }}" alt="img-placeholder">
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
                        <div class="wishlist {{ in_array($product->id, Auth::user()->wishLists->pluck('product_id')->toArray()) ? 'added' : '' }}" onclick="addWishList(this, {{ $product->id }})">
                            <i class="fa mr-25 {{ in_array($product->id, Auth::user()->wishLists->pluck('product_id')->toArray()) ? 'fa-heart' : 'fa-heart-o' }}"></i> Wishlist
                            {{-- <div class="wishlist {{ in_array($product->id, Auth::user()->wishList->pluck('product_id')->toArray()) ? 'remove' : '' }}" >
                            </div> --}}
                        </div>
                        <div class=""wishlist {{ in_array($product->id, Auth::user()->wishLists->pluck('product_id')->toArray()) ? 'added' : '' }}" onclick="addWishList(this, {{ $product->id }})"">
                            <i class="feather icon-shopping-cart mr-25"></i> <span class="add-to-cart">Add to cart</span>
                             <a href="{{ route('checklist.checkout') }}" class="view-in-cart d-none">View In Cart</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div> 
        
            @endforeach