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
            'ldu_login'    => $this->ldu_login,
            'ldu_password' => $this->ldu_password,
            'faculty_id'   => Faculty::find($this->faculty_id)->name,
            'group'        => $this->group,
            'course'       => $this->course,
        ];
    }
}
