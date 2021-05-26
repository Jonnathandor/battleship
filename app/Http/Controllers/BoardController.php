<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use App\Models\BoardModel;

use Illuminate\Routing\Controller as BaseController;

class BoardController extends BaseController
{
    public function helloWorld():string {
        return 'Hello World';
    }

    public function createBoard(int $x, int $y){
        $board = new BoardModel($x, $y);
        return json_encode($board);
    }
}
