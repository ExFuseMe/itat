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

    public function destroy(){
        dd('123');
    }
    public function update(){
        dd('312');
    }
}
