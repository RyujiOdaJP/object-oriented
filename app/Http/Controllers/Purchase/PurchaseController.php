<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Shipping\ShippingController;

class PurchaseController // extends Controller
{
    private int $apple_price = 100;
    private int $banana_price = 200;
    private int $quantity = 30;
    private string $result;

    public function __construct() {

        $total_amount = new ShippingController($this->apple_price, $this->quantity);
        $this->result = 'total amount is ' . $total_amount->getTotalAmount();
    }

    public function __toString() :string {
        // TODO: Implement __toString() method.
        return $this->result;
    }
}
