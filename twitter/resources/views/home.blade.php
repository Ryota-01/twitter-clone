@extends('layouts.app')

@section('title', 'ホーム')

@section('content')
    <div class='container'>
        <div class='row justify-content-center'>
            <div class='col-md-8'>
                <div class='card'>
                    <div class='card-header'>{{ __('Dashboard') }}</div>
                    <div class='card-body'>
                        @if (session('status'))
                            <div class='alert alert-success' role='alert'>
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div>
                                {{ session('success') }}
                            </div>
                        @endif
                        {{ __('You are logged in!') }}
                    </div>

                    <div>
                        <a href="{{ route('tweet.create') }}">
                            ツイートする
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('tweet.getAll') }}">
                            ツイート一覧
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
