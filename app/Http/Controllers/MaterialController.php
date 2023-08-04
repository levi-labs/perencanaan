<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Material';
        $data =  Material::all();

        return view('pages.material.index', ['title' => $title, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Tambah Material';
        $material = new Material();
        $kode = $material->getKodeMaterial();
        $supplier = Supplier::all();


        return view('pages.material.tambah', ['title' => $title, 'kode_material' => $kode, 'supplier' => $supplier]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_material'     => 'required',
            'nama_material'     => 'required',
            'qty_material'      => 'required'
        ]);

        try {
            $material   = new Material();
            $material->kode_material        = $request->kode_material;
            $material->nama_material        = $request->nama_material;
            $material->qty_material         = $request->qty_material;
            $material->save();

            return redirect('daftar-material')->with('success', 'Material berhasil ditambahkan...!');
        } catch (\Exception $e) {
            return redirect('daftar-material')->with('failed', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        $title = 'Form Edit Material';
        $supplier = Supplier::all();

        return view('pages.material.edit', ['title' => $title, 'supplier' => $supplier, 'material' => $material]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $this->validate($request, [
            'kode_material'     => 'required',
            'nama_material'     => 'required',
            'qty_material'      => 'required'
        ]);

        try {

            $material->kode_material    = $request->kode_material;
            $material->nama_material    = $request->nama_material;
            $material->qty_material     = $request->qty_material;
            $material->save();

            return redirect('daftar-material')->with('success', 'Material berhasil diupdate...!');
        } catch (\Exception $e) {
            return redirect('daftar-material')->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        $material->delete();

        return back()->with('success', 'Material berhasil dihapus...!');
    }
}
