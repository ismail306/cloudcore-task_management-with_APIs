<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;

class Task extends JsonResource
{
    public function toArray($request)
    {
        return [
            'task_id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'due_date' => $this->due_date,
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
