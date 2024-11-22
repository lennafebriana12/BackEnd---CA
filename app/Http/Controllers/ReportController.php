<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all(); // Mengambil semua data dari tabel 'reports'
        return response()->json($reports, 200);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'judul_utama' => 'required|string',
            'nama' => 'required|string|max:255',
            'alasan' => 'required|string',
        ]);

        // Simpan data ke database
        $report = Report::create($validatedData);

        return response()->json($report, 201);
    }

    public function show($id)
    {
        $report = Report::find($id);

        if (!$report) {
            return response()->json(['message' => 'Report not found'], 404);
        }

        return response()->json($report, 200);
    }

    public function destroy($id)
    {
        $report = Report::find($id);

        if (!$report) {
            return response()->json(['message' => 'Report not found'], 404);
        }

        $report->delete();

        return response()->json(['message' => 'Report deleted successfully'], 200);
    }



}
