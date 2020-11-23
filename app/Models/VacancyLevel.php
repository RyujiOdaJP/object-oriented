<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyLevel extends Model
{

    private $remainingCount;

    public function __construct(int $remainingCount)
    {
        parent::__construct();
        $this->remainingCount = $remainingCount;
    }

    public function mark(): string
    {
        $marks = [
            'empty' => '×',
            'few' => '△',
            'enough' => '○']
        ;

        assert(isset($marks[$this->slug()]), new \DomainException('invalid value is given'));
        return $marks[$this->slug()];

    }

    public function slug(): string
    {
        if ($this->remainingCount === 0) {
            return 'empty';
        }
        if ($this->remainingCount < 5) {
            return 'few';
        }
        return 'enough';
    }

}
