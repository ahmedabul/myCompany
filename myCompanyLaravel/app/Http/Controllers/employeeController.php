<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class employeeController extends Controller
{
    public function create(Request $request)
    {
        //Validation
        $validation= Employee::createEmployeeValidation($request->firstName, $request->lastName, $request->email);
        if($validation->fails())
        {
        return $validation->errors()->messages();
        }
        //Email does Not Match - Email exists.
        $email=Employee::where('email',$request->email)->get()->first();
        //successfully created
        if(empty($email))
        {
            Employee::create([
                'firstName'=>$request->firstName,
                'lastName'=>$request->lastName,
                'email'=>$request->email,
                'company_id'=>$request->companyId,
            ]);
            return 'successfully created';
        }
        //Email exists.
        else
        {
        return 'Email does Not Match - Email exists.';
        }
    }
    public function show(Request $request)
    {
        //Get Employees
        $employees=Employee::where('company_id',$request->companyId)->get();
        return $employees;
    }
    public function read(Request $request)
    {
        //Get Employee
        $employee=Employee::find($request->employeeId);
        return $employee;
    }
    public function update(Request $request)
    {
         //Validation
        $validation= Employee::createEmployeeValidation($request->firstName, $request->lastName, $request->email);
        if($validation->fails())
        {
        return $validation->errors()->messages();
        }

        //Email does Not Match - Email exists.
        $email=Employee::where('email',$request->email)
        ->where('id','!=',$request->employeeId)
        ->get()
        ->first();
        if(empty($email))
        {
            Employee::where('id',$request->employeeId)
            ->update([
                'firstName'=>$request->firstName,
                'lastName'=>$request->lastName,
                'email'=>$request->email
            ]);
            return 'Successfully updated';
        }
        else{
            return 'Email does Not Match - Email exists.';
        }
    }
}
