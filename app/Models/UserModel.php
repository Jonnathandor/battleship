<?php

declare(strict_types=1);

namespace App\Models;

class UserModel
{
    private string $name; 
    private array $ships;

    function __construct(?string $name = null, ?array $ships = []) {
        $this->name = $name ?? ''; // if(empty($name) { $this->name = ''; } else { $this->name = $name; }
        $this->ships = $ships;
    }

    function getName():string{
        return $this->name;
    }

    function getShips():array{
        return $this->ships;
    }
}
