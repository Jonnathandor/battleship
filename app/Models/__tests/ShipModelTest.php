<?php

declare(strict_types=1);

namespace App\Models\__tests;

use Tests\TestCase;
use App\Models\ShipModel;

class ShipModelTest extends TestCase
{
    public function testEmptyShipModelInstantiation(): void {
        $ship = new ShipModel();
        $this->assertInstanceOf(ShipModel::class, $ship);
   }

   
}