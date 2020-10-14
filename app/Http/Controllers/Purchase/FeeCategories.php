<?php


namespace App\Http\Controllers\Purchase;


class FeeCategories
{
    private int $price;
//    private Quantity $quantity;
    private float $senior_rate = 0.8;
    private float $child_rate = 0.5;

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
