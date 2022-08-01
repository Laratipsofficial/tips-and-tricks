<?php

namespace App\Http\Resources;

use App\Enums\UserTypeEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'email' => $this->when($this->type == UserTypeEnum::ADMIN, function () {
            //     return $this->email;
            // }),

            $this->mergeWhen($this->type == UserTypeEnum::ADMIN, function () {
                return [
                    'email' => $this->email,
                    'type' => $this->type,
                ];
            }),
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
            'roles_count' => $this->whenCounted('roles'),
        ];
    }
}
