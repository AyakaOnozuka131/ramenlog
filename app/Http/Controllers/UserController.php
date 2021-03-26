<?php

namespace App\Http\Controllers;

use App\User;
use App\Shop;
use App\Category;
use App\Review;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        $user = User::find(auth()->id());
        return view('users.edit',['user'=>$user]);
    }

    public function update(UserRequest $request)
    {
        $user = User::find(auth()->id());
        $file = $request->file('avatar');

        if( !is_null( $file ) ){
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $image = Image::make($file)->fit(300, 300)->encode($extension);
            $path = Storage::disk('s3')->put('/avater/'.$fileName , (string)$image , 'public');
    
            $user->avatar = Storage::disk('s3')->url('avater/'.$fileName);
        }

        $user->fill($request->all());
        $user->save();
        return redirect()->route('users.show');
    }


}
