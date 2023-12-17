@extends('layouts.app')

@section('title', 'ホーム')

@section('content')
  <div class="container mt-6">
    <!-- ツイートカードのループ -->
    @if($userTweets -> count() > 0)
      @foreach($userTweets as $userTweet)
        <div class="row">
          <div class="col-md-6 offset-md-3">
          <!-- ツイートカード -->
          <!-- 他のツイートカードをここに追加 -->
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">{{ $userTweet->user->name }}</h5>
                <p class="card-text" style="background: whitesmoke">{{ $userTweet->content }}</p>
                <p class="card-text"><small class="text-muted">{{ $userTweet->created_at }}</small></p>
                <p class="card-text"><small class="text-muted"><a href="{{ route('tweet.detail', ['id' => $userTweet->id ]) }}">詳細</a></small></p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @else
      <div>ツイートが存在しません</div>
    @endif
  </div>
@endsection
