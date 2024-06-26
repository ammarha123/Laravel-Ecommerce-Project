<div>
    <div class="row">
        <div class="col-md-3">
            @if ($category->brands)
            <div class="card">
                <div class="card-header">
                    <h4>
                        Brands
                    </h4>
                </div>
                <div class="card-body">
                    @foreach ($category->brands as $brandItem)
                    <label class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{ $brandItem->name }}"> {{ $brandItem->name }}
                    </label>
                    @endforeach
                   
                </div>
            </div>
            @endif
            <div class="card mt-3">
                <div class="card-header">
                    <h4>
                        Price
                    </h4>
                </div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low"> High to Low
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high"> Low to High
                    </label> 
                </div>
            </div>
            
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $productItem)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                @if ($productItem->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>      
                                @else
                                <label class="stock bg-danger">Out of Stock</label>                      
                                @endif
                                @if ($productItem->productImages->count() > 0)
                                <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}" style="width: 100%; height: 300px">
                                @endif
                                </a>
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand}}</p>
                                <h5 class="product-name">
                                   <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                        {{ $productItem ->name }}
                                   </a>
                                </h5>
                                <div>
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                    <span class="selling-price">Rp {{ $productItem->selling_price }}</span>
                                    {{-- <span class="original-price">Rp {{ $productItem->original_price }}</span> --}}
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <a href="" class="btn btn1">Add To Cart</a>
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" class="btn btn1"> View </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>
                                No Available Products for {{ $category->name }}
                            </h4>
                        </div>
                    </div>
                        
                    @endforelse
            </div>
        </div>
    </div>
    
</div>
