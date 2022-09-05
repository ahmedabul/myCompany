<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class companyController extends Controller
{
    public function create(Request $request)
    {
        //get the Name of Company
        $companyName=$request->companyName;
        //check out, if exists the Company
        $company=Company::where('companyName',$companyName)->get()->first();
        if(empty($company))
        {
            Company::create([
                'companyName'=>$companyName,
            ]);
            return true;
        }
        else{
            return false;
        }
    }
    public function all()
    {
        //Get All Companies
        $companies=Company::all();
        return $companies;
    }

    public function show(Request $request)
    {
         $company=Company::find($request->companyId);
        return $company;
    }
}
