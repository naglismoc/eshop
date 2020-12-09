<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id', 'id');
    }

    public static function photo($id){
        $t = Photo::where("item_id", "=", $id)->first();
      
        if($t==null){
            return 0;
        }
         return $t->id;
    }
}
