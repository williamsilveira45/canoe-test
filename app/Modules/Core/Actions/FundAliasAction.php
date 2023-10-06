<?php

namespace App\Modules\Core\Actions;

use App\Modules\Core\Actions\Saves\FundAliasSaveAction;
use App\Modules\Core\Data\Requests\FundAliasCreateData;
use App\Modules\Core\Models\FundAlias;

class FundAliasAction
{
    /**
     * @param FundAliasSaveAction $saveAction
     */
    public function __construct(
        private readonly FundAliasSaveAction $saveAction,
    ) {

    }

    /**
     * @param FundAliasCreateData $requestData
     * @return FundAlias
     */
    public function execute(FundAliasCreateData $requestData): FundAlias
    {
        $model = new FundAlias();
        $model->name = $requestData->name;
        $model->fund_id = $requestData->fund_id;

        return $this->saveAction->execute($model);
    }
}
