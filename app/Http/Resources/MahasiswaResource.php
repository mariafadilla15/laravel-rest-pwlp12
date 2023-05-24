<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'nim'=>$this->nim,
            'nama'=>$this->nama,
            'jurusan'=>strtoupper($this->jurusan),
        ];
    }
}
