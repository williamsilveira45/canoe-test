<?php

namespace App\Modules\Core\Actions;

use App\Modules\Core\Actions\Saves\FundSaveAction;
use App\Modules\Core\Data\Requests\FundAliasCreateData;
use App\Modules\Core\Data\Requests\FundUpdateRequestData;
use App\Modules\Core\Models\Fund;

class FundUpdateAction
{
    /**
     * @param FundSaveAction $saveAction
     * @param FundAliasAction $aliasAction
     * @param FundAliasDeleteAction $deleteAliasAction
     */
    public function __construct(
        private readonly FundSaveAction $saveAction,
        private readonly FundAliasAction $aliasAction,
        private readonly FundAliasDeleteAction $deleteAliasAction,
    ) {

    }

    /**
     * @param Fund $model
     * @param FundUpdateRequestData $requestData
     * @return Fund
     */
    public function execute(Fund $model, FundUpdateRequestData $requestData): Fund
    {
        $model->name = $requestData->name ?? $model->name;
        $model->manager_id = $requestData->manager_id ?? $model->manager_id;
        $model->start_year = $requestData->start_year ?? $model->start_year;


        $save = $this->saveAction->execute($model);

        if (null !== $requestData->aliases) {
            if (false === empty($model->aliases)) {
                foreach ($model->aliases as $alias) {
                    $this->deleteAliasAction->execute($alias->getKey());
                }
            }

            foreach ($requestData->aliases as $alias) {
                $this->aliasAction->execute(
                    FundAliasCreateData::from([
                        'fund_id' => $model->id,
                        'name' => $alias,
                    ])
                );
            }
        }

        return $save;
    }
}
