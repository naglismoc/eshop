<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Photo;
class ItemController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index','create');
        
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        // $_SESSION['addremove']=[];
        // $_SESSION['rememberedItems']=[];
        // dd($_SESSION['addremove']);
        $items = Item::all();   
       return view ('item.index',
       ['items' => $items,
       "remembered" => $_SESSION["rememberedItems"],
       "addremove" =>  $_SESSION['addremove']]);
    }

    public function singleCard($id)
    {
        $id = (((($id-10)/47)-16)/34);
        $item = Item::find($id);   
        if($item==null){
            return redirect()->route("item.index");
        }
       return view ('item.singleCard',['item' => $item]);
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
    public function remember($id)
    {
        session_start();
        if(!isset($_SESSION['rememberedItems'])){
            $_SESSION['rememberedItems']=[];

        }
       // if(!in_array($id,$_SESSION['rememberedItems'])){
            // array_push($_SESSION['rememberedItems'],$id);
            $_SESSION['rememberedItems'][$id]=$id;
      // }
        return redirect()->route('item.index');
    }

    public function forget($id)
    {
        session_start();
        unset($_SESSION['rememberedItems'][$id]);

        $urlParts = explode("/", \URL::previous());

        $urlEnd = $urlParts[count($urlParts)-1];

        if( $urlEnd=="item"){
            return redirect()->route('item.index');
        }
        if( $urlEnd=="isiminti"){
            return redirect()->route('item.'.$urlEnd);
        }
        return "ItemController@forget nurodyk blade i kuri turi gryzti";
    }

    public function addremove($id,$amount)
    {   
        session_start();
        if(!isset($_SESSION['addremove'])){
            $_SESSION['addremove']=[];

        }

            $_SESSION['addremove'][$id]+=$amount;
            if($_SESSION['addremove'][$id]<0){
                $_SESSION['addremove'][$id]=0;
            }
  
        return redirect()->route('item.index');
    }

    public function addremove2()
    { 
        session_start();
        // $_SESSION['addremove']=[];
    //    unset( $_SESSION['addremove'][1]);
    //    unset(   $_SESSION['addremove'][2]);
    //    unset(  $_SESSION['addremove'][3]);
        $id= $_GET['id'];
        $amount= $_GET['val'];
        //  dd($_SESSION['addremove']);
        
        if(!isset($_SESSION['addremove'])){
            $_SESSION['addremove']=[];

        }
        // $request['data']
       
            $_SESSION['addremove'][$id] = $amount;
            if($_SESSION['addremove'][$id]<0){
                $_SESSION['addremove'][$id]=0;
            }
  
        return json_encode($_SESSION['addremove']);
    }
    public function sort($word)
    {;
        session_start();
        // $_SESSION['rememberedItems']=[];
        // dd(session_id());
        $items = Item::where('category','=', $word)->get();   
    
       return view ('item.index',['items' => $items,"remembered"=>$_SESSION["rememberedItems"],"addremove"=>$_SESSION['addremove']]);
    }





    public function isiminti()
    {  
        session_start();
        $items = Item::whereIn('id', $_SESSION['rememberedItems'])->get();
    
        return view ('item.remembered',['items' => $items,"remembered"=>$_SESSION["rememberedItems"],"addremove"=>$_SESSION["addremove"]] );
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
            $item->category =$request->category;

            $description = [];
            array_push( $description,$request->color);
            array_push( $description,$request->warranty);
            array_push( $description,$request->discount);
            array_push( $description,$request->manufacturer);
          
            // dd(json_encode($description));
            $item->description =json_encode($description);
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
