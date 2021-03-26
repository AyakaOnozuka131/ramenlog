<?php

namespace App\Http\Controllers;

use App\User;
use App\Shop;
use App\Category;
use App\Review;

use App\Http\Requests\ShopRequest;
use Illuminate\Http\Request;

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ShopController extends Controller
{
    public function index(Request $request, Category $category){
        $categories = $category->getLists();
        $category_id = $request->category_id;
        $query = Shop::query();

        if( $request->filled('category_id')){
            $shops = $query->where('category_id', $category_id)->orderBy('created_at','asc')->paginate(9);

        }elseif($request->filled('keyword')){
            $keyword = '%' . $this->escape($request->input('keyword')) . '%';
            $shops = $query->where(function($query) use ($keyword){
                $query->where('name','LIKE',$keyword);
                $query->orWhere('explanation','LIKE',$keyword);
            })
            ->paginate(9);

        }else{
            $shops = Shop::orderBy('created_at','asc')->paginate(9);
        }
        return view('shops.index',['shops'=>$shops,'categories'=>$categories,'category_id'=>$category_id]);
    }

    private function escape(string $value)
    {
        return str_replace(
            ['\\', '%', '_'],
            ['\\\\', '\\%', '\\_'],
            $value
        );
    }

    public function create(Category $category){
        $categories = $category->getLists()->prepend('選択', '');
        return view('shops.create',['categories'=>$categories]);
    }

    public function store(ShopRequest $request , Shop $shops)
    {
        $file = $request->file('image_path1');
        $fileName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $image = Image::make($file)->fit(320, 226)->encode($extension);
        $path = Storage::disk('s3')->put('/shop/'.$fileName , (string)$image , 'public');


        if($request->has('image_path1')){
            $fileName = Storage::disk('s3')->url('shop/'.$fileName);
        }else{
            $fileName = '';
        }
        $shops->fill($request->all());
        $shops->user_id = $request->user()->id;
        $shops->image_path1 = $fileName;
        $shops->save();
        $categories = $request->category_id;
        $shops->categories()->attach($categories);
        return redirect()->route('shops.index');
    }

    public function edit(Shop $shop,Category $category){
        $categories = $category->getLists();
        // compactかwithメゾットでも良い
        return view('shops.edit',['shop'=>$shop,'categories'=>$categories]);
        
    }

    public function update(ShopRequest $request , Shop $shop)
    {
        $file = $request->file('image_path1');
        
        if( !is_null( $file ) ){
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $image = Image::make($file)->fit(320, 226)->encode($extension);
            $path = Storage::disk('s3')->put('/shop/'.$fileName , (string)$image , 'public');
            $shop->image_path1 = Storage::disk('s3')->url('shop/'.$fileName);
        }
        $shop->fill($request->all());
        $shop->categories()->detach();
        $categories = $request->category_id;
        $shop->categories()->attach($categories);
        $shop->save();
        return redirect()->route('users.show');
    }


    public function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->route('users.show');
    }

    public function show(Shop $shop)
    {
        $shop_id = $shop->id;
        $reviews = Review::where('shop_select',$shop_id)->get();
        $user_id = $reviews->pluck('user_id')->first();
        $user = User::where('id',$user_id)->first();

        return view('shops.show',['shop'=>$shop, 'reviews'=>$reviews, 'user'=>$user]);
    }

    public function like(Request $request , Shop $shop)
    {
        $shop->likes()->detach($request->user()->id);
        $shop->likes()->attach($request->user()->id);

        return[
            'id' => $shop->id
        ];
    }

    public function unlike(Request $request , Shop $shop)
    {
        $shop->likes()->detach($request->user()->id);

        return[
            'id' => $shop->id
        ];
    }

}
