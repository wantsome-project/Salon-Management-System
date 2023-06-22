<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Customer
 * @package App
 * @property integer  $id
 * @property string   $phone
 * @property Service  $services
 * @property User     $user
 */

class Customer extends Model
{
    protected $table = "customers";
    protected $fillable = [
        'phone',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, "customer_id", "id");
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class, "customer_id", "id");
    }
}
