<?php
declare(strict_types=1);

namespace OurSociety\Action\Admin\Reports;

use OurSociety\Action;

class EditAction extends Action\EditAction
{
    protected function getSelectFieldNames(): array
    {
        return ['question_id', 'user_id'];
    }

    //protected function getPaginationQuery(): Query
    //{
    //    return $this->getRepository()->getAdminEditQuery();
    //}
    //
    //protected function getRepository(): AppTable
    //{
    //    return ReportsTable::instance();
    //}
}
