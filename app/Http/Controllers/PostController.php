<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class PostController
 * This is an example using Query builder
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param is all request data from client
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = $request->get('key');

        $posts = DB::table('posts')
            ->where("title", "like", '%' . $key . '%')
            ->paginate(env('PER_PAGE', 10));

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::table('phones')->create($request->all());
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = DB::table('posts')->find($id);
        return view('posts.detail', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = DB::table('posts')->find($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $input = $request->only('title', 'body');
        DB::table('posts')->where('id', $id)->update($input);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return redirect()->back();
    }
}
