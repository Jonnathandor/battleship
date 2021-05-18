<?php

declare(strict_types=1);

namespace App\Models;
use App\Exceptions\EmptyCoordinatesArrayException;
use App\Models\BoardModel;
use App\Exceptions\InvalidCoordinatesException;
use App\Exceptions\InvalidShipOrientationException;

class ShipModel
{
    // I just realize that we cannot set this on a board with only one number
    // the bow and stern should look like this [x,y], currently they look like this [x]
    private array $bow; 
    private array $stern;
    public const VERTICAL_ORIENTATION = 'VERTICAL_ORIENTATION'; 
    public const HORIZONTAL_ORIENTATION = 'HORIZONTAL_ORIENTATION'; 

    // We could have an array with a fixed length
    // to hold the hits. If the array is full the boat is sunk

    // I need to define with Swann what are the boat types
    // Shall we use an enum? 

    

    // How do we prevent the creation of a ship that is bigger than the board?
    function __construct(array $bow, array $stern) {
        if(count($bow) < 2 || count($stern) < 2){
            throw new EmptyCoordinatesArrayException();
        }

        if(!is_int($bow[0]) || !is_int($bow[1])
        || !is_int($stern[0]) || !is_int($stern[1])){
            throw new \TypeError('Yo, pass arrays with numbers inside');
        }

        if($bow[0] < 0 || $bow[0] > BoardModel::X ||
        $bow[1] < 0 || $bow[1] > BoardModel::Y ||
        $stern[0] < 0 || $stern[0] > BoardModel::X ||
        $stern[1] < 0 || $stern[1] > BoardModel::Y){
            throw new InvalidCoordinatesException;
        }

        // [2, 5][3, 7]
        if(($bow[0] !== $stern[0]) && ($bow[1] !== $stern[1])) {
            throw new InvalidShipOrientationException;
        }

        $this->bow = $bow;
        $this->stern = $stern; 
    }

    function getBow():array{
        return $this->bow;
    }

    function getStern():array{
        return $this->stern;
    }

    function getLength():int{
        // $difference = sqrt(pow(($this->stern[0] - $this->bow[0]), 2) + pow(($this->stern[1] - $this->bow[1]), 2));

        // if is vertical make subsctraction from Ys
        if($this->getOrientation() === self::VERTICAL_ORIENTATION){
            return abs($this->stern[1] - $this->bow[1]) + 1;
        }
        // else substract Xs
        return abs($this->stern[0] - $this->bow[0]) + 1;
    }

    // if both stern and bow have the same Y then ship has an horizontal orientation
    // if both stern and bow have the same X then the ship has a vertical orientation
    function getOrientation():string{

        // a=== b ? c : d; ternary 
        return $this->bow[0] === $this->stern[0] ? self::VERTICAL_ORIENTATION : self::HORIZONTAL_ORIENTATION;

        // if($this->bow[0] === $this->stern[0]){
        //     // self is the static version of the class
        //     return self::VERTICAL_ORIENTATION;
        // }

        // return self::HORIZONTAL_ORIENTATION;
    }

}