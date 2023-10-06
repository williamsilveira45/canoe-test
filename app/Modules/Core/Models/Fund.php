<?php

namespace App\Modules\Core\Models;

use App\Modules\Core\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Fund Model
 *
 * @property string $id
 * @property string $name
 * @property int $start_year
 * @property string $manager_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read FundManager $fundManager
 * @property-read FundAlias $aliases
 * @property-read Company[] $companies
 */
class Fund extends Model
{
    use HasFactory, UuidTrait, SoftDeletes;

    /**
     * @return HasMany
     */
    public function aliases(): HasMany
    {
        return $this->hasMany(FundAlias::class);
    }

    /**
     * @return BelongsTo
     */
    public function fundManager(): BelongsTo
    {
        return $this->belongsTo(FundManager::class, 'manager_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class);
    }
}
