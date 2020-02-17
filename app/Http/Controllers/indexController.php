<?php
/**
 * Created by PhpStorm.
 * User: shadi
 * Date: 2/12/2020
 * Time: 7:41 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;


class indexController extends Controller
{


    public function showAll(){
        $posts = DB::select('select * from posts');
        return view('index',['posts' => $posts]);
    }


}
