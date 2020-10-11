<?php


namespace App\Http\Controllers\Purchase;

// Quantity class is in charge of type declaration for quantity.
class Quantity
{
    static int $min = 1;
    static int $max = 100;

    private int $value;

    public function __construct(int $value) {
//        dd($value);
        if($value < self::$min || $value > self::$max) {
            throw new \Exception('Quantity must be at least 1 and maximum 100.');
        }
        try{
//            dd(1)
            $this->value = $value;
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getQuantity(){
        return $this->value;
    }
}
