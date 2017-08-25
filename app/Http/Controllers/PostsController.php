<?php

namespace App\Http\Controllers;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;
use File;
class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all post for testing
            // $posts =  Post::all();

        //pagination paginate(1) means it contains n per page
        $posts =  Post::orderBy('created_at','desc')->paginate(5);
        return view ('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view ('posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'category' =>'required|integer',
            'cover_image' => 'image|nullable|max:1999'
            ]);

        //handle file upload
        if ($request->hasFile('cover_image')) {
            //get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();;
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->move('cover_images', $fileNameToStore);
            Cloudder::upload("cover_images/" . $fileNameToStore,$fileNameToStore);
        }else{
            $fileNameToStore = 'no_image.jpg';
        }

        //Create Post
        $post = new Post;
        $post->title =$request->input('title');
        $post->body =$request->input('body');
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->input('category');
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view ('posts.show')->with('post', $post);
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
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] =$category->name;
        }
        //check for correct user
        if(auth()->user()->id != $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }
        return view ('posts.edit')->with('post', $post)->with('categories',$cats);
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
        //
                //validate
        $this->validate($request,[
            'title' => 'required',
            'category' => 'required|integer',
            'body' => 'required'
            ]);

        if ($request->hasFile('cover_image')) {
            //get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();;
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->move('cover_images', $fileNameToStore);
        }

        //Update Post
        $post = Post::find($id);
        $post->title =$request->input('title');
        $post->category_id =$request->input('category');
        $post->body =$request->input('body');
        if ($request->hasFile('cover_image')) {
            //delete old image
        if ($post->cover_image != 'no_image.jpg') {
            Cloudder::destroyImage($post->cover_image);
            Cloudder::delete($post->cover_image);    
        }
            //upload new image
            $post->cover_image =$fileNameToStore; 
            Cloudder::upload("cover_images/" . $fileNameToStore,$fileNameToStore);
        }
        $post->save();


        return redirect('/posts')->with('success', 'Post Updated');
    
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
        $post = Post::find($id);

        if(auth()->user()->id != $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }

        if ($post->cover_image != 'no_image.jpg') {
            //delete the image
            File::delete('cover_images/' . $post->cover_image);
            Cloudder::destroyImage($post->cover_image);
            Cloudder::delete($post->cover_image);
        }
        
        $post->delete();

         return redirect('/home')->with('success', 'Post Remove');




    }
}
