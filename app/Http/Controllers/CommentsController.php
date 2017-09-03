<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Auth;
class CommentsController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$post_id)
    {
        //
        $this->validate($request, [
            'comment' => 'required|min:2|max:1999',
            ]);
        //post object
        $post = Post::find($post_id);
        $fullname = Auth::user()->name . ' ' . Auth::user()->lname; 

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->post()->associate($post);
        $comment->name = $fullname;
        $comment->comment = $request->input('comment');
        $comment->save();

        return back()->with('success', 'Comment Added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments/edit')->with('comment',$comment);

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


        $this->validate($request, [
        'comment' => 'required|min:2|max:1999',
        ]);

        $comment = Comment::find($id);
        $comment->comment = $request->input('comment');
        $comment->save();

        return redirect()->route('posts.show',$comment->post->id)->with('success', 'Comment Updated');

    }

    public function delete($id)
    {
        //
        $comment = Comment::find($id);
        return view ('comments.delete')->with('comment',$comment);
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
         $comment = Comment::find($id);
         $post_id = $comment->post->id;
         $comment->delete();

        return redirect()->route('posts.show',$post_id)->with('success', 'Comment Removed');
    }
}
