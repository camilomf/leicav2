<?php

namespace App\Http\Controllers;

use DB;
use App\Category;
use App\Inventory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware(['auth',
        'roles:Admin,User'
        ]);

    }
    
    public function index()
    {
        $categories=Category::where('id','!=',1)->get();
        $id=1;
        return view('category.index',compact('categories','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assets = DB::table('assets')->get();
        return view('category.create',compact('assets'));
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
            'name' => 'required|unique:categories',
          ]);


          $category = new Category();
          $category->name = $request->get('name');
          $category->assets_id = $request->get('assets_id');
          $category->save();

          return redirect()->route('category.index')
                          ->with('success', 'Categoria agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('category.detail', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $assets = DB::table('assets')->get();

        return view('category.edit',compact('category','assets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //   ]);
          $category = category::find($id);
        //   $category->name = $request->get('name');
          $category->assets_id = $request->get('assets_id');
          $category->save();
          return redirect()->route('category.index')
                          ->with('success', 'categoria actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $lists = DB::table('inventories')->where('category_id',$id)->get();
        foreach($lists as $list){
            $list=Inventory::find($list->id);
            $list->category_id = 1;
            $list->save();
        }

        $category->delete();
        return redirect()->route('category.index')
                        ->with('success', 'categoria eliminada exitosamente');
    }
}
