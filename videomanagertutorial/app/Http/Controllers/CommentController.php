<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
        public function index($videoid){
            $comment = Comment::with('user')->where('video_id', $videoid)
            ->orderBy('updated_at', 'desc')->get();

            return response()->json($comment, 200);
        }

    public function store(Request $request){
        $comment = Comment::create([
            'body'=> $request->body,
            'video_id'=> $request->video_id,
            'user_id'=> Auth::user()->id
        ]);

        $cc = Comment::with('user')->find($comment->id);

        return response()->json($cc, 200);
    }
}
