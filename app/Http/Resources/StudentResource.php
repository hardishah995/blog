<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class StudentResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'first_name'    => $this->firstname,
            'last_name'     => $this->lastname,
            'status'        => ($this->isActive()) ? 'Active' : 'InActive',
            'created_at'    => optional($this->created_at)->toDateString(),
            'created_by'    => (isset($this->creator)) ? optional($this->creator)->first_name : $this->user_name,
        ];
    }
}
