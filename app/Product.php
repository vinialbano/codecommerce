<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

/**
 * CodeCommerce\Product
 *
 */
class Product extends Model
{

    protected $fillable = ['name', 'description', 'price', 'featured', 'recommended', 'category_id'];

    public function category() {
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function images() {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function tags() {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    public function getTagListAttribute() {
        $tags = $this->tags->lists('name');
        return implode(', ', $tags);
    }

}
