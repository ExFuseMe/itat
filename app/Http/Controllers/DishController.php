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
            'category_id' => 'Integer'
        ]);
        $data = new Dish($validated_data);
        $files = $req->file("image");
        if ($files == null) {
            $data->image_name = "default.webp";
        } else {
            $name = $files->getClientOriginalName();
            $files->move('images', $name);
            $data->image_name = $name;
        }
        $data->save();
        return redirect()->back();
    }
    public function edit(Dish $dish)
    {
        $dishes = dish::all();
        $categories = category::all();
        return view('dish.edit', compact('dishes', 'categories', 'dish'));
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
        $files = request()->file("image");
        if($files == null){
            $data->image_name = "default.webp";
        }else{
            $name = $files->getClientOriginalName();
            $files->move('images', $name);
        }
        $data->update($validated_data);
        return redirect()->route('dish.index');
    }
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dish.index');
    }
    public function show(Dish $dish)
    {
        dd($dish);
    }
}
