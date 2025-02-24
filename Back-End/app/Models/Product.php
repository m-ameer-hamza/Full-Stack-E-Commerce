<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'category',
        'image',
        'isFeatured',
    ];

    public function getLocalImagePathAttribute ()
    {
        return '/storage/images/products/' . $this->image . '.png';
    }
}
