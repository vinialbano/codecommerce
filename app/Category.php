<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

/**
 * CodeCommerce\Category
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\CodeCommerce\Product[] $products
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Category whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Category whereUpdatedAt($value)
 */
class Category extends Model {

	protected $fillable = ['name', 'description'];

    public function products(){
        return $this->hasMany('CodeCommerce\Product');
    }

}
