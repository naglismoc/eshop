
        
        
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
                        <a href="{{route('user.edit',Auth::User()->id)}}">Įsiminti</a>
                         | prekių kiekis | -[]+ | PRIDĖTI Į KREPŠELĮ
                    </div>  
                </div>       
            </div>
        </a>;