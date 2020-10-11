<?php

namespace App\Http\Controllers\Dice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiceController extends Controller
{
    public function rollDouble(Dice $roll): int {
        return $roll->roll() + $roll->roll();
    }
}
