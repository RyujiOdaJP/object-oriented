<?php


namespace App\Http\Controllers\Purchase;

use FeeInterface;

class FeeCategories implements FeeInterface
{
    private $price;
//    private Quantity $quantity;
    private  $senior_rate = 0.8;
    private  $child_rate = 0.5;

    public function __construct(int $price, Quantity $quantity = null) {
        $this->price = $price;
//        $this->quantity = $quantity;
    }

    public function getAdultFee(): int {
        return $this->price;
    }

    public function getSeniorFee(): int {
        return $this->price * $this->senior_rate;
    }

    public function getChildFee() :int {
        return $this->price * $this->child_rate;
    }


}
