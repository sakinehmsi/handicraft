<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class artistController extends Controller
{ 
    
    public function showsignform(){
        $artists = DB::select('select * from artists');
        return view('sign-artist')->with('artists', $artists);
    }
    public function signupArtist(){
        $aEmail = $_POST['aEmail'];
        $aPassword = $_POST['aPassword'];
        DB::insert( "INSERT INTO `artists` (`email`,`password`) VALUES (".$aEmail.",".$aPassword.");" );
    }
    public function signinArtist(){
        $aEmail = $_POST['aEmail'];
        $aPassword = $_POST['aPassword'];
        $id=DB::select('select id from artists where email=? and password=?',[$aEmail,$aPassword]);
        if($id[0]->id != null) {
            echo $id[0]->id;
        }     
    }
    public function showArtist($id){
        $artist = DB::select('select * from artists where id = ?', [$id]);
        $posts = DB::select('select * from posts where artistID = ?', [$id]);
        return View('myprofile')->with('artist', $artist[0])
                                 ->with('posts', $posts);
    }
    public function dropPost(){
        $artistID = $_POST['aID'];
        $postID = $_POST['pID'];
        DB::delete('DELETE FROM posts WHERE artistID="'.$artistID.'" and id="'.$postID.'";');
    }
    //this function use for addPost by artist :(
    // public function addPost(){
    //      /* Getting file name */
    //     $img = $_POST['img'];

    //     $pos = strpos($img, 'base64,');
    //     $blobData = base64_decode(substr(($img), $pos + 7));

    //     $price = $_POST['price'];
    //     $discount = $_POST['discount'];
    //     $discountPercent = $_POST['discountPercent'];
    //     DB::insert("INSERT INTO `posts` (`post`,`price`,`discount`,`discountPercent`) VALUES ('".$blobData."',".$price.",".$discount.",'".$discountPercent."'); ");
        
    // }
}