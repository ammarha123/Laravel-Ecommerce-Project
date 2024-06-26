@extends('layouts.app')

@section('title', 'Jastipinai')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{ $key == '0' ? 'active' : '' }}">
                    @if ($sliderItem->image)
                        <img src="{{ asset("$sliderItem->image") }}" class="d-block" style="width:100%;height:500px"
                            alt="...">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $sliderItem->title }}</h5>
                        <p>{{ $sliderItem->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome to Jastipinai.</h4>
                    <div class="underline mx-auto"></div>
                    <p>
                        Open Jastip Malaysia - Indonesia. Bisa CO Carousell, Shopee, atau web malaysia lainnya. <br>
                        ETA terdekat 13 April 2024.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>New Arrival</h4>
                    <div class="underline mb-5"></div>
                </div>
                <div class="col-md-4 text-end">
                    <a class="btn btn-warning" href="{{ url('newArrivals') }}">View More</a>
                </div>
                @if ($newArrivalProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($newArrivalProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">

                                                <label class="stock bg-danger">New</label>

                                                @if ($productItem->productImages->count() > 0)
                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}" style="width: 100%; height: 300px">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    <span class="selling-price">Rp {{ $productItem->selling_price }}</span>
                                                    {{-- <span class="original-price">Rp
                                                        {{ $productItem->original_price }}</span> --}}
                                                </a>
                                            </div>
                                            <div class="mt-2">
                                                <a href="" class="btn btn1">Add To Cart</a>
                                                <a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}"
                                                    class="btn btn1"> View </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>
                                No New Arrival Products Availablie
                            </h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="py-5 bg-white mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Trending Products</h4>
                    <div class="underline mb-5"></div>
                </div>
                @if ($trendingProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($trendingProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">

                                                <label class="stock bg-danger">New</label>

                                                @if ($productItem->productImages->count() > 0)
                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}" style="width: 100%; height: 300px">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    <span class="selling-price">Rp {{ $productItem->selling_price }}</span>
                                                    {{-- <span class="original-price">Rp
                                                        {{ $productItem->original_price }}</span> --}}
                                                </a>
                                            </div>
                                            <div class="mt-2">
                                                <a href="" class="btn btn1">Add To Cart</a>
                                                <a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}"
                                                    class="btn btn1"> View </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>
                                No Available Products Availablie
                            </h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>Featured Products</h4>
                    <div class="underline mb-5"></div>
                </div>
                <div class="col-md-4 text-end">
                    <a class="btn btn-warning" href="{{ url('featured-product') }}">View More</a>
                </div>
                @if ($featuredProduct)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($featuredProduct as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">

                                                <label class="stock bg-danger">New</label>

                                                @if ($productItem->productImages->count() > 0)
                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}" style="width: 100%; height: 300px">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    <span class="selling-price">Rp {{ $productItem->selling_price }}</span>
                                                    {{-- <span class="original-price">Rp
                                                        {{ $productItem->original_price }}</span> --}}
                                                </a>
                                            </div>
                                            <div class="mt-2">
                                                <a href="" class="btn btn1">Add To Cart</a>
                                                <a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}"
                                                    class="btn btn1"> View </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>
                                No Featured Products Availablie
                            </h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="..." class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('admin/images/faces/face3.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div> --}}
@endsection
@section('script')
    <script>
        $('.four-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dot:true,
            nav: false,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
