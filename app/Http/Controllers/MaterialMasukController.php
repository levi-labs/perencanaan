<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialMasuk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MaterialMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Material Masuk(Restock)';
        $material = MaterialMasuk::all();

        return view('pages.materialmasuk.index', ['title' => $title, 'data' => $material]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Material Masuk(Restock)';
        $material = Material::all();
        $supplier = Supplier::all();
        $mtm = new MaterialMasuk();
        $kode = $mtm->getKodeMaterialMasuk();
        return view('pages.materialmasuk.tambah', ['title' => $title, 'material' => $material, 'supplier' => $supplier, 'kode' => $kode]);
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
            'material' => 'required',
            'qty_masuk' => 'required',
            'supplier' => 'required',
            'tanggal' => 'required'
        ]);

        try {
            $masuk =  new MaterialMasuk();
            $masuk->kode_material_masuk = $request->kode_masuk;
            $masuk->supplier_id =  $request->supplier;
            $masuk->material_id = $request->material;
            $masuk->qty_masuk   = $request->qty_masuk;
            $masuk->tanggal_material_masuk   = $request->tanggal;
            $masuk->save();

            $material = Material::where('id', $request->material)->first();
            $material->qty_material += $masuk->qty_masuk;
            $material->save();


            return redirect('daftar-material-masuk')->with('success', 'Material Masuk berhasil ditambahkan..!');
        } catch (\Exception $e) {

            return redirect('daftar-material-masuk')->with('failed', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaterialMasuk  $materialMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialMasuk $materialMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaterialMasuk  $materialMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(MaterialMasuk $materialMasuk)
    {
        $title = 'Form Edit Material Masuk(Restock)';
        $material = Material::all();
        $supplier = Supplier::all();

        return view('pages.materialmasuk.edit', ['title' => $title, 'material' => $material, 'supplier' => $supplier, 'materialMasuk' => $materialMasuk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaterialMasuk  $materialMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaterialMasuk $materialMasuk)
    {
        $this->validate($request, [
            'material' => 'required',
            'qty_masuk' => 'required',
            'supplier' => 'required',
            'tanggal' => 'required'
        ]);

        try {
            $material = Material::where('id', $materialMasuk->material_id)->first();
            $temp = $material->qty_material -  $materialMasuk->qty_masuk;


            $materialMasuk->supplier_id =  $request->supplier;
            $materialMasuk->material_id = $request->material;
            $materialMasuk->qty_masuk   = $request->qty_masuk;
            $materialMasuk->tanggal_material_masuk   = $request->tanggal;

            $material->qty_material = $temp + $materialMasuk->qty_masuk;
            $material->save();

            $materialMasuk->save();

            return redirect('daftar-material-masuk')->with('success', 'Material Masuk berhasil diupdate..!');
        } catch (\Exception $e) {

            return redirect('daftar-material-masuk')->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaterialMasuk  $materialMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaterialMasuk $materialMasuk)
    {
        $material = Material::where('id', $materialMasuk->material_id)->first();

        $temp = $material->qty_material - $materialMasuk->qty_masuk;
        $material->qty_material = $temp;
        $material->save();

        $materialMasuk->delete();

        return back()->with('success', 'Material Masuk berhasil di hapus...!');
    }
}
