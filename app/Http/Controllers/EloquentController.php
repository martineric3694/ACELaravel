<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class EloquentController extends Controller
{
    //
    public function tampilkanData(){
    	$data = App\Employee::paginate(10);
    	return view('database.index')->with(['data'=>$data,'title'=>'Eloquent Page','action'=>'']);
    }

    public function tampilkanDept($id){
    	$data = App\Employee::where('DEPARTMENT_ID','=',$id)->paginate(10);
    	return view('database.index')->with(['data'=>$data,'title'=>'Eloquent Page']);
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
    	$emp = new App\Employee;
    	$emp->employee_id = $empId;
    	$emp->first_name = $fName;
    	$emp->save();

    	return redirect('/eloquent');
    }

    public function edit($id){
        $dataEdit = App\Employee::find($id);
        $data = $this->getEmp();
        $action = 'edit';
        return view('database.index')->with(['data'=>$data,'dataEdit'=>$dataEdit,'action'=>$action,'title'=>'Eloquent Page']);
    }

    public function update(Request $req){
        $validation = $req->validate([
            'fName'=>'required|alpha',
        ]);

        $emp = App\Employee::find($req->empId);
        $emp->FIRST_NAME = $req->fName;
        $emp->save();

        // App\Employee::where('employee_id',$req->empId)->update([
        //     'first_name'=>$req->fName
        // ]);

        return redirect('/eloquent');
    }

    

    public function hasmany($id){
        $dept = App\Department::find($id);
        return view('database.hasmany')->with('data',$dept);
    }

    public function login(Request $req){
        $login = App\Employee::where('EMPLOYEE_ID','=',$req->username)->where('FIRST_NAME','=',$req->password)->first();
        session(['username'=>$login->EMPLOYEE_ID,'password'=>$login->FIRST_NAME]);
        return redirect('eloquent');
    }

    public function loginForm(){
        return view('login');
    }

    public function post(Request $req){
        return $req;
    }
}
