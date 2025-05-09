<?php

namespace App\Http\Controllers;


use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProvinsiController extends Controller
{
    
    public function index()
    {
        $dt = Provinsi::latest()->paginate(10);
        return view('provinsi', compact('dt'));
    }

    public function create()
    {
        return view('provinsi_create');
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
            'kode'     => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $dt = Provinsi::create([
            'kode'     => $request->kode,
            'name'     => $request->name,
            'status'     => $request->has('status')
        ]);

        if($dt){
            //redirect dengan pesan sukses
            return redirect()->route('provinsi')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('provinsi')->with(['error' => 'Data Gagal Disimpan!']);
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
    $provinsi = Provinsi::find($id);
    return view('provinsi_edit', compact('provinsi'));
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
        'kode'     => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    //get data Blog by ID
    $provinsi = Provinsi::findOrFail($request->id);
    $provinsi->update([
        'name'     => $request->name,
        'kode'   => $request->kode,
        'status'     => $request->has('status')
    ]);


    if($provinsi){
        //redirect dengan pesan sukses
        return redirect()->route('provinsi')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('provinsi')->with(['error' => 'Data Gagal Diupdate!']);
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
    $provinsi = Provinsi::findOrFail($request->id);
    $provinsi->update([
        'status'     => $request->has('status')
    ]);


    if($provinsi){
        //redirect dengan pesan sukses
        return redirect()->route('provinsi')->with(['success' => 'Status Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('provinsi')->with(['error' => 'Status Diupdate!']);
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
  $provinsi = Provinsi::findOrFail($id);
  $provinsi->delete();

  if($provinsi){
     //redirect dengan pesan sukses
     return redirect()->route('provinsi')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('provinsi')->with(['error' => 'Data Gagal Dihapus!']);
  }
}

}
