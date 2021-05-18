<?php

declare(strict_types=1);

namespace App\Models;

class BoardModel
{
    private int $x; 
    private int $y;

    function __construct(int $x, int $y) {
        $this->x = abs($x);
        $this->y = abs($y);
    }

    public function getX():int {
        return $this->x;
    }

    public function getY():int {
        return $this->y;
    }
}