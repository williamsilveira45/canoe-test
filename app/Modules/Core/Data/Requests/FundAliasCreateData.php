<?php

namespace App\Modules\Core\Data\Requests;

use App\Modules\Core\Models\Fund;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Data;

class FundAliasCreateData extends Data
{
    public function __construct(
        public string $name,
        #[Exists(Fund::class, 'id')]
        public string $fund_id,
    ) {
    }
}
