<?php

namespace Modules\Payroll\Repositories\PayrollAttachment;

use Modules\Payroll\Repositories\PayrollAttachment\PayrollAttachmentRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\PayrollAttachment;

class PayrollAttachmentRepository extends BaseRepository implements PayrollAttachmentRepositoryInterface
{
    public function __construct(PayrollAttachment $model)
    {
        parent::__construct($model);
    }
}
