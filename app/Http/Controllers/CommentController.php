<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Threed;

class CommentController extends Controller
{
    public function addThreedComment(Request $request, Threed $threed)
    {
        $this->validate($request, [
            'body'=>'required'
        ]);

        $comment = new Comment;
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;

        $threed->comments()->save($comment);

        return back()->withMessage("Comment creathed");
    }

     public function addReplayComment(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'body'=>'required'
        ]);

        $replay = new Comment;
        $replay->body = $request->body;
        $replay->user_id = auth()->user()->id;

        $comment->comments()->save($replay);

        return back()->withMessage("Replay creathed");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if(auth()->user()->id != $comment->user_id)
        {
            abort(401,"unauthor");
        }
        $this->validate($request, [
            'body'=>'required'
        ]);

        $comment->update($request->all());
        return back()->withMessage("Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if(auth()->user()->id != $comment->user_id)
        {
            abort(401,"unauthor");
        }
        $comment->delete();
        return back()->withMessage('Deleted');
    }
}
