<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <!-- Styles -->
{{-- <style>
 

    .container{
    width: 80%;
    margin-left:10%;
    background-color: orange;
    height: 800px;
    }
    .filter{
        width: 100%;
        height:50px;
        background-color: violet;
}
    .card{
        width: calc(100% - 40px);
        margin: 10px 20px;
        background-color: chocolate;
        height: 120px;
    }
    .photo{
        display: inline-block;
        float: left;
        width: 20%;
    }
    .card-right{
        display: inline-block;
        float:right;
        width:80%;
        background-color: brown;
        height:120px;
    }
    img{
    width: 100%;
    height: 120px;
    object-fit: contain;
    }
    .card-up{
       
        width: 100%;
        height: 60%;
        background-color: rgb(236, 215, 215);
    }
    .card-down{
        /* margin-left: 20px; */
        width: 100%;
        height: 40%;
        background-color: rgb(168, 149, 149);
    }
  
    .card-up-name{
        display: inline-block;
        float:left;
        width:70%;
        height: 60%;
    }
    h2{
       
       margin-left: 20px;
       margin-block-start: 0;
       margin-block-end: 0;
   }
   .card-up-price{
        display: inline-block;
        float:right;
        width:30%;
        height: 60%;
    }
    .card-up-price-old{
        
       margin-top: 10px;
        display: inline-block;
        float:left;
        width: 40%;
        font-weight: 100;
        font-size: 15px;
        text-decoration: line-through;
    }
    .card-up-price-new{
        display: inline-block;
        float:right;
        width: 60%;
        font-weight: 900;
        font-size: 25px;
        color: red;
        text-align:right;
    }
    .card-up-price-normal{
        display: inline-block;
        float:right;
        width: 60%;
        font-weight: 900;
        font-size: 25px;
        color: black;
        text-align:right;
    }
    .card-up-down{
        display: block;
        width:100%;
        height:40%;
        background-color: antiquewhite;
    }

</style> --}}
    </head>
    {{-- <body class="antialiased" >
        
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
                </div>
            @endif --}}

            {{-- <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">container
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0"> --}}
             
                  
              {{-- @auth  
                @if (auth()->user()->permission_lvl>=10)
                Sveikas prekiu pildytojau
                @else
                Sveikas
                @endif
              @endauth --}}
              

               
        <div class="container">  
            @include('header')
            <h1>Jūsų įsimintos prekės</h1>
       
            @foreach ($items as $item)
           
                {!!$item->card($remembered,$addremove)!!}
            @endforeach
        </div>        
          
    </body>
</html>
