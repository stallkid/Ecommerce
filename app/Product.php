<?php

namespace codecommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
      'category_id',
      'name',
      'description',
      'price',
      'featured',
      'recommended'
    ];

    public function images()
    {
        return $this->hasMany('codecommerce\ProductImage');
    }

    public function category()
    {
        return $this->belongsTo('codecommerce\Category');
    }

    public function tags()
    {
      return $this->belongsToMany('codecommerce\Tag');
    }

    public function getNameDescriptionAttribute(){
      return $this->name." - ".$this->description;
    }

    public function getTagListAttribute()
    {
      $tags = $this->tags->lists('name');

      return implode(',', $tags);
    }

    public function scopeFeatured($query)
    {
      return $query->where('featured', '=', 1);
    }

    public function scopeRecommended($query)
    {
      return $query->where('recommended', '=', 1);
    }

    public function scopeOfCategory($query, $type)
    {
      return $query->where('category_id','=', $type);
    }

}
