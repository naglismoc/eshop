<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Photo;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();   
        // TradeController::populate($stocks);
       return view ('item.index',['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => ['min:3','max:64'],
            'price' => ['numeric','min:0','max:9999'],
            'quantity' => ['min:0','max:999999'],
            
        ],
        [
            'name.min' => 'Akcijos vardas per trumpas',
            'name.max' => 'Akcijos vardas per ilgas',

            'price.numeric' => 'Akcijos kodas vardas privalomas',
            'price.min' => 'Akcijos kodas vardas per trumpas',
            'price.max' => 'Akcijos kodas vardas per ilgas',

            'quantity.min' => 'Akcijos vardas per trumpas',
            'quantity.max' => 'Akcijos vardas per ilgas',

        ]);
            if($validator->fails()){
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }

            $item = new Item();
            $item->name =$request->name;
            $item->price =$request->price;
            $item->quantity =$request->quantity;
            $item->description =$request->description;
            $item->status = 3;
            $item->save();  
                
                
            if ($request->has('photos')) {
                $folder = public_path('img/items');
               
                foreach ($request->file('photos') as $photo) {
                    $p = new Photo();
                    $p->item_id =$item->id;
                    $p->save();

                    $img = Image::make($photo);
                    $fileName = $p->id.'.jpg';
                    $img->resize(270,null,function ($constraint){
                            $constraint->aspectRatio();
                    });
                    $img->save($folder.'/'.$fileName,100, 'jpg');
                }
            }

                return redirect()->route('item.index')->with('success_message','Prekė sekmingai prideta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
