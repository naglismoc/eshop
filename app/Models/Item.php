<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function photos()
    {
        return $this->hasMany('App\Models\Photo', 'item_id', 'id');
    }
    public function photo()
    {
        return  Photo::photo($this->id);
    }
    public function discount()
    { if(json_decode($this->description)[2]==0){
        return false;
    }
        return json_decode($this->description)[2];
    }

    public function prices(){
        // dd($this->price);
        if($this->discount()){
            return ' <div class="card-up-price-old">
                    '.$this->price.'
                    </div>
                    <div class="card-up-price-new" >
                        €'.round($this->price*((100-$this->discount())/100),2).'
                    </div>';
        }else{
            return '
            <div class="card-up-price-normal" >
                €'.$this->price.'
            </div>';
        }
    }
    public function card($remembered,$addremove){
        $this->id;
        $r=false;
        if(in_array( $this->id,$_SESSION['rememberedItems'])){
            $r=true;
        }
        return view('item.card',["item"=>$this,"isRemembered"=>$r,'addremove' => $addremove]);


    }

}
