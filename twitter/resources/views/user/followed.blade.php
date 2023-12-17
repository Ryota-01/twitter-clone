@extends('layouts.app')

@section('title', 'ホーム')

@section('content')
  <div class="container mt-5">
    <h2>フォローユーザー一覧</h2>
    <div class="row">
      <!-- フォロー中のユーザーのカード -->
      @foreach($followed as $follow)
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="user1.jpg" class="card-img-top" alt="{{ $follow->name }}">
          <div class="card-body">
            <h5 class="card-title">{{ $follow->name }}</h5>
            <p class="card-text">フォロー中のユーザーのプロフィール情報などがここに表示されます。</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection
