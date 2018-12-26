<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'ingredients', 'price_small', 'price_medium', 'price_large'];
    protected $dates = ['deleted_at'];

    public function orderitem()
    {
        return $this->belongsTo('App\Pizza')->withTrashed();
    }
}
