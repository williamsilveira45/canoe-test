<?php

namespace App\Modules\Core\Actions\Saves;

use App\Modules\Core\Events\FundCreatedEvent;
use App\Modules\Core\Models\Fund;

/**
 * Class FundSaveAction
 * This file is just a demonstration purpose you can put some logic here, like logs, events, etc.
 */
class FundSaveAction
{
    private Fund $model;

    /**
     * @param Fund $fund
     * @return Fund
     */
    public function execute(Fund $fund): Fund
    {
        $this->model = $fund;

        if (false === $this->model->exists) {
            return $this->create();
        }

        return $this->update();
    }

    private function create(): Fund
    {
        $this->model->save();
        $this->model->refresh();

        event(new FundCreatedEvent($this->model));

        return $this->model;
    }

    private function update(): Fund
    {
        $this->model->save();
        $this->model->refresh();

        return $this->model;
    }
}
