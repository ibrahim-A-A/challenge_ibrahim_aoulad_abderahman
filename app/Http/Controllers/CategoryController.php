<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements=Category::all();
        return Inertia::render('Categories/Index',['elements'=>$elements])->with('success','Congratulations, your Category has been saved.');;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     //===> this function for get categories 
    public function getCategories()
    {
        return Category::where('parent_id',0)->get();
    }

    public function create()
    {
        return Inertia::render('Categories/Create',['categories'=>$this->getCategories()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element=new Category();
        $element->name_category=$request['name_category'];
        if($request['parent_id']!=null)
        {
          $element->parent_id=$request['parent_id'];
        }
        else 
        { 
            $element->parent_id=0;
        }
        $element->save();
        return Redirect::route('categories.index')->with('success','Congratulations, your Category has been saved.');      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element= Category::where('id',$id)->first();
        return Inertia::render('Categories/Edit',['element'=>$element,
        'categories'=>$this->getCategories()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $element= Category::where('id',$id)->first();
        $element->name_category=$request['name_category'];
        $element->parent_id=$request['parent_id'];
        $element->update();
        return Redirect::route('categories.index')->with('success','Congratulations, your Category has been update.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element= Category::where('id',$id)->first();
        $element->delete();
        return Redirect::route('categories.index')->with('success','Congratulations, your Category has been delete.'); 
    }
}
