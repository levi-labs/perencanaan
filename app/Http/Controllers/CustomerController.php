<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Customer';
        $data  = Customer::all();

        return view('pages.customer.index', ['title' => $title, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Tambah Customer';
        $customer = new Customer();
        $kode = $customer->getKodeCustomer();

        return view('pages.customer.tambah', ['title' => $title, 'kode_customer' => $kode]);
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
            'kode_customer'     => 'required',
            'nama_customer'     => 'required',
            'no_telp_customer'  => 'required',
            'alamat_customer'   => 'required'
        ]);

        try {
            $customer                   = new Customer();
            $customer->kode_customer    = $request->kode_customer;
            $customer->nama_customer    = $request->nama_customer;
            $customer->no_telp_customer = $request->no_telp_customer;
            $customer->alamat_customer  = $request->alamat_customer;
            $customer->save();

            return redirect('daftar-customer')->with('success', 'Customer berhasil ditambahkan...!');
        } catch (\Exception $e) {
            return redirect('daftar-customer')->with('failed', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $title = 'Form Edit Customer';

        return view('pages.customer.edit', ['title' => $title, 'customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'kode_customer'     => 'required',
            'nama_customer'     => 'required',
            'no_telp_customer'  => 'required',
            'alamat_customer'   => 'required'
        ]);

        try {
            $customer->kode_customer    = $request->kode_customer;
            $customer->nama_customer    = $request->nama_customer;
            $customer->no_telp_customer = $request->no_telp_customer;
            $customer->alamat_customer  = $request->alamat_customer;
            $customer->save();

            return redirect('daftar-customer')->with('success', 'Customer berhasil diupdate...!');
        } catch (\Exception $e) {
            return redirect('daftar-customer')->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return back()->with('success', 'Customer berhasil dihapus...!');
    }
}
