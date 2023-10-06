<?php

namespace App\Modules\Core\Repositories;

use App\Modules\Core\Models\FundAlias;

class FundAliasRepository
{
    public function find(string $id): FundAlias
    {
        return FundAlias::findOrFail($id);
    }
}
