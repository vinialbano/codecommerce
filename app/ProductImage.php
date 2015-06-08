<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

/**
 * CodeCommerce\ProductImage
 *
 * @property-read \CodeCommerce\Product $product
 * @property integer                    $id
 * @property integer                    $product_id
 * @property string                     $extension
 * @property \Carbon\Carbon             $created_at
 * @property \Carbon\Carbon             $updated_at
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\ProductImage whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\ProductImage whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\ProductImage whereExtension($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\ProductImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\ProductImage whereUpdatedAt($value)
 */
class ProductImage extends Model
{

    protected $fillable = ['product_id', 'extension'];

    public function product() {
        return $this->belongsTo('CodeCommerce\Product');
    }

}
