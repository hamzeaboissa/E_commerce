<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status, $brand_id, $category_id;
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100',
            'category_id' => 'required|integer',
            'status' => 'nullable'
        ];
    }
    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
        $this->category_id = NULL;
    }
    public function storebrand()
    {
        $validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
            'category_id' => $this->category_id
        ]);
        session()->flash('message', 'Brand added successfuly');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function closeModal()
    {
        $this->resetInput();
    }
    public function openModal()
    {
        $this->resetInput();
    }
    public function editbrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->category_id = $brand->category_id;
    }

    public function updatebrand()
    {
        $validatedData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
            'category_id' => $this->category_id
        ]);
        session()->flash('message', 'Brand update successfuly');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function deletebrand($brand_id)
    {
        $this->brand_id = $brand_id;
    }
    public function destroybrand()
    {
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Brand deleted successfuly');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function render()
    {
        $categories = Category::where('status', '0')->get();
        $brands = Brand::orderBy('id', 'DESC')->Paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands, 'categories' => $categories])
            ->extends('layouts.admin')->section('content');
    }
}
