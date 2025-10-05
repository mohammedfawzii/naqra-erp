<?php

namespace Modules\CmsErp\Repositories\PaymentMethod;

use Modules\CmsErp\Repositories\PaymentMethod\PaymentMethodRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\PaymentMethod;

class PaymentMethodRepository extends BaseRepository implements PaymentMethodRepositoryInterface
{
    public function __construct(PaymentMethod $model)
    {
        parent::__construct($model);
    }
}
