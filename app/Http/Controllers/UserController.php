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
            $fileName = $this->saveAvatar($request->file('avatar'));
            $user->avatar = $fileName;
        }

        $user->fill($request->all());
        $user->save();
        return redirect()->route('users.show');
    }

    /**
      * アバター画像をリサイズして保存します
      *
      * @param UploadedFile $file アップロードされたアバター画像
      * @return string ファイル名
      */

      private function saveAvatar(UploadedFile $file): string
      {
          $tempPath = $this->makeTempPath(); //一時ファイルを生成してパスを取得する
          Image::make($file)->fit(300, 300)->save($tempPath); //Intervention Imageを使用して、画像をリサイズ後、一時ファイルに保存。
          $filePath = Storage::disk('public')->putFile('userImages', new File($tempPath)); //Storageファサードを使用して画像をディスクに保存
          return basename($filePath); //パスの最後にある名前の部分を返す
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

}
