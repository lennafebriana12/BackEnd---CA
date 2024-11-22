<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'judul_utama' => $this->judul_utama,
            'nama' => $this->nama,
            'alasan' => $this->alasan,
            'waktu' => $this->waktu,
        ];
    }
}
