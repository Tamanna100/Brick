<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Customer;

use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
                $customers = DB::table('customers')
                ->orderBy('id','asc')
                ->get();

        $search = $request->input('search');

                if(!empty($search))
                {
                    $customers = Customer::where('customer_name', 'like','%' .$search. '%')
                    ->get();
                }


        //return a view and pass the data to that view
        return view('admin.customer.indexCustomer')->with('customers',$customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.createCustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $customer = new Customer([
            'customer_name'   =>$request->input('customer_name'),
            'age' =>$request->input('age'),
            'gender' =>$request->input('gender'),
            'memebr_type' =>$request->input('memebr_type'),
            'company_name' =>$request->input('company_name')
            ]);



       $customer->save();

    
       $request->session()->flash('success', 'you have successfully done the work');
        return redirect()->route('customers.show', $customer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return redirect()->route('customers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $customer = Customer::find($id);

        //return the view and pass the variable

        return view('admin.customer.editCustomer')->with('customer',$customer); 
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
 $customer = Customer::find($id);

        $customer = new Customer([
            'customer_name' =>$request->input('customer_name'),
            'age'           =>$request->input('age'),
            'gender'        =>$request->input('gender'),
            'member_type'   =>$request->input('member_type'),
            'company_name'  =>$request->input('company_name')
            ]);



       $customer->save();

    
       $request->session()->flash('success', 'you have successfully done the work');
        return redirect()->route('customers.show', $customer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);

        $customer->delete();

        Session::flash('success', 'The customer was successfully deleted.');
        return redirect()->route('customers.index');
    }
}
