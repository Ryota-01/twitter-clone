@extends('layouts.app')

@section('title', 'ユーザー詳細')

@section('content')
  <div class="container mt-5" style="width: 80%">
    <div class="row">
      <div class="col-md-8">
        <!-- ユーザー名 -->
        <h4>現在のユーザー情報</h4>
        <!-- 詳細情報 -->
        <p>ユーザーネーム：{{ $userDetail->name }}</p>
        <p>Email：{{ $userDetail->email }}</p>
      </div>
    </div>
  </div>

  <div class="container mt-5" style="width: 80%">
    <div class="row">
      <div class="col-md-8">
        <h4>新しいユーザー情報</h4>
        <form action="{{ route('user.update', ['id' => $userDetail->id]) }}" method="POST">
          @csrf
          @method('PUT')
            <!-- ユーザー名編集フィールド -->
            <div class="mb-3">
              <label for="username" class="form-label">ユーザーネーム</label>
              <input type="text" class="form-control" id="username" placeholder="新しいユーザー名を入力してください" value={{ $userDetail->name }}>
            </div>
            <!-- メール編集フィールド -->
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="新しいメールアドレスを入力してください" value={{ $userDetail->email }}>
            </div>
            @if($errors->any())
            <div class="form-floating">
                @forEach($errors->all() as $error)
                  <p style="color: red">{{ $error }}</p>
                @endforeach
            </div>
          @endif
            <!-- 保存ボタン -->
            <button type="submit" class="btn btn-primary">更新</button>
        </form>
        <form action="{{ route('user.delete', ['id' => $userDetail->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-primary">削除</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection