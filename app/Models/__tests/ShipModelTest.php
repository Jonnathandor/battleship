<?php

declare(strict_types=1);

namespace App\Models\__tests;

use Tests\TestCase;
use App\Models\ShipModel;
use App\Exceptions\EmptyCoordinatesArrayException;
use App\Exceptions\InvalidCoordinatesException;
use App\Exceptions\InvalidShipOrientationException;

class ShipModelTest extends TestCase
{
   public function testShipModelInstantiation(): void {
        $this->expectException(EmptyCoordinatesArrayException::class);
        $ship = new ShipModel([], []);
    }

    public function testShipModelInstantiationWithOnlyBowArgument(): void {
        $this->expectException(\ArgumentCountError::class);
        $ship = new ShipModel([]);
    }

    public function testShipModelWithAtleastOneWrongTypeArgument(): void {
        $this->expectException(\TypeError::class);
        $ship = new ShipModel('Swann', 6);
    }

    public function testShipModelWithWrongCoordinatesType(): void {
        $this->expectException(\TypeError::class);
        $this->expectExceptionMessage('Yo, pass arrays with numbers inside');
        $ship = new ShipModel(['Swann', 4], [2,4]);
    }

    /**
     * @dataProvider invalidCoordinates
     * This is basically saying: "testShipModelWithInvalidCoordinates" will use a data provider
     */
    public function testShipModelWithInvalidCoordinates($bow, $stern): void {
        $this->expectException(InvalidCoordinatesException::class);
        $ship = new ShipModel($bow, $stern);
    }

    public function testShipModelWithValidCoordinates(): void {
        $ship = new ShipModel([2, 4], [4,4]);
        $this->assertInstanceOf(ShipModel::class, $ship);
    }

    public function testShipModelWithValidBow(): void {
        $ship = new ShipModel([2, 4], [4,4]);
        $this->assertEquals([2,4], $ship->getBow());
    }

    public function testShipModelWithValidStern(): void {
        $ship = new ShipModel([2, 4], [4,4]);
        $this->assertEquals([4,4], $ship->getStern());
    }

    public function testShipModelLength(): void {
        $expected = 5;
        $ship = new ShipModel([6,6], [2,6]);
        $this->assertEquals($ship->getLength(), $expected);
    }

    public function testShipModelOrientationDiagonal(): void {
        $this->expectException(InvalidShipOrientationException::class);
        $ship = new ShipModel([2,4], [3,5]);
    }

    /**
     * @dataProvider shipOrientation
     * This is basically saying: "testShipModelOrientation" will use a data provider
     */
    public function testShipModelValidOrientation($bow, $stern, $expected): void {
        $ship = new ShipModel($bow, $stern);
        $this->assertEquals($ship->getOrientation(), $expected);
    }


    public function invalidCoordinates()
    {
        return array(
            "negative x-bow" => array([-2,4], [2,4]),
            array([422,4], [2,4]),
            array([2,44], [2,4]),
            array([2,-4], [2,4]),
            array([1,5], [-2,4]),
            array([1,4], [72,4]),
            array([2,4], [6,-4]),  
            array([2,4], [6,54]),
        );
    }

    public function shipOrientation()
    {
        return array(
            "horizontal orientation" => array([2,4], [4,4], ShipModel::HORIZONTAL_ORIENTATION),
            "vertical orientation" => array([1,2], [1,1], ShipModel::VERTICAL_ORIENTATION),
        );
    }

}