<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\SystemResource;

class System5Controller extends Controller
{
   
    public function system(Request $request)
    {
        // Ambil data alumni dengan filter pekerjaan System Analyst
        $users = User::where('job', 'Teknisi Jaringan')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(12); // Pagination untuk membatasi hasil per halaman

        // Return view dengan data yang telah difilter
        return SystemResource::collection($users);
    }
}
