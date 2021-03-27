<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shop_select' => 'required',
            'score' => 'required',
            'title' => 'required|max:255',
            'contents' => 'required|max:1000',
            'image_path1' => 'file|mimes:jpeg,bmp,png|max:5000',
            'image_path2' => 'file|mimes:jpeg,bmp,png|max:5000',
            'image_path3' => 'file|mimes:jpeg,bmp,png|max:5000'
        ];
    }

    public function attributes()
    {
        return [
            'shop_select' => 'お店の選択',
            'score' => '評価',
            'title' => 'タイトル',
            'contents' => '口コミ内容',
        ];
    }

}
