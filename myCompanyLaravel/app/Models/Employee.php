<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Employee extends Model
{
    use HasFactory;
    protected $guard=['id'];
    protected $fillable = [
        'lastName', 'firstName', 'email' ,'company_id'
      ];
      public function company()
      {
          return $this->belongsTo('App\Order');
      }

      public static function createEmployeeValidation($firstName, $lastName, $email)
      {
      return  Validator::make(
            //Set the Attributs of the Employee
            [
                "firstName"=>$firstName,
                "lastName"=>$lastName,
                "email"=>$email
            ],
            //Set the Rules of Validation
            [
                "lastName"=>'required|regex:/^[\pL\s\-]+$/u',
                "firstName"=>'required|regex:/^[\pL\s\-]+$/u',
                'email'=>'required|email',
            ]
            );
      }
}
