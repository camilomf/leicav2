<?php

namespace App\Http\Controllers;

use App\Item;
use App\Inventory;
use App\Modelo;
use App\Category;
use App\State;

use Illuminate\Http\Request;

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
        $id=1;
        return view('item.index',compact('items','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventories = Inventory::all();
        $modelos = Modelo::all();
        $categories = Category::all();
        return view('item.create',compact('inventories','modelos','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'serialnumber' => 'required'
          ]);

          $item = new Item();
          $item->serialnumber = $request->get('serialnumber');
          $item->price = $request->get('price');
          $item->detail = $request->get('detail');
          $item->modelo_id= $request->get('modelo_id');
          $item->category_id= $request->get('category_id');
          $item->inventory_id= $request->get('inventory_id');
          $item->state_id= 1;
          $item->save();

        //   itemType::create($request->all());
          return redirect()->route('items.index')
                          ->with('success', 'Item agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('item.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $inventories = Inventory::all();
        $modelos = Modelo::all();
        $categories = Category::all();
        $states = State::all();

        return view('item.edit',compact('item','inventories','modelos','categories','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'serialnumber' => 'required',
          ]);
          $item = Item::find($id);
          $item->serialnumber = $request->get('serialnumber');
          $item->price = $request->get('price');
          $item->detail = $request->get('detail');
          $item->modelo_id= $request->get('modelo_id');
          $item->category_id= $request->get('category_id');
          $item->inventory_id= $request->get('inventory_id');
          $item->state_id=$request->get('state_id');
          if($item->state->id==3 && $item->inventory!=null){
            $inventory=Inventory::find($item->inventory->id);
            $inventory->state_id=3;
            $inventory->save();
          }
          elseif($item->state->id==5 && $item->inventory!=null){
            $inventory=Inventory::find($item->inventory->id);
            $inventory->state_id=5;
            $inventory->save();
          }
          $item->save();
          return redirect()->route('items.index')
                          ->with('success', 'Item actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect()->route('items.index')
                        ->with('success', 'Item eliminado exitosamente');
    }
}
