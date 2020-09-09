<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.show');
       }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'comment' => 'required|min:5',
            ]);
        $comment=new Comment($request->all());
        $comment->article_id =$id;
        $comment->save();
        return redirect('articles/'.$id)->with('success', 'Success');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrfail($id);
        return view ('articles.commentUpdate')
            ->with ('comment', $comment);
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'comment' => 'required|min:5',
            ]);
        $comment = Comment::find($id);
        $comment ->comment = $request->get('comment');
        $comment -> update();
        $aid = $comment->article->id;
        return redirect('articles/'.$aid);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $aid = $comment->article->id;
        $comment->delete();
        return redirect('articles/'.$aid);
    }
}