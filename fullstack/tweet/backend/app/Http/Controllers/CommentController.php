<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tweet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // list komen
    public function index()
    {
        $user = auth()->user()->id;
        return Comment::with(['tweet', 'comment'])->where('user_id', $user)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $user = auth()->user()->id;
            $tweet_id = Tweet::where('id', $request->tweet_id)->exists();
            if ($tweet_id) {
                $data = Comment::create([
                    'user_id' => $user,
                    'tweet_id' => $request->tweet_id,
                    'comment' => $request->comment,
                    'comment_id' => isset($request->comment_id) ? $request->comment_id : null
                ]);
                return response()->json(['status' => 200, 'message' => 'comment has been created', 'data' => $data]);
            } else {
                throw new Exception('tweets not found');
            }
        } catch (\Exception $th) {
            return response()->json($th->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        try {
            Comment::destroy($comment->id);
            return response()->json(['status' => 204, 'message' => 'tweet has been deleted']);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 400);
        }
    }
}
