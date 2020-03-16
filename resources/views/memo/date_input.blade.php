@extends('layouts.front')
@section('content')

      <div class="container">
        <div class="card-contents">
              <form action="{{ action('MemoController@date') }}"  method="post" enctype="multipart/form-data">
              
              @if (count($errors) > 0)
                <ul>
                  @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                  @endforeach
                </ul>
              @endif
                  
              <h2 class="text-title">話した日は？</h2>    
               <div class="text">
                  <input type="text" class="form-control" name="date" value="{{ old('date') }}">
                </div>
                
                <h2 class="text-title">誰との会話ですか？</h2>    
               <div class="text">
                  <input type="text" class="form-control" name="member" value="{{ old('member') }}">
                </div>
                  
                  {{ csrf_field() }}
                  
                  <div class="text"> 
                      <input type="submit" class="btn" name="next" value="次へ">
                  </div>
            </form> 
        </div>
      </div>
      
@endsection