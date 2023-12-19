<?php

namespace Crm\Customer\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'data' =>[
                'id' => $this->id,
                'name' => $this->name
            ],
            'Status' => 'Success'
        ];
    }
}
