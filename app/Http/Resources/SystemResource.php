<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SystemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'type' => $this->type,
            'about' => $this->about,
            'contact' => $this->contact,
            'job' => $this->job, 
            'photo' => $this->photo, 
            'status' => $this->status,
            'birth_of_date' => $this->birth_of_date,
            'tempatKerja' => $this->tempatKerja,
        ];
    }
}
