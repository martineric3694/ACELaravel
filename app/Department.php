<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $table = 'Departments';
    protected $primaryKey = 'DEPARTMENT_ID';
    public $timestamps = false;


}
