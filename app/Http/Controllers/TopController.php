<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Category;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index(){
        $shops = Shop::take(4)->get()->sortByDesc('created_at');
        $category = new Category;
        $categories = $category->getLists()->prepend('選択', '');
        return view('top.index',['shops'=>$shops,'categories'=>$categories]);
    }
}
