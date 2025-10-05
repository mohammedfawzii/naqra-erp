<?php

namespace Modules\CmsErp\Repositories\SecurityQuestions;

use Modules\CmsErp\Repositories\SecurityQuestions\SecurityQuestionsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\SecurityQuestions;

class SecurityQuestionsRepository extends BaseRepository implements SecurityQuestionsRepositoryInterface
{
    public function __construct(SecurityQuestions $model)
    {
        parent::__construct($model);
    }
}
