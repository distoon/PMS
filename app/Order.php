<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'user_id','delivery_id','total_price','address',
    ];
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function getStateAttribute($value)
    {
      if($value == 0){
        return "In Progress";
      }
      if($value == 1){
        return "On the Way";
      }
      else return "Delivered";
    }
}
