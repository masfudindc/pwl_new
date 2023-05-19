<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\KelasModel;
use App\Models\Mahasiswa;
use App\Models\MahasiswaModel;
use App\Models\ProdiModel;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = MahasiswaModel::with('kelas')->get();
        $paginate = MahasiswaModel::orderBy('nim', 'asc')->paginate(3);
        return view('mahasiswa.mahasiswa', ['mahasiswa' => $mahasiswa, 'paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = ProdiModel::all();
        $kelas = KelasModel::all();
        return view('mahasiswa.create_mahasiswa', ['kelas' => $kelas, 'prodi' => $prodi])
                ->with('url_form', url('/mahasiswa'));
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
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'prodi_id' => 'required',
            'kelas_id' => 'required',
            'jk' => 'required|in:L,P,l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15'
        ]);

        MahasiswaModel::create($request->except(['_token']));
        // $mahasiswa->prodi()->associate($request->prodi_id)->save();

        return redirect('mahasiswa')
                ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = MahasiswaModel::with('kelas')->where('id',$id)->first();
        return view('mahasiswa.detail_mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = MahasiswaModel::with('prodi','kelas')->where('id', $id)->first();
        $prodi = ProdiModel::all();
        $kelas = KelasModel::all();
        return view('mahasiswa.create_mahasiswa', compact('mahasiswa','prodi','kelas'))
                ->with('url_form', url('/mahasiswa/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'prodi_id' => 'nullable',
            'kelas_id' => 'nullable',
            'jk' => 'required|in:L,P,l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15'
        ]);
        MahasiswaModel::where('id','=', $id)->update($request->except(['_token', '_method']));
        return redirect('mahasiswa')
                ->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MahasiswaModel::where('id', '=', $id)->delete();
        return redirect('mahasiswa')
        ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
}