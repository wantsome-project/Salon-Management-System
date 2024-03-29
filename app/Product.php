<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App
 *
 * @property integer $id
 * @property string  $type
 * @property string  $brand
 * @property integer $quantity
 * @property integer $price
 * @property string  $photo_name
 */
class Product extends Model
{
    protected $table = "products";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'brand',
        'quantity',
        'price',
    ];
    public function getPhotoUrl(): string
    {
        return asset("assets/products_images/".$this->photo_name);
    }
}
