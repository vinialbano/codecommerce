<?php namespace CodeCommerce;

class Cart
{

    private $items;

    public function __construct() {
        $this->items = [];
    }

    public function addItem(Product $product, $quantity) {
        $this->items += [
            $product->id => [
                'product'  => $product,
                'quantity' => isset($this->items[ $product->id ]['quantity'])
                    ? ($this->items[ $product->id ]['quantity'] + $quantity <= 5
                        ? $this->items[ $product->id ]['quantity'] += $quantity : 5)
                    : $quantity
            ]
        ];

        return $this->items;
    }

    public function setQuantity(Product $product, $quantity) {
        if (isset($this->items[ $product->id ]['quantity']) && $quantity >= 1) {
            $this->items[ $product->id ]['quantity'] = $quantity;

            return $this->items;
        }

        return false;
    }

    public function removeItem(Product $product) {
        unset($this->items[ $product->id ]);
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