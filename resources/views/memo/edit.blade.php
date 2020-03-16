@extends('layouts.front')
@section('content')

      <div class="container">
        <div class="card-contents">
                <form action="{{ action('MemoController@update') }}"  method="post" enctype="multipart/form-data">
                
                @if (count($errors) > 0)
                 <ul>
                  @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                  @endforeach
                 </ul>
                @endif
                
                <h2 class="text-title">次はどっちの会話？</h2>    
                <div class="text">
                  <label class="form-control-2" ><input type="radio" name="which" value="me"
                  {{ $memo->which == "me" ? "checked" : "" }}> 私</label>
          
                  <label class="form-control-2" ><input type="radio" name="which" value="you"
                  {{ $memo->which == "you" ? "checked" : "" }}>　相手</label>
                </div>
                
               <h2 class="text-title">次の会話を入れてね！</h2>
                <div class="text">
                	<input type="text" class="form-control" name="comment" value="{{ $memo->comment }}">
                </div>
                  
                  <div class = text>
                    <input type="hidden" name="id" value="{{ $memo->id }}">
                    <input type="hidden" name="all_id" value="{{ $memo->all_id }}">
                    {{ csrf_field() }}
                  
                    <input type="submit" class="btn" name="next" value="更新">
                  </div>
                  
                  </form>
            </div>
      </div>
      
@endsection