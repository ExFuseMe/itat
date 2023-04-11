<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class ReportController extends Controller
{
    public function index(){
        $dishes = Dish::all('id');
        $prices = 0;
        foreach($dishes as $dish){
            $count = Dish::select('count')->where('id', $dish->id)->get()[0]->count;
            $price = Dish::select('price')->where('id', $dish->id)->get()[0]->price;
            $prices += $count * $price;
        }
        return view('report.index', compact('prices'));
    }
}
