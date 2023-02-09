<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1, $productColorId;

    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Already added to Wishlist');
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                $this->emit('wishlistAddedUpdate');
                session()->flash('message', 'Succesfully added to Wishlist');
            }
        } else {
            session()->flash('message', 'Please, Login to Continue');
            return false;
        }
    }

    public function  addToCart($productId)
    {
        if (Auth::check()) {
            if ($this->product->where('id', $productId)->where('status', 0)->exists()) {
                if ($this->product->productColors()->count() > 1) {
                    $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();

                    if ($this->prodColorSelectedQuantity != NULL) {
                        if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->where('product_color_id', $this->productColorId)->exists()) {
                            session()->flash('message', 'Product already added.');
                        } else {
                            if ($productColor->quantity > 0) {
                                if ($productColor->quantity >= $this->quantityCount) {
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);
                                    $this->emit('cartAddedUpdate');
                                    session()->flash('message', 'Product added to cart');
                                } else {
                                    session()->flash('message', 'Only ' . $productColor->quantity . ' Available');
                                }
                            } else {
                                session()->flash('message', 'Out of Stock');
                            }
                        }
                    }else {
                        session()->flash('message', 'Select your product color.');
                    }
                } else {
                    if(Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()){
                        session()->flash('message', 'Product already added.');
                    }
                    else{

                   
                    if ($this->product->quantity > 0) {
                        if ($this->product->quantity >= $this->quantityCount) {
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productId,
                                'quantity' => $this->quantityCount
                            ]);
                            $this->emit('cartAddedUpdate');
                            session()->flash('message', 'Product added to cart');
                        } else {
                            session()->flash('message', 'Only ' . $this->product->quantity . ' Available');
                        }
                    } else {
                        session()->flash('message', 'Out of Stock');
                    }
                }
                }
            } else {
                session()->flash('message', 'Product does not exist');
            }
        } else {
            session()->flash('message', 'Please Login');
        }
    }

    // public function addToCart($productId)
    // {
    //     if (Auth::check()) {
    //         if ($this->product->where('id', $productId)->where('status', 0)->exists()) {
    //             if ($this->product->productColors()->count() > 1) {
    //                 if ($this->prodColorSelectedQuantity != NULL) {
    //                     if (Cart::where('user_id', auth()->user()->id)
    //                         ->where('product_id', $productId)
    //                         ->where('product_color_id', $this->productColorId)
    //                         ->exists()
    //                     ) {
    //                     } else {
    //                         $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
    //                         if ($this->product->quantity > 0) {
    //                             if ($productColor->quantity > $this->quantityCount) {
    //                                 Cart::create([
    //                                     'user_id' => auth()->user()->id,
    //                                     'product_id' => $productId,
    //                                     'product_color_id' => $this->productColorId,
    //                                     'quantity' => $this->quantityCount
    //                                 ]);
    //                                 session()->flash('message', 'Product added to cart');
    //                             } else {
    //                                 session()->flash('message', 'Only ' . $productColor->quantity . ' ' . $productColor->color->name . ' Available');
    //                             }
    //                         } else {
    //                             session()->flash('message', 'Only' . $this->product->quantity . 'Quantity Available');
    //                         }
    //                     }
    //                 } else {
    //                     session()->flash('message', 'Select your product color.');
    //                 }
    //             } else {
    //                 if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
    //                     session()->flash('message', 'Product already added');
    //                 } else {
    //                     if ($this->product->quantity > 0) {
    //                         if ($this->product->quantity > $this->quantityCount) {
    //                             Cart::create([
    //                                 'user_id' => auth()->user()->id,
    //                                 'product_id' => $productId,
    //                                 'quantity' => $this->quantityCount
    //                             ]);
    //                             session()->flash('message', 'Product added to cart');
    //                         }
    //                     }
    //                 }
    //             }
    //         } else {
    //             session()->flash('message', 'Please, Login to Continue');
    //             return false;
    //         }
    //     }
    // }

    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        } else {
            session()->flash('warning', 'Max quantity item is 10');
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 0) {
            $this->quantityCount--;
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
