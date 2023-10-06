<?php

namespace App\Modules\Core\Actions;

use App\Modules\Core\Actions\Saves\FundSaveAction;
use App\Modules\Core\Data\Requests\FundAliasCreateData;
use App\Modules\Core\Data\Requests\FundCreateRequestData;
use App\Modules\Core\Models\Fund;

class FundCreateAction
{
    /**
     * @param FundSaveAction $saveAction
     * @param FundAliasAction $aliasAction
     */
    public function __construct(
        private readonly FundSaveAction $saveAction,
        private readonly FundAliasAction $aliasAction
    ) {

    }

    /**
     * @param FundCreateRequestData $requestData
     * @return Fund
     */
    public function execute(FundCreateRequestData $requestData): Fund
    {
        $model = new Fund();
        $model->name = $requestData->name;
        $model->manager_id = $requestData->manager_id;
        $model->start_year = $requestData->start_year;

        $model = $this->saveAction->execute($model);

        if (null !== $requestData->aliases) {
            foreach ($requestData->aliases as $alias) {
                $this->aliasAction->execute(
                    FundAliasCreateData::from([
                        'fund_id' => $model->id,
                        'name' => $alias,
                    ])
                );
            }
        }

        return $model;
    }
}
