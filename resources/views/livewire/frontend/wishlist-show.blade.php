<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">
                        
                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                {{-- <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div> --}}
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($wishlist as $wishlistItem)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="{{ url('collections/' .$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}">
                                            <label class="product-name">
                                                <img src="   {{ $wishlistItem->product->productImages[0]->image }}"
                                                    style="width: 50px; height: 50px"
                                                    alt="  {{ $wishlistItem->product->name }}">
                                                {{ $wishlistItem->product->name }}
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price">Rp {{ $wishlistItem->product->selling_price }} </label>
                                    </div>
                                    {{-- <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity">
                                            <div class="input-group">
                                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                                <input type="number" value="{{ $wishlistItem->quantity }}" class="input-quantity" />
                                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:click="removeWishlistItem({{ $wishlistItem->id }})" class="btn btn-danger btn-sm">
                                                <span wire:loading.remove wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                    <i class="fa fa-trash"></i> Remove
                                                </span>
                                                <span wire:loading wire:target="removeWishlistItem({{ $wishlistItem->id }})"> <i class="fa fa-trash"></i> Removing</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                           <h4>No Wishlist Added. Go shopping.</h4>
                        @endforelse

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
