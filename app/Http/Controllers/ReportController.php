<?php

namespace App\Http\Controllers;
use App\Http\Resources\ReportResource;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index(Request $request)
    {

          // Ambil parameter 'search' dari query string
          $search = $request->get('search');
    
          if ($search) {
              // Jika ada parameter pencarian, filter data
              $reports = Report::where(function ($q) use ($search) {
                  $q->where('alasan', 'like', "%{$search}%")
                    ->orWhere('waktu', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhere('judul_utama', 'like', "%{$search}%");
              })->get();
          } else {
              // Jika tidak ada parameter pencarian, ambil semua data
              $reports = Report::all();
          }
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