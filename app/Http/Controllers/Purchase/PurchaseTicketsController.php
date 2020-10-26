<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseTicketsController extends Controller
{
    private int $ticket_fee = 3000;
    private string $user_category = 'adult';

    public function index () : ?string {
        $user_category = new UserCategories($this->user_category);
        $ticket_fee = new FeeCategories($this->ticket_fee);

        if ($user_category->isAdult()) return $ticket_fee->getAdultFee();
        if ($user_category->isSenior()) return $ticket_fee->getSeniorFee();
        if ($user_category->isChild()) return $ticket_fee->getChildFee();
        return null;
    }
}
