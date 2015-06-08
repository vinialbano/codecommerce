<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

/**
 * CodeCommerce\Tag
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\CodeCommerce\Product[] $products
 * @method static \CodeCommerce\Tag ofCategory($type)
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Tag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Tag whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Tag whereUpdatedAt($value)
 */
class Tag extends Model {

    protected $fillable = ['name'];

    public function products()
    {
        return $this->belongsToMany('CodeCommerce\Product');
	}

    public function scopeOfCategory($query, $type){
        return $query->whereHas('products.category', function($q) use ($type){
            $q->where('id', '=', $type);
        });
    }

}
