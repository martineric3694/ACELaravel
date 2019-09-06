<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ACEController extends Controller
{
    //
    public function luas($panjang,$lebar){
    	$luas = $panjang * $lebar;
    	return $luas;
    }

    public function blade(){
    	return view('blade.coba');
    }

    public function bladeValue(){
    	$data = "Ini adalah data dari controller";
    	$data2 = "Blade Value";
    	
    	return view('blade.value')->with(['isi'=>$data,'title'=>$data2]);

    	// return view('blade.value',['isi'=>$data,'title'=>$data2]);
    	// return view('blade.value')->with('isi',$data.$data2);
    }

    public function postForm(){
    	return view('blade.post');
    }

    public function postSubmit(Request $req){
    	$nama = $req->nama;
    	$umur = $req->umur;
    	return view('blade.result')->with(['nama'=>$nama,'umur'=>$umur]);
    }
}
