<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    private $apple_price = 100;
    private $input_quantity = 29;
    private $result;

    public function index() {
        try {
            $quantity = new Quantity($this->input_quantity);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        $total_amount = new ShippingCost($this->apple_price, $quantity);
        return $this->result = 'total amount is ' . $total_amount->getTotalAmount();
    }

    public function __toString() :string {
        // TODO: Implement __toString() method.

        return $this->result;
    }
}
