<?php

namespace App\Http\Controllers\Marketing;

use Illuminate\Http\Request;
use App\Models\Marketing\Kota;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Http\Requests\Marketing\KotaRequest;
use App\Http\Resources\Marketing\KotaResource;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get kota
        $kota = Kota::all();

        //return collection as a resource
        return KotaResource::collection($kota);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KotaRequest $request)
    {
        $kota = Kota::create([
            'idkota' => $this->makeid($request->nama_kota),
            'kota' => strtoupper($request->nama_kota),
            'propinsi' => strtoupper($request->propinsi)
        ]);

        return $kota ? new ResponseResource(true, 'Data Kota Berhasil Ditambahkan!', $kota) : new ResponseResource(true, 'Gagal Menambahkan Kota!', $kota);
    }

    /**
     * Makes idkota
     *
     * @param  string  $nama_kota
     * @return idkota
     */
    protected function makeid($nama_kota)
    {
        $firstWord = substr(strtoupper($nama_kota), 0, 1);
        $kota = Kota::selectRaw("MAX(SUBSTR(idkota,2)) AS maxkota")->where(DB::raw("SUBSTR(idkota,1,1)"), $firstWord)->limit(1)->get('maxkota');
        return $firstWord . $kota[0]->maxkota + 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get kota
        $kota = Kota::findOrFail($id);
        //return collection as a resource
        return new KotaResource($kota);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get kota
        $kota = Kota::destroy($id);

        //return collection as a resource
        return new KotaResource($kota);
    }
}
