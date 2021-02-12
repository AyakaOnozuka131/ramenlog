<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Shop extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'explanation',
        'address',
        'tel',
        'holiday',
        'seats',
        'traffic',
        'business_hours',
        'parking',
        'parking_map',
        'parking2',
        'parking_map2',
        'facility',
        'other',
        'image_path1'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User','likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool //?をつけるとnullが許容される
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id) : false;
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

}
