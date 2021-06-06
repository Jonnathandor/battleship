<?php

declare(strict_types=1);

namespace App\Http\Controllers\__tests;

use Tests\TestCase;
use App\Http\Controllers\BoardController;
use App\Models\BoardModel;

class BoardControllerTest extends TestCase
{
//     public function testEmptyBoardModelInstantiation(): void {
//         $this->expectException(\ArgumentCountError::class);
//         $board = new BoardModel();
//    }

    protected BoardController $boardController;
    protected BoardModel $boardModel;

    // This is ran before every single test
    // you usually want constants here
    public function setUp(): void
    {
        parent::setUp(); 
        $this->boardController = new BoardController();
        
        $this->boardModel = new BoardModel();
    }

    // public function testCreateBoard(): void {ß
    //     $expected  = $this->boardModel->toJSON();
    //     $this->assertEquals($expected, $this->boardController->createBoard());
    // }
}