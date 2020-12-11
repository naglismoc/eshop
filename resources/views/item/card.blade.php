
        
        
        <a href="{{route('item.singleCard', (((($item->id*34)+16)*47)+10) )}}">
         
            <div class='card'> 
                <div class='photo'>
    
                    <img src="{{asset('img/items/'.$item->photo().".jpg")}}"  alt="">
                </div>
                <div class='card-right'>
                    <div class='card-up'>
                        <div class='card-up-name'>
                            <h2> {{$item->name}}</h2>
                        </div>
                        <div class='card-up-price'>
                            {!!$item->prices()!!}
                        </div> 
                        <div class='card-up-down'>
                        Garantinis: 2 metai.
                        </div>    
                    </div>
                    <div class='card-down'>
                        @if ($isRemembered)
                        <a href="{{route('item.forget',$item->id)}}">Pamiršti</a>
                        @else
                        <a href="{{route('item.remember',$item->id)}}">Įsiminti</a>
                        @endif
                        prekių kiekis:
                    
                        <a class="addremove" href="{{route('item.addremove',['id' => $item->id, 'amount' => -1])}}">-</a>
                       
                        @if (isset($addremove[$item->id]))
                            <input type="text" id="{{$item->id}} "name="addremove" size="1" value="{{$addremove[$item->id]}}">
                        @else
                            <input type="text" id="{{$item->id}}" name="addremove"  size="1" value="0">
                        @endif
                        
                        <a class="addremove" href="{{route('item.addremove',['id' => $item->id, 'amount' => 1])}}">+</a>
                        {{-- <a href="{{ route('post.show', ['category' => $post->category->title, 'post' => $post->id]) }}"></a> --}}
                         PRIDĖTI Į KREPŠELĮ
                        
                    </div>  
                </div>       
            </div>
        </a>

        
        {{-- // (function(){
        //     let element = document.getElementById(<?php $item->id?>);
        //   //  for (let i = 0; i < elements.length; i++) {
        //         element.addEventListener('focusout',function() {
                  
        //             data[this.id]=this.value;
        //             console.log(data);

        //        });
                
        //     // }
        // });
     --}}