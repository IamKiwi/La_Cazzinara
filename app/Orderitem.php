<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orderitem extends Model
{
    use SoftDeletes;
    protected $fillable = ['id_order', 'id_pizza', 'quantity', 'size', 'price', 'created_at'];
    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function pizza()
    {
        return $this->hasMany('App\Pizza', 'id', 'id_pizza')->withTrashed();
    }
}
