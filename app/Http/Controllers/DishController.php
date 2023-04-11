<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();
        $categories = Category::all();
        return view('dish.index', compact('dishes', 'categories'));
    }
    public function store(Request $req)
    {
        $validated_data = $req->validate([
            'name' => 'string',
            'price' => 'Integer',
            'count' => 'Integer',
            'category_id' => ''
        ]);
        $data = new Dish($validated_data);
        $files = $req->file("image");
        $name = $files->getClientOriginalName();
        $files->move('images', $name);


        $data->image_name = $name;
        $data->save();
        return redirect()->back();
    }
    public function edit($current_dish)
    {
        $current_dish = Dish::find($current_dish);
        $dishes = Dish::all();
        $categories = Category::all();
        return view('dish.edit', compact('dishes', 'categories', 'current_dish'));
    }
     public function update($id)
     {
        $validated_data = request()->validate([
            'name' => 'string',
            'price' => 'Integer',
            'count' => 'Integer',
            'category_id' => ''
        ]);
        $data = Dish::find($id);
        $data->update($validated_data);
        $files = request()->file("image");
        $name = $files->getClientOriginalName();
        $files->move('images', $name);
        return redirect()->route('menu.index');
    }

}
