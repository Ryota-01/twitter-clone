@extends('layouts.app')

@section('title', 'ホーム')

@section('content')
  <div class="container mt-5">
    <h1>フォロワー一覧</h1>
    <div class="row">
      @foreach($followers as $follower)
        <!-- フォローされているユーザーのカード -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="user1.jpg" class="card-img-top" alt="ユーザー名">
            <div class="card-body">
              <h5 class="card-title">{{ $follower->name }}</h5>
              <p class="card-text">フォロー中のユーザーのプロフィール情報などがここに表示されます。</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
