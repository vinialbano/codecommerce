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

    public function scopeFeatured($query){
        return $query->where('featured', '=', 1);
    }

    public function scopeRecommended($query) {
        return $query->where('recommended', '=', 1);
    }

    public function scopeOfCategory($query, $type){
        return $query->where('category_id','=', $type);
    }

    public function scopeOfTag($query, $type){
        return $query->whereHas('tags', function($q) use ($type){
            $q->where('id', '=', $type);
        });
    }

}
