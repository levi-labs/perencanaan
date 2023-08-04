<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Persediaan;
use Illuminate\Http\Request;

class PersediaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Persediaan Material';
        $data = Persediaan::all();

        return view('pages.persediaan.index', ['title' => $title, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Persediian Material';
        $material = Material::all();

        return view('pages.persediaan.tambah', ['title' => $title, 'material' => $material]);
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
            'qty_persediaan'      => 'required'
        ]);

        try {
            $persediaan = new Persediaan();
            $persediaan->material_id = $request->material;
            $persediaan->qty_persediaan = $request->qty_persediaan;
            $persediaan->save();

            return redirect('daftar-persediaan')->with('success', 'Persediaan Material berhasil ditambah...!');
        } catch (\Exception $e) {
            return redirect('daftar-persediaan')->with('failed', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persediaan  $persediaan
     * @return \Illuminate\Http\Response
     */
    public function show(Persediaan $persediaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persediaan  $persediaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Persediaan $persediaan)
    {
        $title = 'Form Edit Persediaan Material';
        $material =  Material::all();
        return view('pages.persediaan.edit', ['title' => $title, 'material' => $material, 'persediaan' => $persediaan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persediaan  $persediaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persediaan $persediaan)
    {
        $this->validate($request, [
            'material' => 'required',
            'qty_persediaan'      => 'required'
        ]);

        try {

            $persediaan->material_id = $request->material;
            $persediaan->qty_persediaan = $request->qty_persediaan;
            $persediaan->save();

            return redirect('daftar-persediaan')->with('success', 'Persediaan Material berhasil diupdate...!');
        } catch (\Exception $e) {
            return redirect('daftar-persediaan')->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persediaan  $persediaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persediaan $persediaan)
    {
        $persediaan->delete();

        return back()->with('success', 'Persediaan Material berhasil dihapus...!');
    }
}
