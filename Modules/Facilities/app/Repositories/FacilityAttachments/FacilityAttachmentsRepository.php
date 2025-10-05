<?php

namespace Modules\Facilities\Repositories\FacilityAttachments;

use Modules\Facilities\Repositories\FacilityAttachments\FacilityAttachmentsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\FacilityAttachments;

class FacilityAttachmentsRepository extends BaseRepository implements FacilityAttachmentsRepositoryInterface
{
    public function __construct(FacilityAttachments $model)
    {
        parent::__construct($model);
    }
}
