<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::all();
        return view('admin.color_section.index', compact('colors'));
    }

    public function create(){
        return view('admin.color_section.create');
    }

    public function store(ColorFormRequest $request){
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Color::create($validatedData);

        return redirect('admin/color_section')->with('message', 'Color Added Successfully');
        
    }

    public function edit(Color $color){
        return view('admin.color_section.edit', compact('color'));
    }

    public function update(ColorFormRequest $request, $color_id){
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Color::Find($color_id)->update($validatedData);

        return redirect('admin/color_section')->with('message', 'Color Added Successfully');
    }

    public function destroy($color_id){
        $color = Color::findOrfail($color_id);
        $color->delete();
        return redirect('admin/color_section')->with('message', 'Color Deleted Successfully');
    }
}
