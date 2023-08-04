<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar User';
        $data  = User::all();

        return view('pages.users.index', ['title' => $title, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Tambah User';

        return view('pages.users.tambah', ['title' => $title]);
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
            'username'      => 'required',
            'nama_user'     => 'required',
            'no_telp_user'  => 'required',
            'akses_user'    => 'required',
            'password'      => 'required'
        ]);
        try {
            $user               = new User();
            $user->username     = $request->username;
            $user->nama_user    = $request->nama_user;
            $user->no_telp_user = $request->no_telp_user;
            $user->akses_user   = $request->akses_user;
            $user->password     = bcrypt($request->password);
            $user->save();

            return redirect('daftar-user')->with('success', 'User berhasil ditambahkan...!');
        } catch (\Exception $e) {
            return redirect('daftar-user')->with('failed', $e->getMessage());
        }
    }

    public function resetPassword(User $user)
    {
        try {

            $user->password = bcrypt('password');
            $user->save();

            return back()->with('success', 'Password dengan username : ' . $user->username . ' di reset menjadi password');
        } catch (\Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    public function formPassword()
    {

        $title = 'Ubah Password';

        return view('pages.users.password', ['title' => $title]);
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password'     => 'required'
        ]);
        try {

            $id =  auth()->user()->id;

            $user =  User::where('id', $id)->first();
            $oldpass = $request->old_password;
            if (Hash::check($oldpass, $user->password)) {
                $user->password = bcrypt($request->password);
                $user->save();

                return back()->with('success', 'Password berhasil diupdate...!');
            } else {
                return back()->with('wrong', 'Oops Old Password anda salah...!');
            }
        } catch (\Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
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
    public function edit(User $user)
    {
        $title  = 'Form Edit User';

        return view('pages.users.edit', ['title' => $title, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'username'      => 'required',
            'nama_user'     => 'required',
            'no_telp_user'  => 'required',
            'akses_user'    => 'required',
        ]);
        try {
            $user->username     = $request->username;
            $user->nama_user    = $request->nama_user;
            $user->no_telp_user = $request->no_telp_user;
            $user->akses_user   = $request->akses_user;
            $user->save();

            return redirect('daftar-user')->with('success', 'User berhasil diupdate...!');
        } catch (\Exception $e) {
            return redirect('daftar-user')->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User berhasil dihapus...!');
    }
}
