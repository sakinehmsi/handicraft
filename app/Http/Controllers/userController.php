<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class userController extends Controller
{
    public function favourites(){
        $x=ucfirst(Auth()->user()->id);

        $user = DB::select('select * from users where id = ?',[$x]);
        $likes = DB::select('select * from likes where userID= ?', [$x]);
        $posts = DB::select('select * from posts');
        return View('favourite')->with('user', $user[0])
                                ->with('likes',$likes)
                                ->with('posts',$posts);
    }
    public function showArtist($id){
        $x=ucfirst(Auth()->user()->id);
        $artist = DB::select('select * from artists where id = ?', [$id]);
        $posts = DB::select('select * from posts where artistID = ?', [$id]);
        $likes = DB::select('select * from likes where artistID = ? and userID=?', [$id,$x]);
        return View('artist-profile')->with('artist', $artist[0])
                                 ->with('posts', $posts)
                                 ->with('likes', $likes);
    }
    public function showArtists(){
        $artists = DB::select('select * from artists');
        return view('artists',['artists' => $artists]);
    }
    public function checkLikeStatus(){
        $x=ucfirst(Auth()->user()->id);
        $artistID = $_POST['aID'];
        $postID = $_POST['pID'];
        DB::insert("INSERT INTO `likes` (`liked`,`userID`,`artistID`,`postID`) VALUES ('1',".$x.",".$artistID.",".$postID."); ");
    }
    public function checkunLikeStatus(){
        $artistID = $_POST['aID'];
        $postID = $_POST['pID'];
        DB::update('DELETE FROM likes WHERE artistID="'.$artistID.'" and postID="'.$postID.'";');
    }
}