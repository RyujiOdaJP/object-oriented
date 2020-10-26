<?php

namespace App\Http\Controllers\Sample;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SampleController extends Controller
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     *
     * @return string
     */
    public function judgeInput():string
    {
        if (is_string($this->value)) return  $this->value . 'is string.';
        if (is_int($this->value)) return $this->value . 'is integer.';
        return $this->value . 'is neither string nor integer.';
    }
}
