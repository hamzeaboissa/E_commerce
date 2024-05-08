<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Carts;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $TotalPrice = 0;
    public function incrementQuantity(int $cartId)
    {
        $cartData = Carts::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only (' . $productColor->quantity . ') Quantity available',
                        'type' => 'error',
                        'status' => 200
                    ]);
                }
            } else {
                if ($cartData->product->quantity > $cartData->quantity) {

                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only (' . $cartData->product->quantity . ')Quantity available',
                        'type' => 'error',
                        'status' => 200
                    ]);
                }
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'something went wrong!',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }
    public function decrementQuantity(int $cartId)
    {
        $cartData = Carts::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity >= $cartData->quantity) {
                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only (' . $productColor->quantity . ') Quantity available',
                        'type' => 'error',
                        'status' => 200
                    ]);
                }
            } else {
                if ($cartData->product->quantity >= $cartData->quantity) {

                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only (' . $cartData->product->quantity . ')Quantity available',
                        'type' => 'error',
                        'status' => 200
                    ]);
                }
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'something went wrong!',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }
    public function removecartItem(int $cartId)
    {
        $CartRemovrData = Carts::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        if ($CartRemovrData) {
            $CartRemovrData->delete();

            $this->emit('CartAdded&Updated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'cart item removed',
                'type' => 'success',
                'status' => 200
            ]);
        } else {

            $this->dispatchBrowserEvent('message', [
                'text' => 'something worng',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }
    public function render()
    {
        $this->cart = Carts::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}
