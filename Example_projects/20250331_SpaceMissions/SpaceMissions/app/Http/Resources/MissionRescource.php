<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MissionRescource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->_id,
            'name' => $this->name,
            "launch_date" => $this->launch_date,
            "agency_name" => $this->agency->name,
            "commander" => $this->commander->commander_name
        ];
    }
}
