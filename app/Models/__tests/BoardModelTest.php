<?php

declare(strict_types=1);

namespace App\Models\__tests;

use Tests\TestCase;
use App\Models\BoardModel;

class BoardModelTest extends TestCase
{
    public function testEmptyBoardModelInstantiation(): void {
        $board = new BoardModel();
        $this->assertInstanceOf(BoardModel::class, $board);
   }

   public function testBoardModelInstantiation(): void {
        $board = new BoardModel(5,5);
        $this->assertInstanceOf(BoardModel::class, $board);
    }

    public function testBoardModelInstantiationWithOnlyXSide(): void {
        $board = new BoardModel(5);
        $this->assertInstanceOf(BoardModel::class, $board);
    }

    public function testBoardModelInstantiationWithOnlyYSide(): void {
        $board = new BoardModel(null, 5);
        $this->assertInstanceOf(BoardModel::class, $board);
    }
}