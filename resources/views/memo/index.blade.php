@extends('layouts.front')
@section('content')

      <div class="container">
        <div class="card-contents">
                <form action="{{ action('MemoController@store') }}"  method="post" enctype="multipart/form-data">
                
                @if (count($errors) > 0)
                 <ul>
                  @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                  @endforeach
                 </ul>
                @endif
                  
              <h2 class="text-title">話し手はどっち？</h2>    
              <div class="text">
                  <label class="form-control-2" ><input type="radio" name="which" value="me">　私</label>
          
                  <label class="form-control-2" ><input type="radio" name="which" value="you">　相手</label>
                </div>
                
               <h2 class="text-title">会話内容を入れてね！</h2>
                <div class="text">
                	<input type="text" class="form-control" name="comment" value="{{ old('comment') }}">
                </div>
                  
                  {{ csrf_field() }}
                  
                  <div class = text>
                  <input type="submit" class="btn" name="next" value="次へ">
                  
                    <input type="submit" class="btn" formaction="{{ action('MemoController@exit') }}" name="next" value="終了">
                  </div>
                  </form>
            </div>
      </div>
      
@endsection