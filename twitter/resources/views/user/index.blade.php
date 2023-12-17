@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <p><a href="{{ route('users.getFollowedUsers') }}">フォロー一覧</a></p>
        <p><a href="{{ route('users.getFollowers') }}">フォロワー一覧</a></p>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1>User List</h1>
        @foreach($users as $user)
        @if(auth()->check() && $user->id !== auth()->user()->id)
        <!-- ユーザーカードのループ -->
        <div class="card mb-3">
          <div class="card-body">
          {{-- <img src="user1.jpg" alt={{ $user->name }} class="img-fluid rounded-circle"> --}}
          <h5 class="card-title">{{ $user->name }}</h5>
            @if (auth()->user()->isFollowed($user->id))
              <div class="px-2">
                <span class="px-1 bg-secondary text-light">フォローされています</span>
              </div>
            @endif
            <div class="d-flex justify-content-end my-auto">
              @if (auth()->user()->isFollowing($user->id))
                <form action="{{ route('users.unfollow', ['id' => $user->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">フォロー解除</button>
                </form>
              @else
              <form action="{{ route('users.follow', ['id' => $user->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">フォロー</button>
              </form>
              @endif
            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
  </div>
@endsection
