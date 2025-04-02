<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommanderRescource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'commander_name' => $this->commander_name,
            "experience_years" => $this->experience_years,
            "mision" => $this->mission->name,
        ];
    }
}
