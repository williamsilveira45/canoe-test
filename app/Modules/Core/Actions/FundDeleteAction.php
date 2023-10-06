<?php

namespace App\Modules\Core\Actions;

use App\Modules\Core\Models\Fund;
use App\Modules\Core\Repositories\FundRepository;

class FundDeleteAction
{
    /**
     * @param FundRepository $repository
     */
    public function __construct(
        private readonly FundAliasDeleteAction $deleteAliasAction,
    ) {
    }

    /**
     * @param string $id
     * @return void
     */
    public function execute(Fund $fund): void
    {
        /**
         * it also can be done by observables
         */
        if (false === empty($fund->aliases)) {
            foreach ($fund->aliases as $alias) {
                $this->deleteAliasAction->execute($alias->getKey());
            }
        }

        $fund->delete();
    }
}
