<?php

declare(strict_types=1);

namespace App\Models\__tests;

use Tests\TestCase;
use App\Models\BoardModel;

class BoardModelTest extends TestCase
{
    public function testEmptyBoardModelInstantiation(): void {
        $this->expectException(\ArgumentCountError::class);
        $board = new BoardModel();
   }

   public function testBoardModelInstantiation(): void {
        $board = new BoardModel(5,5);
        $this->assertInstanceOf(BoardModel::class, $board);
    }

    public function testBoardModelWithAtleastOneWrongTypeArgument(): void {
        $this->expectException(\TypeError::class);
        $board = new BoardModel('',5);
    }


    public function testBoardModelInstantiationWithNegativeArguments(): void {
        $board = new BoardModel(-5, -5);
        $expectedX = 5;
        $expectedY = 5;
        $this->assertEquals($board->getX(), $expectedX);
        $this->assertEquals($board->getY(), $expectedY);
    }

//     public function testBoardModelInstantiationWithOnlyYSide(): void {
//         $board = new BoardModel(null, 5);
//         $this->assertInstanceOf(BoardModel::class, $board);
//     }
}