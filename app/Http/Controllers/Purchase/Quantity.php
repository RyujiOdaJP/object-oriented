<?php


namespace App\Http\Controllers\Purchase;

// Quantity class is in charge of type declaration for quantity.
class Quantity
{
    static $min = 1;
    static $max = 100;

    private $value;

    public function __construct(int $value)
    {
        if ($value < self::$min || $value > self::$max) {
            throw new \Exception('Quantity must be at least 1 and maximum 100.');
        }
        $this->value = $value;
    }

    public function getQuantity()
    {
        return $this->value;
    }
}
