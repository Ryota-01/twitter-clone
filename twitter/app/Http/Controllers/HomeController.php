<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      // ログイン中のユーザーを取得
      $user = Auth::user();
      // ログイン中のユーザーがツイートした内容
      $userTweets = $user->tweets;

      return view('home', ['userTweets' => $userTweets]);
    }
}
