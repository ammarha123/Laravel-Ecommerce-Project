<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Str;

class Checkoutshow extends Component
{
    public $carts, $totalProductAmount = 0;

    public $fullname, $email, $phone, $pincode, $address, $paymentMode = NULL, $paymentID = NULL;

    public function rules(){
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:13|min:10',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder(){
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no'=>'shit'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->paymentMode,
            'payment_id' => $this->paymentID
        ]);

        foreach($this->carts as $cartItem){
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id'  => $cartItem->product_color_id,
                'quantity'  => $cartItem->quantity,
                'price'  => $cartItem->product->selling_price
            ]);
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
            
            if($cartItem -> product_color_id != NULL){
                $cartItem->productColor()->where('id', $cartItem->product_color_id)->decrement('quantity',$cartItem->quantity);
            }
            else{
                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity',$cartItem->quantity);
            }
        }
        return $order;
       
    }
    public function codOrder(){
        $this->paymentMode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();
        if($codOrder){
            Cart::where('user_id', auth()->user()->id)->delete();
            session()->flash('message', 'Order Placed Successfully');
            return redirect()->to('thank-you');
        }

        else{
            session()->flash('message', 'Error.');
        }
    }
    public function totalProductAmount(){
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id) -> get();
        foreach($this->carts as $cartItem){
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }
    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkoutshow', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }
}
