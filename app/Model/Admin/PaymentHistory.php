<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    protected $table = 'payment_history';
    public $timestamps = true;
}
