<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use SoftDeletes;
    protected $fillable = ['id_order', 'id_user', 'message', 'grade', 'public'];
    protected $table = 'feedbacks';
    protected $dates = ['dates'];

    public function order()
    {
        return $this->belongsTo('App\Order', 'id_order', 'id')->withTrashed();
    }

    public function user()
    {
        return $this->hasMany('App\User', 'id', 'id_user')->withTrashed();
    }
}
