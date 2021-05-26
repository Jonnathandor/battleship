<?php

declare(strict_types=1);

namespace App\Http\Controllers\__tests;

use Tests\TestCase;
use App\Http\Controllers\BoardController;

class BoardControllerTest extends TestCase
{
//     public function testEmptyBoardModelInstantiation(): void {
//         $this->expectException(\ArgumentCountError::class);
//         $board = new BoardModel();
//    }

    protected BoardController $boardController;

    // This is ran before every single test
    // you usually want constants here
    public function setUp(): void
    {
        parent::setUp(); 
        $this->boardController = new BoardController();
    }

    public function testCreateBoard(): void {
        // { "x": 10, "y": 10 }
        $expected  = '{"x":10,"y":10}';
        $this->assertEquals($expected, $this->boardController->createBoard(10,10));
    }
}