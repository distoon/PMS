<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemInventory extends Model
{
    protected $fillable = [
      'item_id','inventory_id','quantity',
    ];
}
