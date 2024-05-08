<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistCount extends Component
{
    public $wishlistCount;

    protected $listeners = ['wishlistadd&update' => 'checkWishllistCount'];
    public function checkWishllistCount()
    {
        if (Auth::check()) {
            return $this->wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            return $this->wishlistCount = 0;
        }
    }
    public function render()
    {
        $this->wishlistCount = $this->checkWishllistCount();
        return view('livewire.frontend.wishlist.wishlist-count', [
            'wishlistCount' => $this->wishlistCount
        ]);
    }
}
