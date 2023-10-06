<?php

namespace App\Modules\Core\Listeners;

use App\Modules\Core\Events\FundCreatedEvent;
use App\Modules\Core\Models\Fund;
use Exception;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class FundCheckForDuplicationListener
{
    /**
     * @param FundCreatedEvent $event
     * @return void
     * @throws Exception
     */
    public function handle(FundCreatedEvent $event): void
    {
        $fund = $event->fund;
        $aliases = $fund->aliases()->pluck('name')->toArray();
        $exists = Fund::query()
            ->where(function ($query) use ($aliases, $fund) {
                $query->where('name', '=', $fund->name)
                    ->orWhereHas('aliases', function ($query) use ($aliases, $fund) {
                        $query->whereIn('name', $aliases);
                    });
            })
            ->where('manager_id', '=', $fund->manager_id)
            ->where('id', '!=', $fund->getKey())
            ->exists();


        if (false === $exists) {
            return;
        }

        $message = new Message(
            body: $fund->getKey(),
        );

        Kafka::publishOn('duplicate_fund_warning')->withMessage($message)->send();
    }
}
