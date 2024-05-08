<?php

namespace App\Http\Livewire\Frontend\wishlist;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistShow extends Component
{

    public function removeWishlistItem(int $wishlistID)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlistID)->delete();
        $this->emit('wishlistadd&update');
        $this->dispatchBrowserEvent('message', [
            'text' => 'wishlist item deleted',
            'type' => 'error',
            'status' => 200
        ]);
    }
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }
}
