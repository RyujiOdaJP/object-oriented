<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    private int $apple_price = 100;
    private int $input_quantity = 20;
    private Quantity $quantity;
    private string $result;

    public function __construct() {
        $this->quantity = new Quantity($this->input_quantity);
        $total_amount = new ShippingCost($this->apple_price, $this->quantity);
        $this->result = 'total amount is ' . $total_amount->getTotalAmount();
    }

    public function __toString() :string {
        // TODO: Implement __toString() method.
        return $this->result;
    }
}
