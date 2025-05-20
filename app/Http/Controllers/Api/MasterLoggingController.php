<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterLogging;
use App\Helpers\HttpResponse;

class MasterLoggingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $logging_all = MasterLogging::query();

        try {
            return HttpResponse::success_getall($logging_all, $request, 'List Data berhasil diambil');
            dd($request);
        } catch (\Exception $e) {
            return HttpResponse::error('Gagal mengambil data', $e, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    try {
        $request->validate([
            'level'        => 'required|string|max:255',
            'message'      => 'required|string|max:255',
            'data'         => 'required|string|max:255',
        ]);

        $data = MasterLogging::create($request->only([
            'level',
            'message',
            'data'
        ]));

        //     return HttpResponse::created($data, 'Data berhasil Ditambahkan', 200);
        // } catch (\Exception $e) {
        //     return HttpResponse::error('Gagal Menambahkan Data', $e, 500);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $logging)
    {
        $logging_by_id = MasterLogging::where('research_id', $logging)->first();

        if ($logging_by_id == null) {
            return HttpResponse::notFound('Data tidak ditemukan', 404);
        } else
            try {
                return HttpResponse::success($logging_by_id, 'Data berhasil diambil', 200);
            } catch (\Exception $e) {
                return HttpResponse::error('Gagal mengambil Data', $e, 500);
            }

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
