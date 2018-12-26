<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['id_user', 'total_price', 'status'];
    protected $dates = ['deleted_at'];

    public function orderitem()
    {
        return $this->hasMany('App\Orderitem', 'id_order')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user')->withTrashed();
    }

    public function feedback()
    {
        return $this->hasMany('App\Feedback', 'id_order')->withTrashed();
    }
}
