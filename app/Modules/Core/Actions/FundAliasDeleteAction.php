<?php

namespace App\Modules\Core\Actions;

use App\Modules\Core\Repositories\FundAliasRepository;

class FundAliasDeleteAction
{
    /**
     * @param FundAliasRepository $repository
     */
    public function __construct(
        private readonly FundAliasRepository $repository,
    ) {
    }

    /**
     * @param string $id
     * @return void
     */
    public function execute(string $id): void
    {
        $model = $this->repository->find($id);

        $model->delete();
    }
}
