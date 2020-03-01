<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Mail\newCompany;
use Illuminate\Support\Facades\Mail;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies =  Company::paginate(10);
     
        return view('companies/index',compact('companies'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies/add');
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
        'name' => 'required|unique:companies|max:255',
        'email' => 'email',
        'logo' => 'dimensions:min_width=100,min_height=100',
    ],[
        'dimensions' => 'logo must be 100 * 100'
    ]);
        $company = new Company();
        $company->name = request('name');
        $company->email = request('email');
        $company->website = request('website');
       if($request->file('logo')){

        $logoName = $request->file('logo')->getClientOriginalName();

        $company->logo =str_replace(' ','',$company->name.'_'. $logoName) ;
        $path = $request->file('logo')->storeAs(
                    'companies', $company->logo
                );
       }
         $company->save();
         Mail::to('admin@mailinator.com')->send(new newCompany());
        return redirect('/companies');

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
        
        $company = Company::find($id);
        if($company) return view('companies/add',compact('company'));
         return redirect('/companies');
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
        $company =  Employee::find($id);
        $company->first_name = request('name');
        $company->email = request('email');
        $company->phone = request('website');
         if($request->file('logo')){

        $logoName = $request->file('logo')->getClientOriginalName();

        $company->logo =str_replace(' ','',$company->name.'_'. $logoName) ;
        $path = $request->file('logo')->storeAs(
                    'companies', $company->logo
                );
       }
        $company->save();
        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         $company =  Company::find($id)->delete();
         echo json_encode(array('type'=>'success'));
         dd();
    }
}
