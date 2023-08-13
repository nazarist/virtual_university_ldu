<?php

namespace App\Http\Resources\Lesson;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'text' => $this->text,
            'type' => $this->type,
        ];
    }
}
