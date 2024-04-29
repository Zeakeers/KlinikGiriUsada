<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DaftarLayananResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'daftar_id' => $this->daftar_id,
            'daftar_tanggal' => $this->daftar_tanggal,
            'daftar_idpasien' => $this->daftar_idpasien,
            'daftar_idjenis' => $this->daftar_idjenis,
        ];
    }
}
