<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class reductionController extends Controller
{

    public function show()
    {

        return view('reduction');

    }

     public function showAll(Request $request)
    {
    $action = null;
    if ($request->has('action')) {
        $action = $request->input('action');
    }
    if ($action != null) {
       if($action=='all'){
          $posts = DB::table('posts')->paginate(9);
          return view('reduction', ['posts' => $posts]);
       } elseif($action=='discount') {
         $posts = DB::table('posts')->Select('*')->where('discount',1)->orderBy('discountPercent', 'DESC')->paginate(9);
          return view('reduction', ['posts' => $posts]);
       } elseif($action=='cheap') {
          $posts = DB::table('posts')->Select('*')->orderBy('price', 'ASC')->paginate(9);
          return view('reduction', ['posts' => $posts]);
       } elseif($action=='expensive') {
          $posts = DB::table('posts')->Select('*')->orderBy('price', 'DESC')->paginate(9);
          return view('reduction', ['posts' => $posts]);
       }
    } else {
       $posts = DB::table('posts')->paginate(9);
       return view('reduction', ['posts' => $posts]);
    }
    }
  /*  public function showReduction()
    {
        $posts = DB::table('posts')->Select('*')->where('discount',1)orderBy('discountPercent', 'DESC')->paginate(9);
        return view('reduction', ['posts' => $posts]);
    }

    public function showAsc()
    {
        $posts = DB::table('posts')->Select('*')->orderBy('price', 'ASC')->paginate(9);
        return view('reduction', ['posts' => $posts]);
    }

    public function showDesc()
    {
        $posts = DB::table('posts')->Select('*')->orderBy('price', 'DESC')->paginate(9);
        return view('reduction', ['posts' => $posts]);
    }

*/


//    public function index(Request $request)
//    {
//        $posts = posts::where('is_active', true);
//
//        if ($request->has('age_more_than')) {
//            $posts->where('age', '>', $request->age_more_than);
//        }
//
//        return $posts->get();
//    }
}
