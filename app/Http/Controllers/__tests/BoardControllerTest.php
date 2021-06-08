<?php

declare(strict_types=1);

namespace App\Http\Controllers\__tests;

use Tests\TestCase;
use App\Http\Controllers\BoardController;
use App\Models\BoardModel;
use Illuminate\Http\Request;
use Mockery as M;
use Mockery\Mock;

class BoardControllerTest extends TestCase
{
//     public function testEmptyBoardModelInstantiation(): void {
//         $this->expectException(\ArgumentCountError::class);
//         $board = new BoardModel();
//    }

    /** @var BoardController | Mock */
    protected $boardController;

     /** @var Request | Mock */
     protected $mockRequest; // My $request will be a type of Mock Request

    /** @var BoardModel | Mock */
    protected $mockBoardModel;

    // This is ran before every single test
    // you usually want constants here
    public function setUp(): void
    {
        parent::setUp(); 

        // We need to create an instance of the Mock
        $this->boardController = new BoardController();

        $this->mockRequest = M::mock(Request::class);
        
        $this->mockBoardModel = M::mock(BoardModel::class);
    }

    public function testCreateBoard(): void {
        //In order to call the method of the controller, we need to mock
        // every single thing that is required for the method to work
        // so if my CreateBoard expects a request object, that needs to be mocked. 
        // That has been done in line 38. But the controller also has to 
        // pull information from the request using the input method(of the request object) 
        // having said that I also need to mock that process (pulling out information from the Request)

        // the mock request should use the input method and extact a X key with the value of 10
        $this->mockRequest->shouldReceive('input')->with('x')->andReturn(10);
        $this->mockRequest->shouldReceive('input')->with('y')->andReturn(10);

        // The controller should call the board model and use the save method
        $this->mockBoardModel->shouldReceive('save');
        $this->mockBoardModel->shouldReceive('toJSON');

        // the controller should cal the createBoard and because the 
        // createBoard method uses a request then we pass our mocked request
        $this->boardController->createBoard($this->mockRequest);
    }
}