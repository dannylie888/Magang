<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <style>
  html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Raleway', sans-serif;
    font-weight: 100;
    height: 100vh;
    margin: 0;
  }

  .full-height {
    height: 100vh;
  }

  .flex-center {

    display: flex;
    justify-content: center;
  }

  .position-ref {
    position: relative;
  }

  .top-right {
    position: absolute;
    right: 10px;
    top: 18px;
  }

  .content {
    text-align: center;
  }

  .title {
    font-size: 84px;
  }

  .links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
  }

  .m-b-md {
    margin-bottom: 30px;
  }
  </style>
</head>
<body>
  <div class="flex-center position-ref full-height" style="padding:10px;">
    @if (Route::has('login'))
    <div class="top-right links">
      @if (Auth::check())
      <a href="{{ url('/home') }}">Home</a>
      @else
      <a href="{{ url('/login') }}">Login</a>
      <a href="{{ url('/register') }}">Register</a>
      @endif
    </div>
    @endif

    <div class="content" style="margin:10%;">
      <div class="col-md-8 col-md-offset-2" style="margin-top:5%;">
        <p style="font-size:500%;">
        Article Today</p>
      </div>
      <div class="row">
        <div>
          <div class="col-md-8 col-md-offset-2" style="padding-bottom:10px;">

            @foreach($post as $a)

            <div>
              <h1 >
                <a href={{"/showpage/".$a->id}} style="text-decorations:none; color:inherit;">
                  {{$a->judul}}
                </a>
              </h1>
            </div>


            <div><img src={{"images/".$a->image}} height="256" width="341" >
              <p style="color:black;text-align:left;">{{$a->created_at}}</p>



              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

        <!-- <div class="links">
          <a href="https://laravel.com/docs">Documentation</a>
          <a href="https://laracasts.com">Laracasts</a>
          <a href="https://laravel-news.com">News</a>
          <a href="https://forge.laravel.com">Forge</a>
          <a href="https://github.com/laravel/laravel">GitHub</a>
        </div> -->
</div>
  </body>
  </html>
