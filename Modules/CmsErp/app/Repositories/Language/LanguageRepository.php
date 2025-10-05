<?php

namespace Modules\CmsErp\Repositories\Language;

use Modules\CmsErp\Repositories\Language\LanguageRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Language;

class LanguageRepository extends BaseRepository implements LanguageRepositoryInterface
{
    public function __construct(Language $model)
    {
        parent::__construct($model);
    }
}
