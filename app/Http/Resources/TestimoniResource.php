<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestimoniResource extends JsonResource
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
            'pekerjaan' => $this->pekerjaan,
            'program_studi' => $this->program_studi,
            'angkatan' => $this->angkatan,
            'judul_utama' => $this->judul_utama,
            'link_video' => $this->link_video,
            'user_id' => $this->user_id,
        ];
    }
}