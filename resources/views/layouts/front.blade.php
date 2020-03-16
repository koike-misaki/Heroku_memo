<!DOCTYPE HTML>
<html>
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Oshimem!o</title>
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/normalize.css') }}">
  </head>
  
  <body>
   <header>
    <div class="main">
      <div class="header-title-area">
        <h1 class="logo"> Oshimem!o </h1>
        <p class="text-sub"> 推し × memo 〜推しとの会話を記録に残そう！〜</p>
      </div>
    
        <ul class="header-navigation">
            <li><a href= "{{ action('MemoController@all') }}">All</a></li>    
            <li><a href="{{ action('MemoController@date') }}">create</a></li>
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @else
                <li>
                    <a class="nav-link" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
          @endguest
        </ul>
    </div>
   </header>
      
    <div class="main">
     @yield('content')
    </div>
    
    <footer>
     <p class="copyright">(C) oshimem!o</p>
    </footer>
    
  </body>
  </html>