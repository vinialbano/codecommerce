<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

/**
 * CodeCommerce\OrderItem
 *
 * @property-read \CodeCommerce\Order $order
 * @property integer $id
 * @property integer $product_id
 * @property integer $order_id
 * @property float $price
 * @property integer $quantity
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\OrderItem whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\OrderItem whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\OrderItem wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\OrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\OrderItem whereUpdatedAt($value)
 */
class OrderItem extends Model
{

    protected $fillable = [
        'product_id',
        'order_id',
        'price',
        'quantity'
    ];

    public function order() {
        return $this->belongsTo('CodeCommerce\Order');
    }

    public function product(){
        return $this->belongsTo('CodeCommerce\Product');
    }
}
