<?php

namespace App\Http\Controllers\Shipping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class ShippingController extends Controller
{
    private int $item_price;
    private int $quantity;

    public function __construct(int $item_price, int $quantity)
    {
        $this->item_price = $item_price;
        $this->quantity = $quantity;
    }

    public function getTotalAmount (): int {
        $shipping_fee = 500;
        $border_price = 3000;

        if ($this->item_price < $border_price){
            return $this->item_price + $shipping_fee;
        } else {
            return $this->item_price;
        }
    }
}
