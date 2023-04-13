<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function store(Request $req)
    {

        try {
            $validated_data = $req->validate([
                'name' => 'string',
            ]);
            $data = new Category($validated_data);
            $data->save();
            return redirect()->back();
        } catch (\Illuminate\Database\QueryException $ex) {
            $err = $ex->getMessage();
            return redirect()->back()->with($err);
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');

    }
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('category.edit', compact('category', 'categories'));
    }
    public function update(Category $category){
        $validated_data = request()->validate([
            'name' => 'string',
        ]);
        $category->update($validated_data);
        return redirect()->route('category.index');
    }
}
