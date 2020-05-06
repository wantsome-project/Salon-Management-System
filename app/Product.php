<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App
 *
 * @property string  $type
 * @property string  $brand
 * @property integer $quantity
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
        'type',
        'brand',
        'quantity',
        'price',
    ];
}
