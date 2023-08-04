<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Supplier';
        $data  = Supplier::all();

        return view('pages.supplier.index', ['title' => $title, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title  = 'Form Supplier';
        $supp = new Supplier();
        $kode = $supp->getKodeSupplier();

        return view('pages.supplier.tambah', ['title' => $title, 'kode' => $kode]);
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
            'kode_supplier'     => 'required',
            'nama_supplier'     => 'required',
            'no_telp_supplier'  => 'required',
            'alamat_supplier'   => 'required'
        ]);
        try {
            $supplier = new Supplier();
            $supplier->kode_supplier    = $request->kode_supplier;
            $supplier->nama_supplier    = $request->nama_supplier;
            $supplier->no_telp_supplier = $request->no_telp_supplier;
            $supplier->alamat_supplier  = $request->alamat_supplier;
            $supplier->save();

            return redirect('daftar-supplier')->with('success', 'Supplier berhasil ditambahkan...!');
        } catch (\Exception $e) {
            return redirect('daftar-supplier')->with('failed', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $title = 'Form Edit Supplier';

        return view('pages.supplier.edit', ['title' => $title, 'supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request, [
            'kode_supplier'     => 'required',
            'nama_supplier'     => 'required',
            'no_telp_supplier'  => 'required',
            'alamat_supplier'   => 'required'
        ]);
        try {
            $supplier->kode_supplier    = $request->kode_supplier;
            $supplier->nama_supplier    = $request->nama_supplier;
            $supplier->no_telp_supplier = $request->no_telp_supplier;
            $supplier->alamat_supplier  = $request->alamat_supplier;
            $supplier->save();

            return redirect('daftar-supplier')->with('success', 'Supplier berhasil diupdate...!');
        } catch (\Exception $e) {
            return redirect('daftar-supplier')->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return back()->with('success', 'Supplier berhasil dihapus...!');
    }
}
