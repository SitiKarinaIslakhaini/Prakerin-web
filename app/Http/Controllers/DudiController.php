<?php

namespace App\Http\Controllers;

use App\Models\dudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dudi = dudi::latest()->paginate(10);
        return view('dudi.index',compact('dudi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dudi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=> 'required',
            'alamat' => 'required'
        ]);
        dudi::create([
            'nama'=> $request->nama,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( dudi $dudi)
    {
        return view('dudi.edit', compact('dudi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  dudi $dudi)
    {
        $this->validate($request,[
            'nama'=>'required',
            'alamat'=>'required'
        ]);
        $dudi->update([
            'nama'=> $request->nama,
            'alamat'=> $request->alamat,
        ]);
        return redirect()->route('dudi.index')->with(['success'=>'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( dudi $dudi)
    {
        $dudi->delete();
        return redirect()->route('dudi.index')->with(['success'=>'Data Berhasil Dihapus!']);
    }
}
