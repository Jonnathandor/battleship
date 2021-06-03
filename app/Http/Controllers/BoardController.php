<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use App\Models\BoardModel;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request; 

class BoardController extends BaseController
{
    public function helloWorld():string {
        return csrf_token();
    }

    public function createBoard(Request $request){

        // check the has method: https://laravel.com/api/5.5/Illuminate/Http/Request.html
        //middleware goes above
        $x = $request->input('x');
        $y = $request->input('y');

        $board = new BoardModel($x, $y);
        // dd($board);
        $board->save(); 
        return $board->toJSON();
    }
}
