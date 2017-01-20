<!DOCTYPE html>
<html lang="en">
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
                color: #000000;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center  {
                align-items: center;
                display: flex;
                justify-content: center;
                font-size: 20px;
                color: #000000;
                 text-transform: uppercase;
                 letter-spacing: .1rem;
                text-decoration: none;
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
                font-size: 48px;
                margin-buttom: 30px;
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
         <div class="position-ref full-height">
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

            <div class="content">
                <div class="title m-b-md">
                    Edit Team Page!
                 
                </div>

                <div class="links">
<!--                    <a href="https://laravel.com/docs">Documentation</a>-->

                    <a href="http://localhost:8000/teams">Team</a>
                     <a href="http://localhost:8000/fixtures">Fixtures</a>
                    <a href="http://localhost:8000"> Home page</a>
                </div>
                
                <div style="margin-top: 40px;">
                    <form role="form" method="POST" action="{{ url('/updateteam') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" Name="Name" value="{{$team['Name']}}"/>
                        <input type="hidden" Name="Id" value="{{$team['Id']}}"/>
                        <input type="submit" value="Update"/>
                    </form>
                    
                </div>
             
            </div> 
        </div>
    </body>
</html>
