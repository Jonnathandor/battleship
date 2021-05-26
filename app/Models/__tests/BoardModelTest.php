<?php

declare(strict_types=1);

namespace App\Models\__tests;

use Tests\TestCase;
use App\Models\BoardModel;

class BoardModelTest extends TestCase
{
//     public function testEmptyBoardModelInstantiation(): void {
//         $this->expectException(\ArgumentCountError::class);
//         $board = new BoardModel();
//    }

   public function testBoardModelInstantiation(): void {
        $board = new BoardModel(5,5);
        $this->assertInstanceOf(BoardModel::class, $board);
    }

    public function testBoardModelWithAtleastOneWrongTypeArgument(): void {
        $this->expectException(\TypeError::class);
        $board = new BoardModel('',5);
    }

    /**
     * @dataProvider negativeBoardDimentions
     */
    public function testBoardModelInstantiationWithNegativeArguments($x, $y, $expectedX, $expectedY): void {
        $board = new BoardModel($x, $y);
 
        $this->assertEquals($board->getX(), $expectedX);
        $this->assertEquals($board->getY(), $expectedY);
    }

    /**
     * @dataProvider missingBoardParams
     */
    public function testBoardModelInstantiationWithOnlyYOrXSide($x, $y, $expectedX, $expectedY): void {
        $board = new BoardModel($x, $y);
 
        $this->assertEquals($board->getX(), $expectedX);
        $this->assertEquals($board->getY(), $expectedY);
    }

    /**
     * @dataProvider zeroValueBoardParams
     */
    public function testBoardModelInstantiationWithZeroAsArguments($x, $y, $expectedX, $expectedY): void {
        $board = new BoardModel($x, $y);
 
        $this->assertEquals($board->getX(), $expectedX);
        $this->assertEquals($board->getY(), $expectedY);
    }

    public function testToJSONRepresentation(): void {
        // { "x": 10, "y": 10 }
        $arr = array('x' => 10, 'y' => 10);
        $expected  = json_encode($arr);
        $board = new BoardModel(10, 10);
        $this->assertEquals($expected, $board->toJSON());
    }

    public function negativeBoardDimentions()
    {
        return array(
            array(-5, -5, 5, 5),
            array(-5, -15, 5, 15),
            array(-15, -5, 15, 5)
        );
    }

    public function missingBoardParams()
    {
        return array(
            array(null, 10, 10, 10),
            array(10, null, 10, 10)
        );
    }

    public function zeroValueBoardParams()
    {
        return array(
            array(0, 10 , 10, 10),
            array(10, 0, 10, 10)
        );
    }
}