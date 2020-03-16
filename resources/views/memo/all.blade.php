@extends('layouts.front')
@section('content')

        <div class="cond_text_area">
                <form action="{{ action('MemoController@all') }}" method="get">
                    <label class="cond_text_title">メンバー検索</label>
                    <input type="text" class="cond_form" name="cond_title" value="{{ $cond_title }}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn-2" value="検索">
                </form>
        </div>        
        
        
                    <table class="all_memo_title">
                        <thead>
                            <tr>
                                <th>日付</th>
                                <th>握手した人</th>
                                <th>会話の内容</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody class="all_memo_table">
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ \Str::limit($post->date) }}</td>
                                    <td>{{ \Str::limit($post->member) }}</td>
                                    <td>
                                        <div class="details">
                                            <a href="{{ action('MemoController@detail', ['id' => $post->id]) }}">詳細</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="details">
                                            <a href="{{ action('MemoController@delete', ['id' => $post->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
        

@endsection