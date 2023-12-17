@extends('layouts.app')

@section('title', 'ツイート詳細')

@section('content')
    {{-- <div class='container'>
        <div class='row justify-content-center'>
            <h3>↓コメントです</h3>
            @foreach ($allReply as $reply)
                <div class='col-md-8 mb-3'>
                    <div class='card'>
                        <div class="card-haeder p-3 w-100 d-flex">
                            <img src="" class="rounded-circle" width="50" height="50">
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0">{{ Auth::user()->name }}</p>
                                <a href="" class="text-secondary"></a>
                            </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary">{{ $reply->created_at }}</p>
                            </div>
                        </div>
                        <div class='card-body'>
                            <div>
                                <p class='reply-content' id='reply-content-{{ $reply->id }}'>{{ $reply->content }}</p>
                                <form action="{{ route('tweet.editreply', ['id' => $reply->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input class="edit-formarea edit-formarea-{{ $reply->id }}" name="reply" style="display:none">
                                    <input class="edit-formbtn edit-form-button-{{ $reply->id }}" type="submit" style="display:none" value='送信'>
                                </form>
                                </p>
                            </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <button type="submit" class="edit-btn" data-reply-id="{{ $reply->id }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>

                                <form action="{{ route('tweet.deletereply', ['id' => $reply->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-body">
              <p class="card-text">{{ $tweetDetail->content }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
              <small class="text-muted">投稿日時：{{ $tweetDetail->created_at }}</small>
              <div class="d-flex">
                @php
                  $isFavorite = auth()->user()->isFavorite($tweetDetail->id);
                @endphp
                <a class="js-like-toggle {{ $isFavorite ? 'loved' : '' }} mr-3" href="" data-tweetid="{{ $tweetDetail->id }}">
                  <i class="fas fa-heart mr-2" style="vertical-align: bottom"></i>
                </a>
                <button type="submit" class="edit-btn mr-3">
                  <i class="fa-regular fa-pen-to-square" style="vertical-align: middle"></i>
                </button>
                <form action="{{ route('tweet.delete', ['id' => $tweetDetail->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="delete-btn mr-3">
                    <i class="fa-regular fa-trash-can" style="vertical-align: middle"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h3>コメント</h3>
          @foreach($allReply as $reply)
          <div class="card">
            <div class="card-body">
              <p class="card-text reply-content" id="reply-content-{{ $reply->id }}">{{ $reply->content }}</p>
              <form action="{{ route('tweet.editreply', ['id' => $reply->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input class="edit-formarea edit-formarea-{{ $reply->id }}" name="reply" style="display:none">
                <input class="edit-formbtn edit-form-button-{{ $reply->id }}" type="submit" style="display:none" value='送信'>
              </form>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
              <small class="text-muted">返信日時 : {{ $reply->created_at }}</small>

              <div class="d-flex justify-content-end flex-grow-1">
                <button type="submit" class="edit-btn" data-reply-id="{{ $reply->id }}">
                  <i class="fa-regular fa-pen-to-square"></i>
                </button>
                <form action="{{ route('tweet.deletereply', ['id' => $reply->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="delete-btn">
                    <i class="fa-regular fa-trash-can"></i>
                  </button>
                </form>
            </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
    <script src="{{ asset('/js/reply.js') }}"></script>
@endsection()
