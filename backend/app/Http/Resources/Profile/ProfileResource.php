<?php

namespace App\Http\Resources\Profile;

use App\Models\Faculty;
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
        return [
            'first_name'   => $this->f_name,
            'last_name'    => $this->l_name,
            'ldu_login'    => $this->ldu_login,
            'faculty'      => $this->faculty->name,
            'group'        => $this->group->name,
            'course'       => $this->course,
        ];
    }
}
