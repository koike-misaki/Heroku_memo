@extends('layouts.front')
@section('content')

    <div class="container-2">
        <div class="member">
            {{ $date }}  {{ $member }} との接触レポート
        </div>
    
        @foreach($detail_memo as $memo)
            <div class={{ $memo->which == 'me' ? "right" :  "left" }}>
                {{ $memo->comment }}
                <div class="detail_delete">
                    <a href="{{ action('MemoController@detail_delete', ['id' => $memo->id, 'all_id' => $memo->all_id]) }}">削除</a>
                </div>
                <div class="detail_edit">
                    <a href="{{ action('MemoController@edit', ['id' => $memo->id]) }}">編集</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection