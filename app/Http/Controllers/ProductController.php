<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use DB;
use Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //create a variable and collect all the data from database
        //$products = Product::all();

        $products = DB::table('products')
                ->orderBy('id','asc')
                ->get();

        $search = $request->input('search');

                if(!empty($search))
                {
                    $products = Product::where('product_name', 'like','%' .$search. '%')
                    ->get();
                }

        //return a view and pass the data to that view
        return view('admin.product.indexProduct')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data


        $this->validate($request,[
            'product_name'   => 'required',
            'product_detail' => 'required'
            ]);

        //store data in database

        $product = new Product([
            'product_name'   =>$request->input('product_name'),
            'product_detail' =>$request->input('product_detail')
            ]);



       $product->save();

    
       $request->session()->flash('success', 'you have successfully done the work');
        return redirect()->route('products.show', $product->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::find($id);
         return view('admin.product.showProduct')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save to variable

        $product = Product::find($id);

        //return the view and pass the variable

        return view('admin.product.editProduct')->with('product',$product); 
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
        // Validate the data
        $this->validate($request, array(
                'product_name' => 'required',
                'product_detail'  => 'required'
            ));
        // Save the data to the database
        $product = product::find($id);

        $product->product_name = $request->input('product_name');
        $product->product_detail = $request->input('product_detail');

        $product->save();

        // set flash data with success message
        Session::flash('success', 'This product was successfully saved.');

        // redirect with flash data to posts.show
        return redirect()->route('products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        Session::flash('success', 'The product was successfully deleted.');
        return redirect()->route('products.index');
    }
}
