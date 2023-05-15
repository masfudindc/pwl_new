<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = KaryawanModel::where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('nip', 'like', '%' . $request->search . '%')
                ->orWhere('alamat', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->paginate(3);
            return view('karyawan.karyawan')
                ->with('karyawan', $data);
        }

        $karyawan = KaryawanModel::paginate(3);
        return view('karyawan.karyawan')
        ->with('karyawan', $karyawan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create_karyawan')
        ->with('url_form', url('/karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:50',
            'nama' => 'required|string|max:50',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|string|max:50',
            'alamat' => 'required|string|max:255'
        ]);

        $data = KaryawanModel::create($request->except(['_token']));

        return redirect('karyawan')
                ->with('success', 'Data Karyawan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(KaryawanModel $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = KaryawanModel::find($id);
        return view('karyawan.create_karyawan')
        ->with('karyawan', $karyawan)
        ->with('url_form', url('/karyawan/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required|string|max:50',
            'nama' => 'required|string|max:50',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|string|max:50',
            'alamat' => 'required|string|max:255'
        ]);

        $data = KaryawanModel::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('karyawan')
        ->with ('success', 'Data Karyawan Berhasil Diubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KaryawanModel::where('id', '=', $id)->delete();
        return redirect('karyawan')
        ->with ('success', 'Data Karyawan Berhasil Dihapus');
    }
}
