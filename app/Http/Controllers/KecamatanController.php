<?php

namespace App\Http\Controllers;


use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class KecamatanController extends Controller
{
    
    public function index()
    {
        
        $dt = Kecamatan::latest()->paginate(10);
        return view('kecamatan', compact('dt'));
    }

    public function create()
    {
        $prov = Provinsi::all();
        return view('kecamatan_create', compact('prov'));
    }


    /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'kode'     => 'required',
            'T_PROVINSI'     => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $dt = Kecamatan::create([
            'kode'     => $request->kode,
            'name'     => $request->name,
            'T_PROVINSI'     => $request->T_PROVINSI,
            'status'     => $request->has('status')
        ]);

        if($dt){
            //redirect dengan pesan sukses
            return redirect()->route('kecamatan')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('kecamatan')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
* edit
*
* @param  mixed $blog
* @return void
*/
public function edit($id)
{
    $kecamatan = Kecamatan::find($id);
    $prov = Provinsi::all();
    return view('kecamatan_edit', compact('kecamatan','prov'));
}


/**
* update
*
* @param  mixed $request
* @param  mixed $blog
* @return void
*/
public function update(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'kode'     => 'required',
        'T_PROVINSI'     => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    //get data Blog by ID
    $kecamatan = Kecamatan::findOrFail($request->id);
    $kecamatan->update([
        'name'     => $request->name,
        'kode'   => $request->kode,
        'T_PROVINSI'     => $request->T_PROVINSI,
        'status'     => $request->has('status')
    ]);


    if($kecamatan){
        //redirect dengan pesan sukses
        return redirect()->route('kecamatan')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('kecamatan')->with(['error' => 'Data Gagal Diupdate!']);
    }
}

/**
* update Status
*
* @param  mixed $request
* @param  mixed $blog
* @return void
*/
public function status(Request $request)
{
    //get data Blog by ID
    $kecamatan = Kecamatan::findOrFail($request->id);
    $kecamatan->update([
        'status'     => $request->has('status')
    ]);


    if($kecamatan){
        //redirect dengan pesan sukses
        return redirect()->route('kecamatan')->with(['success' => 'Status Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('kecamatan')->with(['error' => 'Status Diupdate!']);
    }
}

/**
* destroy
*
* @param  mixed $id
* @return void
*/
public function destroy($id)
{
  $kecamatan = Kecamatan::findOrFail($id);
  $kecamatan->delete();

  if($kecamatan){
     //redirect dengan pesan sukses
     return redirect()->route('kecamatan')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('kecamatan')->with(['error' => 'Data Gagal Dihapus!']);
  }
}

}
