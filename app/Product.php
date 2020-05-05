<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App
 *
 * @property string $product_type
 * @property string $product_brand
 * @property integer $price
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
        'product_type', 'product_brand', 'price',
    ];
}
