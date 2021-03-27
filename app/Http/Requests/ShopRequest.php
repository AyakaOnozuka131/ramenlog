<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'name' => 'required|max:50',
            'category_id' => 'required',
            'explanation' => 'required|max:255',
            'address' => 'required|max:255',
            'tel' => 'required|max:50',
            'holiday' => 'required|max:50',
            'seats' => 'required|max:50',
            'traffic' => 'required|max:50',
            'business_hours' => 'required|max:50',
            'parking' => 'required|max:255',
            'parking_map' => 'required|max:500',
            'parking2' => 'max:255',
            'parking_map2' => 'max:500',
            'facility' => 'required|max:255',
            'other' => 'required|max:255',
            'image_path1' => 'file|mimes:jpeg,bmp,png|max:5000',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '店舗名',
            'category_id' => 'カテゴリー',
            'explanation' => 'お店の説明',
            'address' => '住所',
            'tel' => '電話番号',
            'holiday' => '定休日',
            'seats' => '席数',
            'traffic' => '交通手段',
            'business_hours' => '営業時間',
            'parking' => '駐車場情報',
            'parking_map' => '駐車場 GOOGLE MAP',
            'facility' => '設備',
            'other' => 'その他・備考',
        ];
    }
}
