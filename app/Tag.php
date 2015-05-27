<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

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
