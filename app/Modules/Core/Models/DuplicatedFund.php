<?php

namespace App\Modules\Core\Models;

use App\Modules\Core\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class DuplicatedFund
 * @property string $id
 * @property string $fund_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Fund[] $funds
 * /
 */
class DuplicatedFund extends Model
{
    use HasFactory, UuidTrait;

    /**
     * @return BelongsTo
     */
    public function fund(): BelongsTo
    {
        return $this->belongsTo(Fund::class);
    }
}
