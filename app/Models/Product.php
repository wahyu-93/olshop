<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'image', 'description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImage()
    {
        return 'images/'.$this->image;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
