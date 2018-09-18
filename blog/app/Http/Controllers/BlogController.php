<?php

namespace App\Http\Controllers;

use App\Label_Blog;
use App\User;
use Illuminate\Http\Request;
use App\Blog;
use DB;
use Auth;
use Mockery\Exception;
use App\Label;
use JSON;

class BlogController extends Controller
{
    function addBlogIndex(){
        return view('myblog.addblog');
    }

    function editIndex($id){
        $blog = DB::table('blogs')
            ->where('id', $id)
            ->get();

        return view('myblog.editblog', ['blog' => $blog[0]]);
    }

    function add(Request $request){

        try {
            $this->validate($request, [
                'title' => 'required',
                'text'    => 'required',
            ]);

            $labels = json_decode($request->input('alllabels'), true);


            $blog = new Blog;
            $blog->user_id = Auth::user()->id;
            $blog->title = $request->input('title');
            $blog->text = $request->input('text');
            $blog->save();

            for($i = 0; $i < count($labels); $i++){

                    if($labels[$i]['dbid'] != -1){

                        $label_blog = new Label_Blog;
                        $label_blog->label_id = $labels[$i]['dbid'];
                        $label_blog->blog_id = $blog->id;
                        $label_blog->save();

                    }else{

                        $label = new Label;
                        $label->label = $labels[$i]['text'];
                        $label->save();

                        $label_blog = new Label_Blog;
                        $label_blog->label_id = $label->id;
                        $label_blog->blog_id = $blog->id;
                        $label_blog->save();
                    }


            }

            return redirect()->back()->withErrors('Sikeres blog felvétel!');
        }catch (Exception $e){
            return redirect()->back()->withErrors('Sikertelen blog felvétel!');
        }
    }

    function showOwnBlogs(){

        $blogs = DB::table('blogs')
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('myblog.myblogs', ['blogs' =>$blogs]);


    }

    function deleteBlog($id){
        DB::table('blogs')
            ->where('id', $id)
            ->delete();

        DB::table('label__blogs')
            ->where('blog_id', $id)
            ->delete();

        return redirect()->back();
    }

    function editBlog(Request $request){

        DB::table('blogs')
            ->where('id', $request->input('id'))
            ->update(['title' => $request->input('title'), 'text' => $request->input('text')]);

        return redirect('home/myblogs');
    }


}
