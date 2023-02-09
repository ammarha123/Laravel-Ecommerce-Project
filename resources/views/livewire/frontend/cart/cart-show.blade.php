<div>
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
                            <h4>My Cart</h4>
                            <hr>
                            
                            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Products</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Price</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Quantity</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Total</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Remove</h4>
                                    </div>
                                </div>
                            </div>
                            @forelse ($cartlist as $cartlistItem)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-4 my-auto">
                                            <a href="{{ url('collections/' .$cartlistItem->product->category->slug.'/'.$cartlistItem->product->slug) }}">
                                                <label class="product-name">
                                                    @if ($cartlistItem->product->productImages)
                                                    <img src="   {{ $cartlistItem->product->productImages[0]->image }}"
                                                    style="width: 50px; height: 50px"
                                                    alt="  {{ $cartlistItem->product->name }}">
                                                    @else
                                                    <img src="" style="width: 50px; height: 50px" alt="">
                                                    @endif
                                                    
                                                    {{ $cartlistItem->product->name }}

                                                    @if ($cartlistItem->productColor)
                                                        @if ($cartlistItem->productColor->color)
                                                        <span>- Color: {{ $cartlistItem->productColor->color->name }}</span>
                                                        @endif
                                                    @endif
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">Rp {{ $cartlistItem->product->selling_price }} </label>
                                        </div>
                                        <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn1" wire:click="decrementQuantity({{ $cartlistItem->id }})" wire:loading.attr="disable"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{ $cartlistItem->quantity }}" class="input-quantity" />
                                                    <button type="button" class="btn btn1" wire:click="incrementQuantity({{ $cartlistItem->id }})" wire:loading.attr="disable"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">Rp {{ $cartlistItem->product->selling_price * $cartlistItem->quantity }}</label>
                                            @php
                                                $totalPrice += $cartlistItem->product->selling_price * $cartlistItem->quantity 
                                            @endphp
                                        </div>
                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:click="removecartlistItem({{ $cartlistItem->id }})" class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove wire:target="removecartlistItem({{ $cartlistItem->id }})">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </span>
                                                    <span wire:loading wire:target="removecartlistItem({{ $cartlistItem->id }})"> <i class="fa fa-trash"></i> Removing</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                               <h4>No cartlist Added. Go shopping.</h4>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 my-md-auto mt-3">
                        <h5>
                            Get the best deals & offers <a href="{{ url('/collections') }}">shop now</a>
                        </h5>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="shadow-sm bg-white p-3">
                            <h4>Total: 
                                <span class="float-end">Rp {{ $totalPrice }}</span>
                            </h4>
                            <hr>
                            <a href="{{ url('/checkout') }}" class="btn btn-warning w-100">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
