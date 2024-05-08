<?php

namespace App\Http\Livewire\Frontend\Ckeckout;

use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Livewire\Component;

class CkeckoutShow extends Component
{
    public $carts, $TotalProductAmount = 0;
    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;
    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' =>    'required|string|max:15|min:10',
            'pincode' =>  'required|string|max:6|min:6',
            'address' =>  'required|string|max:500',
        ];
    }
    public function placeOrder()
    {

        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'fund-' . Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'paymant_mode' => $this->payment_mode,
            'paymant_id' => $this->payment_id
        ]);


        foreach ($this->carts as $CartItem) {

            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $CartItem->product_id,
                'product_color_id' => $CartItem->product_color_id,
                'quantity' => $CartItem->quantity,
                'price' => $CartItem->product->salling_price

            ]);
            if ($CartItem->product_color_id != NULL) {
                $CartItem->productColor()->where('id', $CartItem->product_color_id)->decrement('quantity', $CartItem->quantity);
            } else {
                //ما اشتغلت عند البروداكت
                $CartItem->product()->where('id', $CartItem->product_id)->decrement('quantity', $CartItem->quantity);
            }
        }
        return $order;
    }
    public function codOrder() //cash on delivery function
    {
        /* $validateData =  $this->validate(); */
        $this->payment_mode = 'cash on delivery';
        $codOrder = $this->placeOrder();

        if ($codOrder) {
            Carts::where('user_id', auth()->user()->id)->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order placed successfuly',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        } else {

            $this->dispatchBrowserEvent('message', [
                'text' => 'someting went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }
    public function totalproductAmount()
    {
        $this->TotalProductAmount = 0;
        $this->carts = Carts::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $CartItem) {
            $this->TotalProductAmount += $CartItem->product->salling_price * $CartItem->quantity;
        }
        return $this->TotalProductAmount;
    }
    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->phone = auth()->user()->userDetail->Phone;
        $this->address = auth()->user()->userDetail->address;
        $this->pincode = auth()->user()->userDetail->Pin_Code;




        $this->TotalProductAmount = $this->totalproductAmount();
        return view('livewire.frontend.ckeckout.ckeckout-show', [
            'TotalProductAmount' => $this->TotalProductAmount
        ]);
    }
}
