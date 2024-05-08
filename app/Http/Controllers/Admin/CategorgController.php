<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;

class CategorgController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function created()
    {
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request)
    {
        /*    $validatedData = $request->validated();
        $category = new Category;

        $category->name = $validatedData['name'];
        $category->slug = Str::Slug($validatedData['slug']);
        $category->description = $validatedData['description'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }


        $category->meta_title = $validatedData['meta_title'];

        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->save();
        return redirect('admin/category')->with('message', 'category add successfully'); */
        $validatedData = $request->validated();
        $category = new category();
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        $uploadPath = 'uploads/category/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/category/', $filename);
            $category->image = $uploadPath . $filename;
        }


        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->save();

        return redirect('admin/category')->with('message', 'Category Added Successfuliy');
    }
    public function edit(category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
    /*     public function update(CategoryFormRequest $request, $category)
    {
        $ValidatedData = $request->validated();
        $category = Category::findorfail($category);
        $category->name = $ValidatedData['name'];
        $category->slug = Str::Slug($ValidatedData['slug']);
        $category->description = $ValidatedData['description'];

        if ($request->hasFile('image')) {
            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $ValidatedData['meta_title'];

        $category->meta_keyword = $ValidatedData['meta_keyword'];
        $category->meta_description = $ValidatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->update();
        return redirect('admin/category')->with('message', 'updated successfully');
    } */
    public function update(CategoryFormRequest $request, $category)
    {
        $validatedData = $request->validated();
        $category = category::findOrFail($category);
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/category/';

            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/category/', $filename);
            $category->image = $uploadPath . $filename;
        }
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->update();
        return redirect('admin/category')->with('message', 'updated  successfully');
    }
}
