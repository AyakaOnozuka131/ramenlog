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
        if($request->has('image_path1')){
            $fileName1 = $this->saveImg($request->file('image_path1'));
        }else{
            $fileName1 = '';
        }
        
        if($request->has('image_path2')){
            $fileName2 = $this->saveImg($request->file('image_path2'));
        }else{
            $fileName2 = '';
        }

        if($request->has('image_path3')){
            $fileName3 = $this->saveImg($request->file('image_path3'));
        }else{
            $fileName3 = '';
        }

        $review->fill($request->all());
        $review->user_id = $request->user()->id;
        $review->image_path1 = $fileName1;
        $review->image_path2 = $fileName2;
        $review->image_path3 = $fileName3;
        $review->save();
        return redirect()->route('shop.index');
    }

    /**
     * 画像をリサイズして保存します
    *
    * @param UploadedFile $file アップロードされたアバター画像
    * @return string ファイル名
    */

    private function saveImg(UploadedFile $file): string
    {
        $tempPath = $this->makeTempPath();
        Image::make($file)->fit(200, 200)->save($tempPath);
        $filePath = Storage::disk('public')->putFile('reviewImages', new File($tempPath));
        return basename($filePath);
    }
  
    /**
     * 一時的なファイルを生成してパスを返します。
     *
    * @return string ファイルパス
    */

    private function makeTempPath(): string
    {
        $tmp_fp = tmpfile();
        $meta   = stream_get_meta_data($tmp_fp);
        return $meta["uri"];
    }

    public function edit(Review $review, Shop $shop)
    {
        $shops = $shop->getShopLists();

        return view('review.edit',['review'=>$review, 'shops'=>$shops]);
    }

}
