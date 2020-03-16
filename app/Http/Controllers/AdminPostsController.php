<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts= Post::latest()->get();
        //return $post;
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //help to open the category model and send it to help create the post
        $categories =Category::pluck('name', 'id')->all();
        //dd($categories);
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $input= $request->all();
        $user= Auth::user();
         //return $user;
         if($file= $request->file('photo_id')){

             $name= time() .$file->getClientOriginalName();
             $file->move('images', $name);
             $photo = Photo::create(['file' =>$name]);
             $input['photo_id'] = $photo->id;
         }
        //usefull to create post and inject it in the user post table by using the relationship
        $user->posts()->create($input);
           // Post::create($input);
            return redirect('/admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $posts= Post::findOrFail($id);
        //help to open the category model and send it to help create the post
        $categories =Category::pluck('name', 'id')->all();
        return view('admin.posts.edit', compact('posts','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //receiving data from the request
        $input= $request->all();

        //check if the request as a file
        if($file= $request->file('photo_id')){

            $name= time() .$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' =>$name]);
            $input['photo_id'] = $photo->id;
        }
        /*check if the user is loggin,
          then find the user post,
          find where the id is the same,
          then we ask for the first one to edit
         and then UPDATED*/
        Auth::user()->posts()->whereId($id)->first()->update($input);
        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //finding post
         $posts= Post::findOrFail($id);

        //finding relation with photo, unlink them
         unlink(public_path().$posts->photo->file);

        //then delete and redirect
         $posts->delete();
        return redirect('/admin/posts');
    }

    public function post($id){
         $post= Post::findOrFail($id);
        return view('post',compact('post'));

    }




}
