<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Material;
use App\Models\MaterialMasuk;
use App\Models\ModelItem;
use App\Models\RequestItem;
use App\Models\Supplier;
use Illuminate\Http\Request;

class RequestItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Request Item(Permintaan)';
        $data  = RequestItem::where('status_permintaan', 'Request')->get();
        return view('pages.requestItem.index', ['title' => $title, 'data' => $data]);
    }
    public function index2()
    {
        $title = 'Daftar Request Item(Penerimaan)';
        $data  = RequestItem::where('status_permintaan', 'Terkirim')->get();
        return view('pages.penerimaan.index', ['title' => $title, 'data' => $data]);
    }
    public function index3()
    {
        $title = 'Daftar Request Item(Penerimaan)';
        $data  = RequestItem::where('status_permintaan', 'Terima & Produksi')->get();
        return view('pages.penerimaan.index2', ['title' => $title, 'data' => $data]);
    }

    public function beliItem($id)
    {
        $model = ModelItem::where('id', $id)->first();
        $m = Material::where('id', $model->material_id)->first();
        $material = Material::all();
        $materialmasuk = new MaterialMasuk();
        $kode = $materialmasuk->getKodeMaterialMasuk();
        $supplier = Supplier::all();

        return view('pages.requestItem.beli', ['title' => 'Form Pembelian Item ke Supplier', 'material' => $material, 'kode' => $kode, 'm' => $m, 'supplier' => $supplier]);
    }

    public function produksiRequest($id)
    {
        try {
            $model = ModelItem::where('id', $id)->first();
            $req = RequestItem::where('model_id', $model->kode_model_item)->first();
            $model->status_model_item = 'Terima & Produksi';
            $model->save();
            $nilai = ModelItem::where('kode_model_item', $req->model_id)->count();
            $deliver = ModelItem::where('kode_model_item', $req->model_id)->where('status_model_item', 'Terima & Produksi')->count();


            if ($deliver == $nilai) {
                $req->status_permintaan = 'Terima & Produksi';
                $req->save();
                return redirect('daftar-produksi')->with('success', 'Status diupdate ke Terima & Produksi');
            }

            return back()->with('success', 'Status diupdate ke Terima & Produksi');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function sendRequest($id)
    {
        try {


            $model = ModelItem::where('id', $id)->first();
            $item = Material::where('id', $model->material_id)->first();
            $req = RequestItem::where('model_id', $model->kode_model_item)->first();


            $nilai = ModelItem::where('kode_model_item', $req->model_id)->count();
            $send = ModelItem::where('kode_model_item', $req->model_id)->where('status_model_item', 'Request')->count();
            if ($item->qty_material > $model->qty_model) {

                $result = $item->qty_material - $model->qty_model;
                $item->qty_material = $result;
                $item->save();

                $model->status_model_item = 'Terkirim';
                $model->save();
                $deliver = ModelItem::where('kode_model_item', $req->model_id)->where('status_model_item', 'Terkirim')->count();
                if ($deliver == $nilai) {
                    $req->status_permintaan = 'Terkirim';
                    $req->save();
                }



                return back()->with('success', 'Berhasil dikirim ke produksi...!');
            } else {
                return back()->with('stock', 'Stock Material Kurang! Silahkan Restock dengan Klik Button Beli Item');
            }
        } catch (\Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Permintaan Item';
        $model = ModelItem::distinct()->get(['kode_model_item', 'nama_model_item']);
        $reqkode = new RequestItem();
        $kode = $reqkode->getKodeRequestItem();

        return view('pages.requestItem.tambah', ['title' => $title, 'model' => $model, 'kode' => $kode]);
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
            'kode_permintaan'      => 'required',
            'model'             => 'required',
            'tanggal_request'   => 'required',
            'status_request'    => 'required'
        ]);

        try {
            $requestItem                        = new RequestItem();
            $requestItem->kode_permintaan       = $request->kode_permintaan;
            $requestItem->model_id              = $request->model;
            $requestItem->tanggal_permintaan    = $request->tanggal_request;
            $requestItem->status_permintaan     = $request->status_request;
            $requestItem->save();

            return redirect('daftar-request')->with('success', 'Data permintaan berhasil ditambahkan...!');
        } catch (\Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }
    public function editSingle($id)
    {
        $title = 'Edit detail Barang';
        $item  = ModelItem::where('id', $id)->first();
        $customer = Customer::all();
        $material = Material::all();

        return view('pages.requestItem.editDetail', ['title' => $title, 'item' => $item, 'material' => $material, 'customer' => $customer]);
    }
    public function updateSingle(Request $request,  $id)
    {

        $this->validate($request, [
            'material'      => 'required',
            'qty_model'     => 'required',
            'customer'      => 'required',
            'satuan'        => 'required'
        ]);

        try {

            $item = ModelItem::where('id', $id)->first();
            // dd($item->kode_model_item);
            $item->material_id      = $request->material;
            $item->qty_model        = $request->qty_model;
            $item->customer_id      = $request->customer;
            $item->satuan           = $request->satuan;
            $item->save();

            return redirect('daftar-request')->with('success', 'Permintaan Model Item  berhasil diupdate...!');
        } catch (\Exception $e) {
            return redirect('daftar-request')->with('failed', $e->getMessage());
        }
    }
    public function deleteSingle($id)
    {

        $item = ModelItem::where('id', $id)->first();
        $item->delete();

        return back()->with('success', 'Berhasil dihapus dari daftar...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestItem  $requestItem
     * @return \Illuminate\Http\Response
     */
    public function show($kode_permintaan)
    {
        try {
            $title = 'Detail Request Item';
            $requestItem = RequestItem::where('kode_permintaan', $kode_permintaan)->first();
            $data = ModelItem::where('kode_model_item', $requestItem->model_id)->get();

            return view('pages.requestItem.detail', ['title' => $title, 'permintaan' => $requestItem, 'data' => $data]);
        } catch (\Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestItem  $requestItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Form Request Item';
        $permintaan = RequestItem::where('id', $id)->first();
        $material = Material::all();
        $customer = Customer::all();
        $model = ModelItem::all();

        return view('pages.requestItem.edit', ['title' => $title, 'permintaan' => $permintaan, 'customer' => $customer, 'material' => $material, 'model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestItem  $requestItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $requestItem)
    {
        $this->validate($request, [
            'kode_permintaan'      => 'required',
            'model'             => 'required',
            'tanggal_request'   => 'required',
            'status_request'    => 'required'
        ]);

        try {
            $requestItem->kode_permintaan   = $request->kode_permintaan;
            $requestItem->model_id          = $request->model;
            $requestItem->tanggal_permintaan   = $request->tanggal_request;
            $requestItem->status_permintaan   = $request->status_request;
            $requestItem->save();
            return redirect('daftar-request')->with('success', 'Data permintaan berhasil diupdate...!');
        } catch (\Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestItem  $requestItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($requestItem)
    {
        try {
            $requestItem = RequestItem::where('id', $requestItem)->first();
            $requestItem->delete();

            return back()->with('success', 'Data permintaan berhasil dihapus...!');
        } catch (\Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }
}
