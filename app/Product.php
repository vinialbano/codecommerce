<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

/**
 * CodeCommerce\Product
 *
 */
class Product extends Model {

	protected $fillable = ['name','description','price', 'featured', 'recommended'];

}
