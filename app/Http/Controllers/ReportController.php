<?php

namespace App\Http\Controllers;
use App\Http\Resources\ReportResource;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all(); // Mengambil semua data dari tabel 'reports'
        return ReportResource::collection($reports);
    }

    public function store(Request $request)
    {
        $post = Report::create($request->all());

        // Berguna jika sedang testing api dengan postman maka ini yang berjalan dan tampil di postman
        return new ReportResource($post); // Mengembalikan data testimoni dalam bentuk resource API.
        
    }

    public function show($id)
    {
        $report = Report::find($id);

        if (!$report) {
            return response()->json(['error' => '$report not found'], 404);
        }

        return response()->json($report);

    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);

        $report -> delete();

        return new ReportResource($report);

    }
}