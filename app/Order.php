<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

/**
 * CodeCommerce\Order
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\CodeCommerce\OrderItem[] $items
 * @property-read \CodeCommerce\User $user
 * @property integer $id
 * @property integer $user_id
 * @property float $total
 * @property integer $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Order whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Order whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Order whereTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Order whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\Order whereUpdatedAt($value)
 */
class Order extends Model {

	protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    public function items(){
        return $this->hasMany('CodeCommerce\OrderItem');
    }

    public function user() {
        return $this->belongsTo('CodeCommerce\User');
    }

}
