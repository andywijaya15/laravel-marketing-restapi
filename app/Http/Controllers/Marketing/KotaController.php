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
            'kota_id' => $this->makeid($request->nama_kota),
            'nama' => strtoupper($request->nama_kota),
            'propinsi' => strtoupper($request->propinsi)
        ]);

        return new ResponseResource(true, 'Data Kota Berhasil Ditambahkan!', $kota);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kota $kota_id)
    {
        return new KotaResource($kota_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kota $kota)
    {
        return $kota;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = Kota::destroy($id);
        new ResponseResource(true, 'Data Kota Berhasil Dihapus!', $kota);
    }

    /**
     * Make idkota
     *
     * @param  string  $nama_kota
     * @return idkota
     */
    protected function makeid($nama_kota)
    {
        $firstWord = substr(strtoupper($nama_kota), 0, 1);
        $kota = Kota::selectRaw("MAX(SUBSTR(kota_id,2)) AS maxkota")->where(DB::raw("SUBSTR(kota_id,1,1)"), $firstWord)->limit(1)->get('maxkota');
        return $firstWord . sprintf("%02s", (int)$kota[0]->maxkota + 1);
    }
}
