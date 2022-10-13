<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return ([
            'id' => (string)$this->id,
            "attributes" =>  [
                'name' => $this->name,
                'description' => $this->description,

                'time' => $this->time,

            ],
            'relationships' => [
                'user_id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,

            ]

        ]);
    }
}
