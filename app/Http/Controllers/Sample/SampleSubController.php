<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SampleSubController extends SampleController
{
    public function getTotalAmount (): int {
        $shipping_fee = 500;
        $border_price = 3000;
        $purchased_price = 0;

        for($i=0; $i < count($this->quantities); $i++) {
            $purchased_price += $this->item_price[$i] * $this->quantities[$i];
        }

        if ($purchased_price < $border_price){
            return $purchased_price + $shipping_fee;
        }
        return $purchased_price;
    }
}
