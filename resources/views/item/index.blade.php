<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
     

    </head>
    <body>
        
            @include('header')
        <div class="container">  
            <div class="left">
                @include('leftmenu')
            </div>
            <div class="right">
                @foreach ($items as $item)
                    {!!$item->card($remembered,$addremove)!!}
                @endforeach
            </div>
         
        </div>        
          
    </body>
</html>

<script>
    data = [];
        window.addEventListener("load",function () {
            let elements = document.getElementsByName("addremove");
            for (let i = 0; i < elements.length; i++) {
                elements[i].addEventListener('focusout',function() {
                    data['id'] = this.id,
                    data['val'] = this.value;

                    console.log(data);
                    let kintamasis = 7;
                    // let ajaxurl = "{{route('item.addremove2')}}"+"/"+7;
                    // ajaxurl = ajaxurl.replace(':kintamasis', kintamasis);
                    // let ajaxurl = '{{ route("item.addremove2") }}';

                    let ajaxurl = '{{ route("item.addremove2") }}';
                   if(this.id.includes(" "))
                   {
                    ajaxurl += "?id="+ this.id.replace(" ","");
                    console.log(" nukirpom tarpa");
                   }else{
                    ajaxurl += "?id="+ this.id;
                   }
                    ajaxurl += "&val="+ this.value;
                    $.get(
                    ajaxurl,
                    // data = [this.id,this.value],
                    function (data) {
                        console.log(data);
                        console.log('baigem darba');
                    }
                    ); 
                });
                
            }
        });
    </script>