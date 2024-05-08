<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Color;
use App\Models\product;
use App\Models\ProductColors;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index()

    {
        $products = product::all();
        return view('admin.Products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', '0')->get();
        return view('admin.Products.create', compact('categories', 'brands', 'colors'));
    }
    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($validatedData['category_id']);

        $product = $category->Products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'orginal_price' => $validatedData['orginal_price'],
            'salling_price' => $validatedData['salling_price'],
            'quantity' => $validatedData['quantity'],
            'status' => $request->status == true ? '1' : '0',
            'traending' => $request->traending == true ? '1' : '0',
            'Featured' => $request->Featured == true ? '1' : '0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);


        /*    if ($request->hasFile('image')) {
            $uploadpath = 'uploads/Products/';
            foreach ($request->file('image') as  $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move($uploadpath, $filename);
                $finelimagepathname = $uploadpath . '-' . $filename;

                $product->ProductImage()->create([
                    'Product_id' => $product->id,
                    'image' => $finelimagepathname

                ]);
            }
        } */
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extention;
                $imageFile->move($uploadPath, $filename);
                $finalImagepathName = $uploadPath . $filename;

                $product->ProductImage()->create([

                    'product_id' => $product->id,
                    'image' => $finalImagepathName,

                ]);
            }
        }
        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->ProductColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0
                ]);
            }
        }
        return redirect('/admin/Products')->with('message', 'product added successfuly');
    }
    public function edit(int $Product_id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $Product = product::findOrFail($Product_id);
        $Product_color = $Product->ProductColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $Product_color)->get();
        return view('admin.Products.edit', compact('categories', 'brands', 'Product', 'colors'));
    }
    public function update(int $Product_id, ProductFormRequest $request)
    {
        $validatedData = $request->validated();
        $Product = Category::findOrFail($validatedData['category_id'])
            ->Products()->where('id', $Product_id)->first();
        if ($Product) {

            $Product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'orginal_price' => $validatedData['orginal_price'],
                'salling_price' => $validatedData['salling_price'],
                'quantity' => $validatedData['quantity'],
                'status' => $request->status == true ? '1' : '0',
                'traending' => $request->traending == true ? '1' : '0',
                'Featured' => $request->Featured == true ? '1' : '0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);
            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';
                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extention;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagepathName = $uploadPath . $filename;

                    $Product->ProductImage()->create([

                        'product_id' => $Product->id,
                        'image' => $finalImagepathName,

                    ]);
                }
            }
            if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $Product->ProductColors()->create([
                        'product_id' => $Product->id,
                        'color_id' => $color,
                        'quantity' => $request->colorquantity[$key] ?? 0
                    ]);
                }
            }
            return redirect('/admin/Products')->with('message', 'product updated successfuly');
        } else {
            return redirect('/admin/Products')->with('message', 'no product id found');
        }
    }
    public function destroyImage($product_image_id)
    {

        $ProductImage = ProductImage::findOrFail($product_image_id);
        if (File::exists($ProductImage->image)) {
            File::delete($ProductImage->image);
        }
        $ProductImage->delete();
        return redirect()->back()->with('message', 'product-image deleted successfuly');
    }
    public function destroy(int $Product_id)
    {
        $Product = product::findOrFail($Product_id);
        if ($Product->ProductImage) {
            foreach ($Product->ProductImage as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $Product->delete();
        return redirect()->back()->with('message', 'product deleted successfuly');
    }
    public function UpdateprodcolorQty(request $request, $prod_color_id)
    {
        $prodcolordata = product::findOrFail($request->product_id)
            ->ProductColors()->where('id', $prod_color_id)->first();
        $prodcolordata->update([
            'quantity' => $request->qty,
        ]);
        return response()->json(['message' => 'product color qty update']);
    }
    public function deleteprodcolor($prod_color_id)
    {
        $prodcolors = ProductColors::findorfail($prod_color_id);
        $prodcolors->delete();
        return response()->json(['message' => 'product color delete']);
    }
}
