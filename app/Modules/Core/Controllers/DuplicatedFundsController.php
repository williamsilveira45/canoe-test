<?php

namespace App\Modules\Core\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Core\Models\DuplicatedFund;
use Illuminate\Http\Request;

class DuplicatedFundsController extends Controller
{
    /**
     * It will be a simple class and method, once that is just to show the kafka integration working
     */
    public function __invoke(Request $request): void
    {
        $model = new DuplicatedFund();
        $model->fund_id = str_replace('"', '', $request->input('fund_id'));
        $model->save();
    }
}
