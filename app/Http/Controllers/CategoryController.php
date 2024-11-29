<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {

          // Ambil parameter 'search' dari query string
          $search = $request->get('search');
    
          if ($search) {
              // Jika ada parameter pencarian, filter data
              $categories = User::where(function ($q) use ($search) {
                  $q->where('name', 'like', "%{$search}%")
                    ->orWhere('job', 'like', "%{$search}%");
              })->get();
          } else {
              // Jika tidak ada parameter pencarian, ambil semua data
              $categories = User::all();
          }
        return CategoryResource::collection($categories);
    }
}
