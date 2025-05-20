<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterResearch;
use App\Helpers\HttpResponse;
use App\Models\MasterLogging;

class MasterResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produk_all = MasterResearch::query();
        $data = $produk_all->get();

        try {
            MasterLogging::create([
                'level' => 200,
                'message' => 'Ambil Data Berhasil',
                'data' => json_encode($data),
            ]);
            return HttpResponse::success_getall($produk_all, $request, 'List produk berhasil diambil');
        } catch (\Exception $e) {
            MasterLogging::create([
                'level' => 500,
                'message' => 'Ambil Data Berhasil',
                'data' => json_encode($data),
            ]);
            return HttpResponse::error('Gagal mengambil data produk', $e, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_toko'      => 'required|string|max:255',
                'Deskripsi'       => 'required|string|max:255',
                'alamat'        => 'required|string|max:255',
                'price'       => 'required|numeric',
                'rating'       => 'required|numeric',
                'jumlah_penjualan'       => 'required|numeric',
                'jumlah_keuntungan'       => 'required|numeric',
            ]);
            $data = MasterResearch::create($request->only([
                'nama_toko',
                'Deskripsi',
                'alamat',
                'price',
                'rating',
                'jumlah_penjualan',
                'jumlah_keuntungan'
            ]));

            MasterLogging::create([
                'level' => 200,
                'message' => 'Tambah Data Berhasil',
                'data' => json_encode($data),
            ]);

            return HttpResponse::created($data, 'Data berhasil Ditambahkan', 200);
        } catch (\Exception $e) {

            $data = $request->all();

            MasterLogging::create([
                'level' => 500,
                'message' => $e->getMessage(),
                'data' => json_encode($data),
            ]);

            return HttpResponse::error('Gagal Menambahkan Data', $e, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $research)
    {
        $research_by_id = MasterResearch::where('research_id', $research)->first();

        if ($research_by_id == null) {
            MasterLogging::create([
                'level' => 404,
                'message' => 'Ambil Data ' . $research . ' Tidak Ditemukan',
                'data' => json_encode($research_by_id),
            ]);

            return HttpResponse::notFound('Produk tidak ditemukan', 404);
        } else
            try {
                MasterLogging::create([
                    'level' => 200,
                    'message' => 'Ambil Data ' . $research_by_id->research_id . ' Berhasil',
                    'data' => json_encode($research_by_id),
                ]);
                return HttpResponse::success($research_by_id, 'Data berhasil diambil', 200);
            } catch (\Exception $e) {
                MasterLogging::create([
                    'level' => 500,
                    'message' => $e->getMessage(),
                    'data' => json_encode($research_by_id),
                ]);
                return HttpResponse::error('Gagal mengambil Data', $e, 500);
            }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'nama_toko'               => 'sometimes|required|string|max:255',
                'Deskripsi'               => 'sometimes|required|string|max:255',
                'alamat'                  => 'sometimes|required|string|max:255',
                'price'                   => 'sometimes|required|numeric',
                'rating'                  => 'sometimes|required|numeric',
                'jumlah_penjualan'        => 'sometimes|required|numeric',
                'jumlah_keuntungan'       => 'sometimes|required|numeric',
            ]);
            $research_by_id = MasterResearch::where('research_id', $id)->first();

            MasterLogging::create([
                'level' => 200,
                'message' => 'Update Data ' . $research_by_id->research_id . ' Berhasil',
                'data' => json_encode($research_by_id),
            ]);

            $research_by_id->fill($validated)->save();

            return HttpResponse::updated($research_by_id, 'Data berhasil diupdate');
        } catch (\Exception $e) {

            $research_by_id = MasterResearch::where('research_id', $id)->first();

            MasterLogging::create([
                'level' => 200,
                'message' => $e->getMessage(),
                'data' => json_encode($research_by_id),
            ]);
            return HttpResponse::error('Gagal update Data', $e, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $research_id)
    {
        try {
            $research_by_id = MasterResearch::where('research_id', $research_id)->first();
            $research_by_id->delete();

            MasterLogging::create([
                'level' => 200,
                'message' => 'Hapus Data ' . $research_by_id->research_id . ' Berhasil',
                'data' => json_encode($research_by_id),
            ]);

            return HttpResponse::deleted('Data berhasil Dihapus', 200);
        } catch (\Exception $e) {

            $research_by_id = MasterResearch::where('research_id', $research_id)->first();

            MasterLogging::create([
                'level' => 500,
                'message' => $e->getMessage(),
                'data' => json_encode($research_by_id),
            ]);
            
            return HttpResponse::error('Gagal menghapus Data', $e, 500);
        }
    }
}
