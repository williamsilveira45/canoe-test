<?php

namespace App\Modules\Core\Data\Requests;

use App\Modules\Core\Models\Fund;
use App\Modules\Core\Models\FundManager;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class FundCreateRequestData extends Data
{
    public function __construct(
        public string $name,
        #[Exists(FundManager::class, 'id')]
        public string $manager_id,
        #[Min(1900)]
        public int $start_year,
        public ?array $aliases = null,
    ) {
    }
}
