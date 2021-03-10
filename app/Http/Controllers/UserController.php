<?php

namespace App\Http\Controllers;

use App\User;
use App\Shop;
use App\Category;
use App\Review;

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
        $registShops = $user->shops->sortByDesc('created_at');
        $categories = $category->getLists();

        return view('users.show',['user'=>$user, 'reviews'=>$reviews, 'registShops'=>$registShops, 'shops'=>$shops, 'categories'=>$categories]);
    }

    public function destroy(Shop $shop, Review $review)
    {
        $shop->delete();
        $review->delete();
        return redirect()->route('users.show');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('users.edit',['user'=>$user]);
    }

    public function update()
    {
        return view();
    }

}
