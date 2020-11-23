<?php


namespace App\Http\Controllers\Purchase;


class UserCategories
{
    private $user_category;

    public function __construct($user_category) {
        $this->user_category = $user_category;
    }

    public function isAdult() : bool {
        if ($this->user_category === 'adult') return true;
        return false;
    }

    public function isSenior() : bool {
        if ($this->user_category === 'senior') return true;
        return false;
    }

    public function isChild() : bool {
        if ($this->user_category === 'child') return true;
        return false;
    }
}
