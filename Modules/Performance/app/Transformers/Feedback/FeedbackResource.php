<?php

namespace Modules\Performance\Transformers\Feedback;

use Modules\Performance\Transformers\BaseResource\BaseResource;

class FeedbackResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'type' => $resource->type,
            'comment' => $resource->comment,
            'feedback_date' => $resource->feedback_date,
            'sender_name' => $resource->sender_name,
            ],
            $this->timestampsArray()
        );
    }
}
