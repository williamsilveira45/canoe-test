<?php

namespace App\Modules\Core\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Core\Actions\FundCreateAction;
use App\Modules\Core\Actions\FundDeleteAction;
use App\Modules\Core\Actions\FundUpdateAction;
use App\Modules\Core\Data\Requests\FundCreateRequestData;
use App\Modules\Core\Data\Requests\FundListRequestData;
use App\Modules\Core\Data\Requests\FundUpdateRequestData;
use App\Modules\Core\Data\Responses\FundCreateResponseData;
use App\Modules\Core\Data\Responses\FundListResponseData;
use App\Modules\Core\Data\Responses\FundUpdateResponseData;
use App\Modules\Core\Models\Fund;
use App\Modules\Core\Repositories\FundRepository;
use Spatie\LaravelData\DataCollection;

class FundController extends Controller
{
    /**
     * @param FundListRequestData $request
     * @param FundRepository $repository
     * @return DataCollection
     */
    public function index(FundListRequestData $request, FundRepository $repository): DataCollection
    {
        return FundListResponseData::collection($repository->getFundList($request));
    }

    /**
     * @param Fund $fund
     * @param FundUpdateRequestData $request
     * @param FundUpdateAction $action
     * @return FundUpdateResponseData
     */
    public function update(Fund $fund, FundUpdateRequestData $request, FundUpdateAction $action): FundUpdateResponseData
    {
        return FundUpdateResponseData::from($action->execute($fund, $request));
    }

    /**
     * @param FundCreateRequestData $request
     * @param FundCreateAction $action
     * @return FundCreateResponseData
     */
    public function create(FundCreateRequestData $request, FundCreateAction $action): FundCreateResponseData
    {
        return FundCreateResponseData::from($action->execute($request));
    }

    /**
     * @param Fund $fund
     * @param FundDeleteAction $deleteAction
     * @return void
     */
    public function destroy(Fund $fund, FundDeleteAction $deleteAction): void
    {
        $deleteAction->execute($fund);
    }

    /**
     * @param FundRepository $repository
     * @return DataCollection
     */
    public function duplicates(FundRepository $repository): DataCollection
    {
        return FundListResponseData::collection($repository->getDuplicatedFunds());
    }
}
