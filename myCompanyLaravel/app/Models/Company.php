<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guard=['id'];
    protected $fillable = [
        'companyName',
      ];
      public function employee()
      {
          return $this->hasMany('App\Models\Employee');
      }

}
