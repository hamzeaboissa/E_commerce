<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;

class ColerController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }
    public function create()
    {
        return view('admin.colors.create');
    }
    public function store(ColorFormRequest $request)
    {
        $ValidatedData = $request->validated();
        $ValidatedData['status'] = $request->status == true ? '1' : '0';
        Color::create($ValidatedData);
        return redirect('admin/colors')->with('message', 'Color added successfuly');
    }
    public function edit(color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }
    public function update(ColorFormRequest $request, $color_id)
    {
        $ValidatedData = $request->validated();
        $ValidatedData['status'] = $request->status == true ? '1' : '0';
        Color::findorfail($color_id)->update($ValidatedData);
        return redirect('admin/colors')->with('message', 'Color update successfuly');
    }
    public function destroy($color_id)
    {
        $color = Color::findorfail($color_id);
        $color->delete();
        return redirect('admin/colors')->with('message', 'Color deleted successfuly');
    }
}
