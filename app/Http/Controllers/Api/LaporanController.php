<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'id_masyarakat' => 'required',
            'alamat' => 'required',
            'catatan' => 'nullable',
            'foto' => 'nullable|image'
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('laporan', 'public');
        }

        $idLaporan = 'L' . strtoupper(Str::random(5)); // ID Unik String

        $laporan = Laporan::create([
            'id_laporan' => $idLaporan,
            'id_masyarakat' => $request->id_masyarakat,
            'isi_laporan' => $request->catatan,
            'tgl_laporan' => now(),
            'alamat' => $request->alamat,
            'foto' => $fotoPath,
            'status' => 'Belum Divalidasi',
        ]);

        return response()->json(['message' => 'Berhasil', 'data' => $laporan], 201);
    }

    public function index() {
        return response()->json(Laporan::all(), 200);
    }

    public function approve($id) {
        $laporan = Laporan::where('id_laporan', $id)->firstOrFail();
        $laporan->update(['status' => 'divalidasi']);
        return response()->json(['message' => 'Laporan di-ACC']);
    }
}