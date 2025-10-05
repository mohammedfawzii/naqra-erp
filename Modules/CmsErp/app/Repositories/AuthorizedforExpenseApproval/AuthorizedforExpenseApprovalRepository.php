<?php

namespace Modules\CmsErp\Repositories\AuthorizedforExpenseApproval;

use Modules\CmsErp\Repositories\AuthorizedforExpenseApproval\AuthorizedforExpenseApprovalRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\AuthorizedforExpenseApproval;

class AuthorizedforExpenseApprovalRepository extends BaseRepository implements AuthorizedforExpenseApprovalRepositoryInterface
{
    public function __construct(AuthorizedforExpenseApproval $model)
    {
        parent::__construct($model);
    }
}
