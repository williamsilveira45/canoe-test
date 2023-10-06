<?php

namespace App\Modules\Core\Data\Requests;

use Illuminate\Http\Request;
use Spatie\LaravelData\Data;

class FundListRequestData extends Data
{
    public function __construct(
        public ?string $name = null,
        public ?string $fund_manager = null,
        public int|string|null $year = null,
    ) {
    }

    /**
     * @param Request $request
     * @return self
     */
    public function fromRequest(Request $request): self
    {
        return new self(
            name: $request->get('name'),
            fund_manager: $request->get('fund_manager'),
            year: (int) $request->get('year'),
        );
    }
}
