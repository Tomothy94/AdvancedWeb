

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
                    Welcome to the Team page!
                  
                </div>

                <div class="links">
<!--                    <a href="https://laravel.com/docs">Documentation</a>-->

                    <a href="http://localhost:8000/teams">Team</a>
                     <a href="http://localhost:8000/fixtures">Fixtures</a>
                    <a href="http://localhost:8000"> Home page</a>
                </div>
                    
                <form role="form" method="POST" action="{{ url('/addteam') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class='form-group'>
                        <input type='text' placeholder="Team Name" name='name'/>
                        <input type='submit' class='form-control' value="Add">
                    </div>
                </form>   
                
                        <div class ="position-ref full-height" style="margin-top: 40px;">           
                                    @foreach ($teamsresult as $teamresult)
                                    <li>{{ $teamresult['TeamName'] }}</li>
                
                                    <form role="form" method="POST" action="{{ url('/editteam') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="Name" value="{{$teamresult['TeamName']}}"/>
                                        <input type="hidden" name="Id" value="{{$teamresult['TeamId']}}"/>
                                        <input type="submit" value="Edit" />
                                    </form>
                

                                      @endforeach
                            </div>
                </div>
            </div>
    </body>
</html>




