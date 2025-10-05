<?php

namespace Modules\Facilities\Transformers\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'userName' => $resource->userName,
            'email' => $resource->email,
            'fullName' => $resource->fullName,
            'mobileNumber' => $resource->mobileNumber,
            'securityQuestion' => $resource->securityQuestion?->questions,
            'security_answer' => $resource->security_answer,
            'gender' => $resource->gender,
            'nationality' => $resource->nationality?->name,
            'language' => $resource->language?->name,
            'termsAccepted' => $resource->termsAccepted,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,

        ];
    }
}
