<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Resources\ReportResource;

class AdminController extends Controller
{
    public function index()
    {
        $reports = Report::all(); // Mengambil semua data dari tabel 'reports'
        return ReportResource::collection($reports);
    }
}
