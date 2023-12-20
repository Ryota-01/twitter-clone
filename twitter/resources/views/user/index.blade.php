@extends('layouts.app')

@section('content')
  {{-- <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <p><a href="{{ route('users.getFollowedUsers') }}">フォロー一覧</a></p>
        <p><a href="{{ route('users.getFollowers') }}">フォロワー一覧</a></p>
      </div>
    </div>
  </div>
 --}}
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        @foreach($users as $user)
          @if(auth()->check() && $user->id !== auth()->user()->id)
          <!-- ユーザーカードのループ -->
          <div class="card">
            <div class="card-header p-3 w-100">
              <div class="d-flex">
                <img src="user1.jpg" alt={{ $user->name }} class="rounded-circle" width="60" height="60">
                <div class="ml-2 d-flex flex-column">
                  <p class="mb-0">{{ $user->name }}</p>
                  @if (auth()->user()->isFollowed($user->id))
                    <div class="px-2">
                      <span class="px-1 bg-secondary text-light">フォローされています</span>
                    </div>
                  @endif
                </div>
                <div class="d-flex justify-content-end flex-grow-1">
                  @if (auth()->user()->isFollowing($user->id))
                  <form action="{{ route('users.unfollow', ['id' => $user->id]) }}" 
                    method="POST" 
                    class="text-right"
                  >
                    @csrf
                    @method('DELETE')
                    <div class="text-right">
                      <button type="submit" class="btn btn-danger">フォロー解除</button>
                    </div>
                  </form>
                  @else
                  <form action="{{ route('users.follow', ['id' => $user->id]) }}" 
                    method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">フォローする</button>
                  </form>
                  @endif
                </div>
              </div>
            </div>
          </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
@endsection
