<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Category;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class CategoryController extends Controller
{

    public function index(Category $category)
    {
        $categories = $category->getLists();
        $shops = Shop::all()->sortByDesc('created_at');
        return view('categories.index',[ 'shops'=>$shops, 'categories'=>$categories ]);
    }

    public function show(string $name)
    {
        $category = Category::where('name', $name)->first();
        return view('categories.show',['category'=>$category]);
    }
}
