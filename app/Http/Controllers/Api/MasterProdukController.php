<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterProduk;
use App\Helpers\HttpResponse;

class MasterProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produk_all = MasterProduk::query();

        try {
            return HttpResponse::success_getall($produk_all, $request, 'List produk berhasil diambil');
            dd($request);
        } catch (\Exception $e) {
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
                'nama_produk'      => 'required|string|max:255',
                'kategori_produk'  => 'required|string|max:255',
                'sell_price'       => 'required|numeric',
                'cogs_price'       => 'required|numeric',
            ]);

            $produk = MasterProduk::create($request->only([
                'nama_produk',
                'kategori_produk',
                'sell_price',
                'cogs_price',
            ]));

            return response()->json([
                'message' => 'Produk berhasil ditambahkan',
                // 'data' => $produk
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menghapus data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $produk)
    {
        $produk_by_id = MasterProduk::where('produk_id', $produk)->first();

        if ($produk_by_id == null) {
            return HttpResponse::notFound('Produk tidak ditemukan', 404);
        } else
            try {
                return HttpResponse::success($produk_by_id, 'Data berhasil diambil', 200);
            } catch (\Exception $e) {
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
                'nama_produk'      => 'sometimes|required|string|max:255',
                'kategori_produk'  => 'sometimes|required|string|max:255',
                'sell_price'       => 'sometimes|required|numeric',
                'cogs_price'       => 'sometimes|required|numeric',
            ]);

            $produk_by_id = MasterProduk::where('produk_id', $id)->first();

            $produk_by_id->fill($validated)->save();


            return HttpResponse::updated('Data berhasil diupdate');
        } catch (\Exception $e) {
            return HttpResponse::error('Gagal menghapus Data', $e, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy(string $produk_id)
    {
        try {
            $produk = MasterProduk::where('produk_id', $produk_id)->firstOrFail();
            $produk->delete();

            return HttpResponse::deleted('Produk berhasil dihapus');
        } catch (\Exception $e) {
            return HttpResponse::error('Gagal menghapus produk', $e, 500);
        }
    }
}
