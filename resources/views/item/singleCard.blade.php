<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
<style>
 

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
    .single-card{
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
    .card-up-down{
        display: block;
        width:100%;
        height:40%;
        background-color: antiquewhite;
    }

</style>
    </head>
 
               
<div class="container">  

    @include('header')

        <div class="single-card">

        {{$item->name}}

        </div>

</div>
          

                        

                            
                            </tr>
                       
                    </table>
                </div> 
          
    </body>
</html>
