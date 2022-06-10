<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        // $posts = DB::select("select * from posts where title like ? limit 20", ['Mr.']);
        $posts = DB::table("posts")->distinct()->select("id", 'title')->get();
        // $collectPosts = collect($posts);

        dd($posts);

        return view('posts.index')->with("");
    }
}
