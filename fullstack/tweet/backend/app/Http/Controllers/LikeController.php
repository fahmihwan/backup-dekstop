<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Tweet;
use Exception;
use Illuminate\Http\Request;


class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Like::with('tweet')->latest()->get();
        return response()->json(['status' => 200, 'message' => 'list tweets', 'data' => $data]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user()->id;
        try {
            $tweet = Tweet::where('id', $request->tweet_id)->exists();
            if (!$tweet) {
                throw new Exception('tweet not found');
            }
            // user id ganti auth
            $isLike = Like::where([['user_id', '=', $user], ['tweet_id', '=', $request->tweet_id]])->exists();
            if ($isLike) {
                $data = Like::where([['user_id', '=', $user], ['tweet_id', '=', $request->tweet_id]])->delete();
                return response()->json(['message' => 'tweet unlike', 'data' => $data], 200);
            } else {
                $data =  Like::create(['user_id' => $user, 'tweet_id' => $request->tweet_id]);
                return response()->json(['message' => 'tweet has been liked', 'data' => $data], 201);
            }
        } catch (\Exception $th) {
            return response()->json($th->getMessage(), 400);
        }
    }

    public function my_like()
    {
        $user = auth()->user()->id;
        $data = Like::with(['tweet'])->where('user_id', $user)->latest()->get();
        return response()->json([
            'status' => 200,
            'message' => 'list like',
            'data' => $data
        ]);
    }
}
