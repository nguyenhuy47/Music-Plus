<?php

namespace App\Http\Controllers;

use App\Model\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $commentListId)
    {
        $user = Auth::user();
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->comment_list_id = $commentListId;
        $comment->content = $request->input('content');
        $comment->save();
        return redirect()->back();
    }
}
