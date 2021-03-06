<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Index</title>
    </head>
    <body>
    {{-- layouts/admin.blade.phpを読み込む --}}
    @extends('layouts.admin')
    
    {{-- admin.blade.phpの@yield('title')に'登録済みニュースの一覧'を埋め込む --}}
    @section('title', '登録済みプロフィールの一覧')

    {{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
    @section('content')
        <div class="container">
            <div class="row">
                <h2>プロフィール一覧</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ action('Admin\ProfileController@add') }}" role="button" class="btn btn-primary">新規作成</a>
                </div>
                <div class="col-md-8">
                    <form action="{{ action('Admin\ProfileController@index') }}" method="get">
                        <div class="form-group row">
                            <label class="col-md-2">タイトル</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                            </div>
                            <div class="col-md-2">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="list-news col-md-12 mx-auto">
                    <div class="row">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th width="10%">ID</th>
                                    <th width="20%">氏名</th>
                                    <th width="10%">性別</th>
                                    <th width="20%">趣味</th>
                                    <th width="30%">自己紹介</th>
                                    <th widht="10%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $profile)
                                    <tr>
                                        <th>{{ $profile->id }}</th>
                                        <td>{{ \Str::limit($profile->name, 10) }}</td>
                                        <td>{{ \Str::limit($profile->gender, 10) }}</td>
                                        <td>{{ \Str::limit($profile->hobby, 50) }}</td>
                                        <td>{{ \Str::limit($profile->introduction, 250) }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">編集</a>
                                            </div>
                                            <div>
                                                <a href="{{ action('Admin\ProfileController@delete', ['id' => $profile->id]) }}">削除</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    </body>
</html>