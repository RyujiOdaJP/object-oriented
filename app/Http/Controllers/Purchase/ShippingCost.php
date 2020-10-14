<?php

namespace App\Http\Controllers\Purchase;


class ShippingCost
{
    private int $item_price;
    private Quantity $quantity;

    public function __construct(int $item_price, Quantity $quantity)
    {
        $this->item_price = $item_price;
        $this->quantity = $quantity;
    }

    public function getTotalAmount (): int {
        $shipping_fee = 500;
        $border_price = 3000;
        $purchased_price = $this->item_price * $this->quantity->getQuantity();

        if ($purchased_price < $border_price){
            return $purchased_price + $shipping_fee;
        } else {
            return $purchased_price;
        }
    }
}
