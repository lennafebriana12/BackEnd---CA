<?php
//TestimoniResource.php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TestimoniResource extends JsonResource
{
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
            'links' => [
                'self' => route('testimoni.Id', ['id' => $this->id]),
                'update' => route('testimoni.update', ['id' => $this->id]),
                'delete' => route('testimoni.delete', ['id' => $this->id]),
            ]
        ];
    }
}

class TestimoniCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'create' => route('testimoni.store'),
                'all_reports' => route('report.index'),
                'categories' => route('category.index'),
            ]
        ];
    }
}
