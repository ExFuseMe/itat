<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();
        return view('dish.index', compact('dishes'));
    }
    public function create()
    {
        return view('dish.create');
    }
    public function store(Request $req)
    {
        $validated_data = $req->validate([
            'name' => 'string',
            'price' => '',
            'count' => ''
        ]);
        $data = new Dish($validated_data);
        $files = $req->file("image");
        $name = $files->getClientOriginalName();
        $files->move('images', $name);


        $data->image_name=$name;
        $data->save();
        return redirect()->back();
    }
    public function show($id)
    {
        $dish = Dish::FindOrFail($id);
        return view('dish.show', compact('dish'));
    }

}
