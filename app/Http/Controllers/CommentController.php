<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::all();
    }

    public function create(Request $request)
    {
        $comment = new Comment();

        $comment->user_id = $request->input('user_id');
        $comment->gallery_id = $request->input('gallery_id');
        $comment->comment = $request->input('comment');

        $comment->save();

        return $comment;
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        return new JsonResponse(true);
    }
}
