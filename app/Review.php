<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'shop_select',
        'score',
        'title',
        'contents',
        'image_path1',
        'image_path2',
        'image_path3'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}
