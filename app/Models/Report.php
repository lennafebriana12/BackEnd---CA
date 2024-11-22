<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // Pastikan nama tabel sesuai
    protected $table = 'reports';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'judul_utama', // Kolom dalam tabel 'reports'
        'nama',        // Nama pelapor
        'alasan',      // Alasan pelaporan
        'waktu',       // Waktu pelaporan (jika ada)
    ];

    // Jika tabel menggunakan kolom `created_at` dan `updated_at`
    public $timestamps = true; 

    // Jika tidak menggunakan timestamp, tambahkan:
    // public $timestamps = false;
}
