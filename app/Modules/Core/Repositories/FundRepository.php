<?php

namespace App\Modules\Core\Repositories;

use App\Modules\Core\Data\Requests\FundListRequestData;

use App\Modules\Core\Models\Fund;
use Illuminate\Database\Eloquent\Collection;

class FundRepository
{
    public function find(string $id): ?Fund
    {
        return Fund::find($id);
    }

    public function getFundList(FundListRequestData $request): Collection
    {
        return Fund::query()
            ->with('aliases')
            ->when(null !== $request->name, function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->name}%");
            })
            ->when(null !== $request->fund_manager, function ($query) use ($request) {
                $query->whereHas('fundManager', function ($query) use ($request) {
                    $query->where('name', 'like', "%{$request->fund_manager}%");
                });
            })
            ->when(null !== $request->year, function ($query) use ($request) {
                $query->where('start_year', $request->year);
            })
        ->get();
    }

    /**
     * @return Collection
     */
    public function getDuplicatedFunds(): Collection
    {
        return Fund::query()
            ->with('aliases')
            ->join('duplicated_funds', 'funds.id', '=', 'duplicated_funds.fund_id')
            ->get();
    }
}
