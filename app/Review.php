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
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function shops(): BelongsTo
    {
        return $this->belongsTo('App\Shop');
    }
}
