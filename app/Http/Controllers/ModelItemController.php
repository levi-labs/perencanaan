<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Material;
use App\Models\ModelItem;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ModelItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Model Item';
        $data = ModelItem::all();

        return view('pages.modelitem.index', ['title' => $title, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Tambah Model';
        $customer = Customer::all();
        $material = Material::all();
        $ml = new ModelItem();
        $kode = $ml->getKodeModelItem();

        return view('pages.modelitem.tambah', ['title' => $title, 'customer' => $customer, 'material' => $material, 'kode_model' => $kode]);
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
            'kode_model'        => 'required',
            'nama_customer'     => 'required',
            'nama_model'        => 'required',
            'nama_material'     => 'required',
            'qty'               => 'required',
            'satuan'            => 'required',

        ]);

        try {
            $modelItem = new ModelItem();
            $modelItem->kode_model_item     = $request->kode_model;
            $modelItem->nama_model_item     = $request->nama_model;
            $modelItem->customer_id         = $request->nama_customer;
            $modelItem->material_id         = $request->nama_material;
            $modelItem->qty_model           = $request->qty;
            $modelItem->satuan              = $request->satuan;
            $modelItem->save();

            return redirect('cart-model/' . $modelItem->kode_model_item)->with('success', 'Model berhasil ditambahkan...!');
        } catch (\Exception $e) {

            return redirect('daftar-model')->with('failed', $e->getMessage());
            //throw $th;
        }
    }

    public function cart($modelItem)
    {
        $item = ModelItem::where('kode_model_item', $modelItem)->first();
        $items = ModelItem::where('kode_model_item', $modelItem)->get();
        $title = 'Form Tambah Model Item';
        $customer = Customer::all();
        $material = Material::all();
        $supplier = Supplier::all();

        return view('pages.modelItem.cart', ['title' => $title, 'item' => $item, 'data' => $items, 'customer'  => $customer, 'material' => $material, 'supplier' => $supplier]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModelItem  $modelItem
     * @return \Illuminate\Http\Response
     */
    public function show(ModelItem $modelItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModelItem  $modelItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelItem $modelItem)
    {
        $title = 'Form Edit Model Item';
        $customer = Customer::all();
        $material = Material::all();

        return view('pages.modelitem.edit', ['title' => $title, 'customer' => $customer, 'material' => $material, 'modelItem' => $modelItem]);
    }

    public function updateCart(Request $request, $modelItem)
    {
        try {
            $id = $request->id_request;
            $qty = $request->qty_request;
            for ($i = 0; $i < count($id); $i++) {
                $modelItem = ModelItem::where('id', $id[$i])->first();
                $modelItem->qty_model       = $qty[$i];
                $modelItem->save();
            }
            return redirect('daftar-model')->with('success', 'Data Model berhasil di disimpan...!');
        } catch (\Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModelItem  $modelItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelItem $modelItem)
    {
        $this->validate($request, [
            'kode_model'        => 'required',
            'nama_customer'     => 'required',
            'nama_model'        => 'required',
            'nama_material'     => 'required',
            'qty'               => 'required',
            'satuan'            => 'required',

        ]);

        try {
            $modelItem->kode_model_item     = $request->kode_model;
            $modelItem->nama_model_item     = $request->nama_model;
            $modelItem->customer_id         = $request->nama_customer;
            $modelItem->material_id         = $request->nama_material;
            $modelItem->qty                 = $request->qty;
            $modelItem->satuan              = $request->satuan;
            $modelItem->save();

            return redirect('daftar-model')->with('success', 'Model berhasil diupdate...!');
        } catch (\Exception $e) {

            return redirect('daftar-model')->with('failed', $e->getMessage());
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModelItem  $modelItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelItem $modelItem)
    {
        $modelItem->delete();

        return back()->with('success', 'Model berhasil dihapus...!');
    }
}
