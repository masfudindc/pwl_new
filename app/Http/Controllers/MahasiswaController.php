<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use App\Models\Mahasiswa_MataKuliah;
use App\Models\MahasiswaModel;
use App\Models\ProdiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;


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
            'foto' => 'required|image|mimes:jpeg,png,jpg',
            'kelas_id' => 'required',
            'prodi_id' => 'required',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ]);

        $image_name = $request->file('foto')->store('images', 'public');

        MahasiswaModel::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'foto' => $image_name,
            'kelas_id' => $request->kelas_id,
            'prodi_id' => $request->prodi_id,
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
    
        ]);

        //$data = MahasiswaModel::create($request->except(['_token']));
        return redirect('mahasiswa')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');

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

    public function nilai($id)
    {
        $mahasiswa = MahasiswaModel::where('id',$id)->first();
        $nilai = Mahasiswa_MataKuliah::where('mahasiswa_id',$id)->get();
        return view('mahasiswa.nilai_mahasiswa')
                ->with('mahasiswa', $mahasiswa)
                ->with('nilai', $nilai);
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
        $request ->validate([
            'nim'=> 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama'=> 'required|string|max:50',
            'foto' => 'image|mimes:jpeg,png,jpg',
            'kelas_id' => 'required',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',

        ]);

        Mahasiswamodel::where('id', '=', $id)->update($request->except(['_token','_method']));

        $image_name = $request->file('foto')->store('images', 'public');

        MahasiswaModel::where('id', $id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'foto' => $image_name,
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'kelas_id' => $request->kelas_id,
            'prodi_id' => $request->prodi_id,
        ]);

        return redirect('mahasiswa')
            ->with('success','Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswamodel::find($id);
        
        Storage::disk('public')->delete($mahasiswa->foto);
        $mahasiswa->delete();
        
        return redirect('mahasiswa') 
        ->with ('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function cetak_pdf($id) {
        $mahasiswa = MahasiswaModel::where('id',$id)->first();
        $nilai = Mahasiswa_MataKuliah::where('mahasiswa_id',$id)->get();
        // return view('mahasiswa.mahasiswa_pdf')
        //         ->with('mahasiswa', $mahasiswa)
        //         ->with('nilai', $nilai);
        $pdf = Pdf::loadview('mahasiswa.mahasiswa_pdf', ['mahasiswa' => $mahasiswa, 'nilai' => $nilai]);
        return $pdf->stream();
    }
}