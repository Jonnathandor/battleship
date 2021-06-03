<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use App\Models\BoardModel;

use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Http\Request; 

class BoardController extends BaseController
{
    public function helloWorld():string {
        return 'Hello World';
    }

    // why should we use those parameters if the arguments are comming from the client
    // What about resourceful routes?
    // public function createBoard($x, $y){
    public function createBoard(){
        $board = new BoardModel(10, 10);
        // Why postman receives an empty object? 
        // $board->save(); does laravel understand that I want to save this on the board table that was created with my migration?
        return json_encode($board);
    }
}
