<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'Titulo' => $this->title,
            'Descripción' => $this->description,
            'ISBN' => $this->isbn,
            'Total de copias' => $this->copies_total,
            'Copias disponibles' => $this->copies_available,
            'Estado' => (bool) $this->status,
        ];
    }
}