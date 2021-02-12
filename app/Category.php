<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable = ['name'];

    public function getLists()
    {
        $categories = Category::orderBy('id','asc')->pluck('name', 'id');
     
        return $categories;
    }

    public function shops()
    {
        return $this->belongsToMany('App\Shop')->withTimestamps();
    }
}
