<?php

namespace App\Modules\Core\Models;

use App\Modules\Core\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * FundAlias Model
 *
 * @property string $id
 * @property string $name
 * @property string $fund_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Fund $fund
 */
class FundAlias extends Model
{
    use HasFactory, SoftDeletes, UuidTrait;

    /**
     * @return BelongsTo
     */
    public function fund(): BelongsTo
    {
        return $this->belongsTo(Fund::class);
    }
}
