<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(){
        return view('vueApp');
    }

    public function index()
    {
        return Karyawan::orderBy('id','desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required',
            'jabatan' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $karyawan = Karyawan::create($request->all());
        return response()->json(['status' => 'success','msg' => 'Employee Successfuly Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Karyawan::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Karyawan::find($id);
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
        $this->validate(request(),[
        'name' => 'required|string',
        'jabatan' => 'required',
        'jenis_kelamin' => 'required',
        ]);
        $id = Karyawan::find($id);

        $karyawan =[
        'name' => $request->name,
        'jabatan' => $request->jabatan,
        'jenis_kelamin' => $request->jenis_kelamin,
        ];

        $id->update($karyawan);
        return response()->json(['status'=> 'success','message'=>'Data Has Been Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Karyawan::destroy($id);
        return response()->json(['status'=>'success','message'=>'Data Has Been Deleted']);
        return back();
    }
}
