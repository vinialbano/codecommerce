<?php namespace CodeCommerce;

class Cart
{

    private $items;

    public function __construct() {
        $this->items = [];
    }

    public function addItem(Product $product) {
        $this->items += [
            $product->id => [
                'product'     => $product,
                'quantity' => isset($this->items[ $product->id ]['quantity']) ? $this->items[ $product->id ]['quantity'] ++ : 1
            ]
        ];
        return $this->items;
    }

    public function removeItem(Product $product) {
        unset($this->items[$product->id]);
    }

    public function getItems() {
        return $this->items;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['product']->price * $item['quantity'];
        }

        return $total;
    }

}