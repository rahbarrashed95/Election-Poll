<?php

namespace App\Modules\Candidate\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,            
            'party' => $this->party,
            'image' => $this->image ? asset('candidates/' . $this->image) : null,
            'marka_image' => $this->marka_image ? asset('candidates/' . $this->marka_image) : null,
            'district_name' => $this->district_name,
            'division_name' => $this->division_name,
            'seat_name' => $this->seat_name,
            'total_polls' => $this->total_polls,
            'poll_percentage' => $this->poll_percentage.'%',
        ];
    }
}
