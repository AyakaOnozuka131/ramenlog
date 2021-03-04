<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Category $category)
    {
        $username = Auth::user()->name;
        $user = User::where('name', $username)->first();
        $reviews = $user->reviews->sortByDesc('created_at');
        $shops = $user->likes->sortByDesc('created_at');
        $categories = $category->getLists();

        return view('users.show',['user'=>$user, 'reviews'=>$reviews, 'shops'=>$shops, 'categories'=>$categories]);
    }

}
