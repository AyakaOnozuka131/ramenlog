<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Review;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ReviewController extends Controller
{
    public function create(Shop $shop)
    {
        $shops = $shop->getShopLists();

        return view('review.create',['shops'=>$shops]);
    }

    public function store(ReviewRequest $request, Review $review)
    {
        $file1 = $request->file('image_path1');
        $file2 = $request->file('image_path2');
        $file3 = $request->file('image_path3');

        if($request->has('image_path1')){
            $fileName1 = $file1->getClientOriginalName();
            $extension1 = $file1->getClientOriginalExtension();
            $image1 = Image::make($file1)->fit(320, 226)->encode($extension1);
            $path1 = Storage::disk('s3')->put('/review/'.$fileName1 , (string)$image1 , 'public');
            $fileName1 = Storage::disk('s3')->url('review/'.$fileName1);
        }else{
            $fileName1 = '';
        }
        
        if($request->has('image_path2')){
            $fileName2 = $file2->getClientOriginalName();
            $extension2 = $file2->getClientOriginalExtension();
            $image2 = Image::make($file2)->fit(320, 226)->encode($extension2);
            $path2 = Storage::disk('s3')->put('/review/'.$fileName2 , (string)$image2 , 'public');
            $fileName2 = Storage::disk('s3')->url('review/'.$fileName2);
        }else{
            $fileName2 = '';
        }

        if($request->has('image_path3')){
            $fileName3 = $file3->getClientOriginalName();
            $extension3 = $file3->getClientOriginalExtension();
            $image3 = Image::make($file3)->fit(320, 226)->encode($extension3);
            $path3 = Storage::disk('s3')->put('/review/'.$fileName3 , (string)$image3 , 'public');    
            $fileName3 = Storage::disk('s3')->url('review/'.$fileName3);
        }else{
            $fileName3 = '';
        }

        $review->fill($request->all());
        $review->user_id = $request->user()->id;
        $review->image_path1 = $fileName1;
        $review->image_path2 = $fileName2;
        $review->image_path3 = $fileName3;
        $review->save();
        return redirect()->route('users.show');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('users.show');
    }

    public function edit(Review $review, Shop $shop)
    {
        $shops = $shop->getShopLists();

        return view('review.edit',['review'=>$review, 'shops'=>$shops]);
    }

    public function update(ReviewRequest $request, Review $review)
    {
        $file1 = $request->file('image_path1');
        $file2 = $request->file('image_path2');
        $file3 = $request->file('image_path3');

        if( !is_null( $file1 ) ){
            $fileName1 = $file1->getClientOriginalName();
            $extension1 = $file1->getClientOriginalExtension();
            $image1 = Image::make($file1)->fit(320, 226)->encode($extension1);
            $path1 = Storage::disk('s3')->put('/review/'.$fileName1 , (string)$image1 , 'public');
            $review->image_path1 = Storage::disk('s3')->url('review/'.$fileName1);

        }elseif( !is_null( $file2 ) ){
            $fileName2 = $file2->getClientOriginalName();
            $extension2 = $file2->getClientOriginalExtension();
            $image2 = Image::make($file2)->fit(320, 226)->encode($extension2);
            $path2 = Storage::disk('s3')->put('/review/'.$fileName2 , (string)$image2 , 'public');

            $review->image_path2 = Storage::disk('s3')->url('review/'.$fileName2);

        }elseif( !is_null( $file3 ) ){
            $fileName3 = $file3->getClientOriginalName();
            $extension3 = $file3->getClientOriginalExtension();
            $image3 = Image::make($file3)->fit(320, 226)->encode($extension3);
            $path3 = Storage::disk('s3')->put('/review/'.$fileName3 , (string)$image3 , 'public');
    
            $review->image_path3 = Storage::disk('s3')->url('review/'.$fileName3);

        }
        $review->fill($request->all());
        $review->save();
        return redirect()->route('users.show');
    }

}
