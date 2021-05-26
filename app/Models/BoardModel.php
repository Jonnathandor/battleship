<?php

declare(strict_types=1);

namespace App\Models;

class BoardModel
{
    private int $x; 
    private int $y;

    function __construct(int $x = null, int $y = null) {
        if($x === 0){
            $x = 10;
        }

        if($y === 0){
            $y = 10;
        }

        $this->x = $x ?? 10;
        $this->y = $y ?? 10;
    }

    public function getX():int {
        return abs($this->x);
    }

    public function getY():int {
        return abs($this->y);
    }

    public function toJSON(): string {
        $arr = array('x' => $this->getX(), 'y' => $this->getY());

        return json_encode($arr);
    }
}