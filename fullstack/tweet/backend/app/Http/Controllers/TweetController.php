<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TweetController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tweet::with('likes')->latest()->get();
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

        $validator = Validator::make($request->all(), [
            'article' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->file('image')) {
            $image =  $request->file('image')->store('tweet-images', 'public');
        }

        try {
            $data = Tweet::create([
                'article' => $request->article,
                'user_id' => auth()->user()->id,
                'image' => isset($image) ? $image : null
            ]);
            return response()->json(['status' => 201, 'message' => 'tweet has been submited successfully', 'data' => $data]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        try {
            Tweet::destroy($tweet->id);
            return response()->json(['status' => 204, 'message' => 'tweet has been deleted']);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 400);
        }
    }
}
