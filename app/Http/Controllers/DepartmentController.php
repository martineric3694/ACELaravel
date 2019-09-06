<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data = App\Department::paginate(10);
        // return view('department.index')->with('data',$data);
        $data = App\Department::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('department.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $dept = new App\Department;
        $dept->DEPARTMENT_ID = $request->deptId;
        $dept->DEPARTMENT_NAME = $request->deptName;
        $dept->save();

        return redirect('department');
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
        $data = App\Department::find($id);
        return view('department.view')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = App\Department::find($id);
        return view('department.edit')->with('data',$data);
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
        //
        // $this->validate($request,$this->rules(),$this->message());

        $dept = App\Department::find($id);
        $dept->DEPARTMENT_NAME = $request->deptName;
        $dept->save();

        return redirect('department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dept = App\Department::find($id);
        $dept->delete();

        return redirect('department');
    }

    public function rules(){
        $rules = ([
            'deptId'=>'required|numeric|unique:department',
            'deptName'=>'required|alpha',
        ]);
        return $rules;
    }

    public function message(){
        $message = ([
            'deptId.required'=>'Department ID harus berisi',
            'deptId.numeric'=>'Department ID harus angka',
            'deptId.unique'=>'Department ID sudah ada di database',
            'deptName.required'=>'Nama Department harus berisi',
            'deptName.alpha'=>'Nama Department harus huruf',
        ]);
        return $message;
    }
}
