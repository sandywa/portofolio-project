<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Models\Posts;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'namebar' => 'Home',
            'posts' => Posts::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Posts;
        Request()->validate([
            'title' => 'required|unique:posts,title|max:255',
            'body' => 'required',
            'image' => 'nullable|mimes:jpeg, jpg, bmp, png|max:1024',
        ]);
        $file = Request()->image;
        $filename = Request()->title . '.' . $file->extension();
        $file->move(public_path('image'), $filename);
        $data = [
            'title' => Request()->title,
            'body' => Request()->body,
            'image' => $filename,
        ];

        $post->createPost($data);
        return redirect()->route('posts')->with('pesan', 'Post berhasil ditambahkan !!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostsRequest $request)
    {
        $validate = $request->validate([

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = new Posts;
        if (!$posts->detailPost($id)) {
            abort(404);
        }
        $dataDetail = [
            'posts' => $posts->detailPost($id),
        ];
        return view('edit_view', $dataDetail, [
            'namebar' => 'Edit Post',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostsRequest  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $post = new Posts;
        Request()->validate([
            'title' => 'required|unique:posts,title|max:255',
            'body' => 'required',
            'image' => 'nullable|mimes:jpeg, jpg, bmp, png|max:1024',
        ]);
        $file = Request()->image;
        $filename = Request()->title . '.' . $file->extension();
        $file->move(public_path('image'), $filename);
        $data = [
            'id' => $id,
            'title' => Request()->title,
            'body' => Request()->body,
            'image' => $filename,
        ];

        $post->updatePost($data);
        return redirect()->route('posts')->with('pesan', 'Update berhasil dilakukan !!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = new Posts;
        if (!$posts->deletePost($id)) {
            abort(404);
        }
        $posts->deletePost($id);
        return redirect()->route('posts')->with('pesan', 'Data berhasil dihapus !!');
    }
}
