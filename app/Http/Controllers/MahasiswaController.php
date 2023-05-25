<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return MahasiswaResource::collection(Mahasiswa::all()); //menampilkan semuda data tanpa pagination
        return MahasiswaResource::collection(Mahasiswa::paginate(2)); //dengan pagination
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        //return response()->json('hello');
        return new MahasiswaResource(Mahasiswa::create(
            [
                'nim' => $request->nim,
                'nama' => $request->nama,
                'prodi' => $request->prodi,
                'jurusan' => $request->jurusan,
                'no_hp' => $request->no_hp,
                'kelas_id' => $request->kelas,

            ]
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return new MahasiswaResource($mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
