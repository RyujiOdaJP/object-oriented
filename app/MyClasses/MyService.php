<?php

namespace App\MyClasses;

class MyService
{
    private int $id = -1;
    private string $msg = 'no id...';
    private array $data = [
        'Hello',
        'Welcome',
        'Bye'
    ];

    public function __construct(int $id = -1)
    {
        if ($id >= 0) {
            $this->id = $id;
            $this->msg = 'select: ' . $this->data[$id];
        }
    }

    public function say(): string
    {
        return $this->msg;
    }

    public function data(int $id): string
    {
        return $this->data[$id];
    }

    public function allData(): array
    {
        return $this->data;
    }
}
