<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use App\Factory;

use App\Location;


class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $factories = Factory::with('location')
                    ->orderBy('id','asc')
                    ->get();


        $search = $request->input('search');

                if(!empty($search))
                {
                    $factories = Factory::where('factory_code', 'like','%' .$search. '%')
                    ->get();
                }

        return view('admin.factory.indexFactory')->with('factories',$factories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.factory.createFactory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $postalCode= $request->input('postalCode');
      

       
        $postal_code = DB::table('locations')
                ->where('postal_code', 'like', $postalCode)
                ->value('id');  
   
        // store in the database
        $factory = new Factory;

        $factory->factory_code = $request->factory_code;
        $factory->location_id        = $postal_code;

        $factory->save();



    
        Session::flash('success', 'The  factory was successfully save!');

        return redirect()->route('factories.show', $factory->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $factory= Factory::find($id);
        //   return view('admin.factory.indexFactory');
        return redirect()->route('factories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    

        $locations = Location::all();
        



        $factory = factory::find($id);

        //return the view and pass the variable

        return view('admin.factory.editFactory')->with('factory',$factory);
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
       $postalCode= $request->input('postalCode');
      

       
        $postal_code = DB::table('locations')
                ->where('postal_code', 'like', $postalCode)
                ->value('id');  
   
        // store in the database
        $factory = Factory::find($id);

        $factory->factory_code = $request->factory_code;
        $factory->location_id        = $postal_code;

        $factory->save();



    
        Session::flash('success', 'The  factory was successfully save!');

       return redirect()->route('factories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factory = Factory::find($id);

        $factory->delete();

        Session::flash('success', 'The factory was successfully deleted.');
        return redirect()->route('factories.index');
    }
}
