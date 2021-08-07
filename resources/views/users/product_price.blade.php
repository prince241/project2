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
                        </div>
                    </div>
                </div>
            </div>
        
            @endforeach