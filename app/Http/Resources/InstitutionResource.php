<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstitutionResource extends JsonResource
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
            'fantasy_name' => $this->fantasy_name,
            'email' => $this->email,
            'cnpj' => $this->cnpj,
            'inep' => $this->inep,
            'admin_dependency' => $this->admin_dependency,
            'phases' => $this->phases,
            'modalities' => $this->modalities,
            'type' => $this->type,
            'is_admin' => $this->is_admin,
            'state_registration' => $this->state_registration,
            'phone' => json_decode($this->phone, true),
            'address' => json_decode($this->address, true),
            'metadata' => json_decode($this->metadata, true),
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
