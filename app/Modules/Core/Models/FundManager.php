<?php

namespace App\Modules\Core\Models;

use App\Modules\Core\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * FundManager Model
 *
 * @property string $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Fund[] $funds
 */
class FundManager extends Model
{
    use HasFactory, SoftDeletes, UuidTrait;

    /**
     * @return HasMany
     */
    public function funds(): HasMany
    {
        return $this->hasMany(Fund::class);
    }
}
