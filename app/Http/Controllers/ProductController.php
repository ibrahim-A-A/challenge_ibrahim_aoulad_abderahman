<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements=Product::all();
        return Inertia::render('Products/Index',['elements'=>$elements]);
    }

     // this function for get list products and filtre with price and category
    public function listingProducts(Request $request)
    {
         $pricemin=false;
         $pricemax=false;
         $category=null;

         if($request->has('category') && $request->input('category')!=0)
         {
             $category=$request->input('category');
         }
         if($request->has('pricemin') && $request->input('pricemin')!='')
         {
             $pricemin=true;
         }
         if($request->has('pricemax') && $request->input('pricemax')!='')
         {
             $pricemax=true;
         }

        $elements = Product::query()
        ->when($pricemin,function($query) use ($request){
            $query->where('price','>=',$request->input('pricemin'));
        })  
        ->when($pricemax,function($query) use ($request){
            $query->where('price','<=',$request->input('pricemax'));
        }) 
        ->when($category,function($query) use ($request){
            $query->where('category_id','=',$request->input('category'));
        })  
        ->orderBy('created_at','desc')       
        ->paginate(6);

        return Inertia::render('Products/ListingProducts',['elements'=>$elements,
        'categories'=>$this->GetCategories()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // ==> this function for get ctaegories 
    public function getCategories()
    {
      return Category::where('parent_id',0)->with("subcategories")->get();
    }

    public  function create()
    {    
      //  dd($this->getCategories());
        return Inertia::render('Products/Create',['categories'=>$this->getCategories()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element=new Product();
        $element->name_product=$request['name_product'];
        $element->description=$request['description'];
        $element->price=$request['price'];
        $element->category_id=$request['category_id']; 

        if($request->hasFile('image'))
        {
        $image = request()->file('image');              
        $imageName = $image->getClientOriginalName();
        $imageName = time().'_'.$imageName;     
        $destinationPath = public_path('/images/');
        $image->move($destinationPath,$imageName);           
        $element->image = $imageName;
        }
         
        $element->save();
        return Redirect::route('products.index')->with('success','Congratulations, your Product has been saved.');      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ===> this function get one product
    public function getOneProduct($id)
    {
         return Product::where('id',$id)->first();
    }

    public function show($id)
    {
        return Inertia::render('Products/Show',['element'=>$this->getOneProduct($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        return Inertia::render('Products/Edit',['element'=>$this->getOneProduct($id),
        'categories'=>$this->getCategories()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $element= Product::where('id',$request['id'])->first();
        $element->name_product=$request['name_product'];
        $element->description=$request['description'];
        $element->price=$request['price'];
        $element->category_id=$request['category_id']; 

        if($request->hasFile('image'))
        {
        $image = request()->file('image');              
        $imageName = $image->getClientOriginalName();
        $imageName = time().'_'.$imageName;     
        $destinationPath = public_path('/images/');
        $image->move($destinationPath,$imageName);           
        $element->image = $imageName;
        }
         
        $element->update();
        return Redirect::route('products.index')->with('success','Congratulations, your Product has been Update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $element=Product::where('id',$id)->first();
           $element->delete();
           return Redirect::route('products.index')->with('success','Congratulations, your Product has been Deleted.');
    }
}
