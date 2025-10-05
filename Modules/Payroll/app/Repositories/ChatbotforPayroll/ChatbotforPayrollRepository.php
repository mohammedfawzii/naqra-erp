<?php

namespace Modules\Payroll\Repositories\ChatbotforPayroll;

use Modules\Payroll\Repositories\ChatbotforPayroll\ChatbotforPayrollRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\ChatbotforPayroll;

class ChatbotforPayrollRepository extends BaseRepository implements ChatbotforPayrollRepositoryInterface
{
    public function __construct(ChatbotforPayroll $model)
    {
        parent::__construct($model);
    }
}
