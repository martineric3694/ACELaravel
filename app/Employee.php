<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'Employees';
    protected $primaryKey = 'EMPLOYEE_ID';
    public $timestamps = false;

    public function department(){
    	return $this->belongsTo(Department::class,'DEPARTMENT_ID');
    }
}
