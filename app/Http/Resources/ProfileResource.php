<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'pasien_id' => $this->pasien_id,
            'pasien_nama' => $this->pasien_nama,
            'pasien_nik' => $this->pasien_nik,
            'pasien_gender' => $this->pasien_gender,
            'pasien_foto' => $this->pasien_foto,
            'pasien_alamat' => $this->pasien_alamat,
        ];
    }
}
