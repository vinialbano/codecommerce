<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

/**
 * CodeCommerce\Product
 *
 * @property-read \CodeCommerce\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\CodeCommerce\ProductImage[] $images
 * @property-read \Illuminate\Database\Eloquent\Collection|\CodeCommerce\Tag[] $tags
 * @property-read mixed $tag_list
 * @method static \CodeCommerce\Product featured()
 * @method static \CodeCommerce\Product recommended()
 * @method static \CodeCommerce\Product ofCategory($type)
 * @method static \CodeCommerce\Product ofTag($type)
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property boolean $featured
 * @property boolean $recommended
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $category_id
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Product whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Product whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Product whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Product wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Product whereFeatured($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Product whereRecommended($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Product whereCategoryId($value)
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
