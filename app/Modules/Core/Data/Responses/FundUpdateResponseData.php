<?php

namespace App\Modules\Core\Data\Responses;

use Spatie\LaravelData\Data;

class FundUpdateResponseData extends Data
{
    public function __construct(
        public string $id,
        public string $name,
        public string $manager_id,
        public int $start_year,
        public string $created_at,
        public string $updated_at,
    ) {
    }
}
