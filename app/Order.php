<?php

namespace codecommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

  protected $fillable = [
      'user_id',
      'total',
      'status'
  ];

  public function items()
  {
      return $this->hasMany('codecommerce\OrderItem');
  }

  public function user()
  {
    return $this->belongsTo('codecommerce\User');
  }


}
