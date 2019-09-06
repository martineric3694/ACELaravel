<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;

class QueryBuilderController extends Controller
{
    //
    public function tampilkanData(){
    	$data = $this->getEmp();
    	return view('database.index')->with(['data'=>$data,'title'=>'Query Builder Page','action'=>'']);
    }

    public function tampilkanDept($id){
    	$data = DB::table('departments')->where('DEPARTMENT_ID','>',$id)->get();
    	return view('database.dept')->with('data',$data);
    }

    public function formInsert(){
    	return view('database.form');
    }

    public function insertEmployee(Request $req){
    	// $validation = $req->validate([
    	// 	'empId'=>'required|numeric|digits:3',
    	// 	'fName'=>'required|alpha',
    	// ]);

    	$rules = ([
    		'empId'=>'required|numeric|digits:3',
    		'fName'=>'required|alpha',
    	]);

    	$message = ([
    		'empId.required'=>'Employee ID harus ada isinya donk!!!',
    		'empId.numeric'=>'Employee ID harus angka, masa ga tau??',
    		'empId.digits'=>'Employee ID harus 3 digit angka',
    		'fName.required'=>':Attribute tidak boleh kosong',
    		'fName.alpha'=>':Attribute harus huruf',
    	]);

    	$this->validate($req,$rules,$message);

    	$empId = $req->empId;
    	$fName = $req->fName;
    	DB::table('employees')->insert(['employee_id'=>$empId,'first_name'=>$fName]);
    	return redirect('/database');
    }

    public function edit($id){
        $dataEdit = DB::table('employees')->where('employee_id',$id)->first();
        $data = $this->getEmp();
        $action = 'edit';
        return view('database.index')->with(['data'=>$data,'dataEdit'=>$dataEdit,'action'=>$action,'title'=>'Query Builder Page']);
    }

    public function update(Request $req){
        $validation = $req->validate([
            'fName'=>'required|alpha',
        ]);

        DB::table('employees')->where('employee_id',$req->empId)->update(['first_name'=>$req->fName]);
        return redirect('/database');
    }

    public function add(Request $req){
        DB::table('employees')->insert([
            'employee_id'=>$req->empId,
            'first_name'=>$req->fName,
        ]);

        return redirect('/database');
    }

    public function getEmp(){
        $data = DB::table('employees')->paginate(3);
        return $data;
    }
}













