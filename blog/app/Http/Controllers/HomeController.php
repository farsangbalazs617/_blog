<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Auth;
use DB;

class HomeController extends Controller
{
    function index(){

        $blogs = DB::table('blogs')
            ->select('blogs.id','blogs.title','blogs.text','users.name')
            ->join('users', 'users.id', 'blogs.user_id')
            ->get();

        $labels = DB::table('labels')
            ->join('label__blogs', 'label__blogs.label_id', 'labels.id')
            ->get();


        return View('home.index', ['blogs' => $blogs, 'labels' => $labels]);
    }

    function search(){
        $search = $_GET['search'];

        $blogs = [];

        $labels = DB::table('labels')
            ->join('label__blogs', 'label__blogs.label_id', 'labels.id')
            ->where('label','like','%'.$search.'%')
            ->get();

        foreach ($labels as $label){
            $blog = DB::table('blogs')
                ->select('blogs.id','blogs.title','blogs.text','users.name')
                ->join('users', 'users.id', 'blogs.user_id')
                ->where('blogs.id',$label->blog_id)
                ->get();
            array_push($blogs,$blog);
        }




        return View('home.search', ['blogs' => $blogs, 'labels' => $labels]);


    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
