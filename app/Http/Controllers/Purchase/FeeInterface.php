<?php


interface FeeInterface
{
    public function getAdultFee(): int;

    public function getSeniorFee(): int;

    public function getChildFee() :int;
}
