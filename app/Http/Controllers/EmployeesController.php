<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;
use Illuminate\Validation\Rule;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $employees =  Employee::paginate(10);
     
        return view('employees/index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees/add',compact('companies'));
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
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'email',
    ]);
        $employee = new Employee();
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $employee->phone = request('phone');
        $employee->email = request('email');
        $res = Company::find(request('company'));
        if($res)$employee->company = request('company');
        $employee->save();
        return redirect('/employees');

    
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
        $companies = Company::all();
        $employee = Employee::find($id);
        if($employee) return view('employees/add',compact('employee','companies'));
         return redirect('/employees');
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
        $employee =  Employee::find($id);
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $employee->phone = request('phone');
        $employee->email = request('email');
        $res = Company::find(request('company'));
        if($res)$employee->company = request('company');
        $employee->save();
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $employee =  Employee::find($id)->delete();
         echo json_encode(array('type'=>'success'));
         dd();
    }

}
