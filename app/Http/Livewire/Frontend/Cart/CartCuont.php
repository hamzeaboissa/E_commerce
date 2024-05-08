<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Carts;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCuont extends Component
{
    public $CartCuont;
    protected $listeners = ['CartAdded&Updated' => 'CartCountCheck'];
    public function CartCountCheck()
    {
        if (Auth::check()) {
            return $this->CartCuont = Carts::where('user_id', auth()->user()->id)->count();
        } else {
            return $this->CartCuont = 0;
        }
    }
    public function render()
    {
        $this->CartCuont = $this->CartCountCheck();
        return view('livewire.frontend.cart.cart-cuont', [
            'CartCuont' => $this->CartCuont
        ]);
    }
}
