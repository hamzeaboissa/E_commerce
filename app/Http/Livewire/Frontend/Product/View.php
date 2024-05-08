<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Carts;
use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{

    public function AddToWishlist($productId)
    {


        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'already added');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'already added',
                    'type' => 'error',
                    'status' => 409
                ]);
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistadd&update');
                session()->flash('message', 'added successfuly');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'added successfuly',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            //session()->flash('message', 'plese login first');
            $this->dispatchBrowserEvent('message', [
                'text' => 'plese login first',
                'type' => 'info',
                'status' => 401
            ]);
            return  /* false; */  redirect('admin/Products')->with('message', 'login first');
        }
    }
    public $category, $product, $productcolorselectedquantity, $quantityCuont = 1, $productColorId;

    public function colorselected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->ProductColors()->where('id', $productColorId)->first();
        $this->productcolorselectedquantity = $productColor->quantity;
        // dd($productColorId);
        if ($this->productcolorselectedquantity == 0) {
            $this->productcolorselectedquantity = 'outofstock';
        }
    }

    public function decrmintqut()
    {
        if ($this->quantityCuont > 1) {

            $this->quantityCuont--;
        }
    }

    public function incrmintqut()
    {
        if ($this->quantityCuont < 10) {
            $this->quantityCuont++;
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function addToCard(int $productId)
    {
        if (Auth::check()) {
            // dd($productId);
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {

                /* color check */
                if ($this->product->ProductColors()->count() > 1) {
                    //  dd('product color insrert');
                    if ($this->productcolorselectedquantity != NULL) {
                        //dd('color selected');
                        if (carts::where('user_id', auth()->user()->id)
                            ->where('product_id', $productId)
                            ->where('product_color_id', $this->productColorId)
                            ->exists()
                        ) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'alrady added to cart',
                                'type' => 'warning',
                                'status' => 200
                            ]);
                        } else {


                            $productColor = $this->product->ProductColors()->where('id', $this->productColorId)->first();
                            if ($productColor->quantity > 0) {
                                if ($productColor->quantity > $this->quantityCuont) {
                                    //isert product to card
                                    //dd('add to card with color');
                                    Carts::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCuont,
                                    ]);
                                    $this->emit('CartAdded&Updated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'product added to cart',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'only ' . $this->product->quantity . ' quantity avilable',
                                        'type' => 'error',
                                        'status' => 404
                                    ]);
                                }
                            } else {
                                //(user quan > org Quan)
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'out of stock  ',
                                    'type' => 'error',
                                    'status' => 404
                                ]);
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'select your product color ',
                            'type' => 'info',
                            'status' => 404
                        ]);
                    }
                } else {
                    if (carts::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'alrady added to cart',
                            'type' => 'warning',
                            'status' => 200
                        ]);
                    } else {


                        //dd('add without color');
                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity > $this->quantityCuont) {
                                //isert product to card
                                // dd('add to card without color');
                                Carts::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCuont,
                                ]);
                                $this->emit('CartAdded&Updated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'product added to cart',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'only (' . $this->product->quantity . ') quantity avilable',
                                    'type' => 'error',
                                    'status' => 404
                                ]);
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'out of stouk',
                                'type' => 'error',
                                'status' => 404
                            ]);
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'product dosr not exist',
                    'type' => 'error',
                    'status' => 404
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'login first',
                'type' => 'error',
                'status' => 400
            ]);
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product,

        ]);
    }
}
