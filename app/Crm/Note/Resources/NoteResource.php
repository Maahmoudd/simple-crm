<?php

namespace Crm\Note\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'notes' =>[
                'id' => $this->id,
                'note' => $this->note,
                'customer_id' => $this->customer_id,
            ],
            'Status' => 'Success'
        ];
    }
}
