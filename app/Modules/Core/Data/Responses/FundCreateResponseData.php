<?php

namespace App\Modules\Core\Data\Responses;

use App\Modules\Core\Models\Fund;
use Illuminate\Database\Eloquent\Collection;
use Spatie\LaravelData\Data;

class FundCreateResponseData extends Data
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
