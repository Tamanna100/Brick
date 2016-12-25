<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ContactUs;
use App\Product;
use App\Item;
use App\DB;
use App\Session;
use App\MakeOrder;



class PublicController extends Controller
{
    


    public function postContact(Request $request)
    {
    	$contact= new ContactUs([
            'contact_name'=>$request->input('contact_name'),
            'contact_email'=>$request->input('contact_email'),
            'contact_subject'=>$request->input('contact_subject'),
            'contact_sms'=>$request->input('contact_sms'),

            ]);

        $contact->save();
        
        return redirect()->route('public.contact');
    }


public function showProduct()
{
    $products = Product::all();



    return view('public.product')->with('products',$products);


}


public function getMakeOrder()
{
   $products = Product::all();
   $items=Item::all();


    return view('client.makeOrder')->with('products',$products)->with('items',$items);
}

public function postMakeOrder(Request $request)
{
   
 $pro_name = $request->input('productName');
 $quantity=$request->input('quantity');

   $product_id =Product::where('product_name', 'like', $pro_name)
                ->value('id');


$itemCost = Item::join('products', 'items.product_id', '=', 'products.id')         
            ->select('items.cost')
            ->where('items.product_id', '=', $product_id)
            ->get();

$totalPrice = $itemCost*$quantity;


        $makeOrder = new MakeOrder;
        $makeOrder->name = $pro_name;
        $makeOrder->quantity = $quantity;
        $makeOrder->unit_price = $itemCost;
         $makeOrder->total_price  = $totalPrice;
        
        

        $makeOrder->save();

         return view ('client.showMakeOrder')->with('makeOrder',$makeOrder);


}





}
