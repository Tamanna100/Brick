<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Employee;

use App\Department;
use App\Job;
use DB;
use Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Request $request)
    {
              //create a variable and collect all the data from database
               
             // $employees= Employee::all();
                  
                $employees = Employee::with('department','job') 
                              ->orderBy('employee_name', 'asc')
                              ->get();

                $search = $request->input('search');

                if(!empty($search))
                {
                    $employees = Employee::where('employee_name', 'like','%' .$search. '%')
                    
                    
                    ->get();
                }
 
                //return a view and pass the data to that view
                return view('admin.employee.indexEmployee')->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $jobs        = Job::all();
        return view('admin.employee.createEmployee')->with('departments',$departments)->with('jobs',$jobs);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $emp= $request->input('departmentName');
        $job= $request->input('jobTitle');

       
        $departmentId = DB::table('departments')
                ->where('department_name', 'like', $emp)
                ->value('id');

        $jobId = DB::table('jobs')
                ->where('job_title', 'like', $job)
                ->value('id');  

                

        // store in the database
        $employee = new Employee;

        $employee->employee_name = $request->employee_name;
        $employee->hire_date     = $request->hire_date;
        $employee->phone         = $request->phone;
        $employee->department_id = $departmentId;
        $employee->job_id        = $jobId;

        $employee->save();



    
        Session::flash('success', 'The  employee was successfully save!');

        return redirect()->route('employees.show', $employee->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
         $employee= Employee::find($id);
          return view('admin.employee.showEmployee')->with('employee',$employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $departments = Department::all();
        $jobs = Job::all();

        

        $employee = Employee::find($id);

        //return the view and pass the variable

        return view('admin.employee.editEmployee')->with('employee',$employee)->with('departments',$departments)->with('jobs',$jobs);     
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

        $emp= $request->input('departmentName');
        $job= $request->input('jobTitle');

       
        $departmentId = DB::table('departments')
                ->where('department_name', 'like', $emp)
                ->value('id');

        $jobId = DB::table('jobs')
                ->where('job_title', 'like', $job)
                ->value('id');  

                

        // store in the database
        $employee = Employee::find($id);

        $employee->employee_name = $request->employee_name;
        $employee->hire_date     = $request->hire_date;
        $employee->phone         = $request->phone;
        $employee->department_id = $departmentId;
        $employee->job_id        = $jobId;

        $employee->save();



    
        Session::flash('success', 'The  employee was successfully save!');

        return redirect()->route('employees.show', $employee->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $employee = Employee::find($id);

        $employee->delete();

        Session::flash('success', 'The employee was successfully deleted.');
        return redirect()->route('employees.index');

    }
}
