<?php

declare(strict_types=1);

namespace App\Models\__tests;

use Tests\TestCase;
use App\Models\ShipModel;
use App\Exceptions\EmptyCoordinatesArrayException;
use App\Exceptions\InvalidCoordinatesException;

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

    public function testShipModelWithInvalidCoordinates(): void {
        $this->expectException(InvalidCoordinatesException::class);
        $ship = new ShipModel([-2, 4], [2,4]);
        $ship2 = new ShipModel([42, 4], [2,4]);
        $ship3 = new ShipModel([2, 44], [2,4]);
        $ship4 = new ShipModel([2, -4], [2,4]);
        $ship5 = new ShipModel([1, 5], [-2,4]);
        $ship6 = new ShipModel([1, 4], [72,4]);
        $ship7 = new ShipModel([2, 4], [6,-4]);
        $ship8 = new ShipModel([2, 4], [6,54]);
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
        $expected = 2;
        $ship = new ShipModel([2,2], [4,4]);
        $this->assertEquals($ship->getLength(), $expected);
    }

}