<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Class CustomerRequest
 * @package App
 * @property integer  $id
 * @property string   $name
 * @property string   $email
 * @property string   $phone
 * @property string   $subject
 * @property string   $message
 *
 */
class CustomerRequest extends Model
{
    protected $table ='customer_requests';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
    ];

}
