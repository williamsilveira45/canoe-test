<?php

namespace App\Modules\Core\Actions\Saves;

use App\Modules\Core\Models\FundAlias;

/**
 * Class FundAliasSaveAction
 * This file is just a demonstration purpose you can put some logic here, like logs, events, etc.
 */
class FundAliasSaveAction
{
    private FundAlias $model;

    /**
     * @param FundAlias $fund
     * @return FundAlias
     */
    public function execute(FundAlias $fund): FundAlias
    {
        $this->model = $fund;

        if (false === $this->model->exists) {
            return $this->create();
        }

        return $this->update();
    }

    private function create(): FundAlias
    {
        $this->model->save();
        $this->model->refresh();

        return $this->model;
    }

    private function update(): FundAlias
    {
        $this->model->save();
        $this->model->refresh();

        return $this->model;
    }
}
