<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Category;

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
        if($request->has('image_path1')){
            $fileName = $this->saveAvatar($request->file('image_path1'));
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
            $fileName = $this->saveAvatar($request->file('image_path1'));
            $shop->image_path1 = $fileName;
        }
        $shop->fill($request->all());
        $shop->categories()->detach();
        $categories = $request->category_id;
        $shop->categories()->attach($categories);
        $shop->save();
        return redirect()->route('shops.index');
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
        Image::make($file)->fit(200, 200)->save($tempPath); //Intervention Imageを使用して、画像をリサイズ後、一時ファイルに保存。
        $filePath = Storage::disk('public')->putFile('shopImages', new File($tempPath)); //Storageファサードを使用して画像をディスクに保存
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

    public function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->route('shops.index');
    }

    public function show(Shop $shop)
    {
        return view('shops.show',['shop'=>$shop]);
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
