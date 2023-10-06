<?php

namespace App\Modules\Core\Events;

use App\Modules\Core\Models\Fund;
use Illuminate\Foundation\Events\Dispatchable;

class FundCreatedEvent
{
    use Dispatchable;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly Fund $fund,
    ) {
        //
    }
}
