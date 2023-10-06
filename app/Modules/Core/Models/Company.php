<?php

namespace App\Modules\Core\Models;

use App\Modules\Core\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Company Model
 *
 * @property string $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Fund[] $funds
 */
class Company extends Model
{
    use HasFactory, UuidTrait, SoftDeletes;

    public function funds(): BelongsToMany
    {
        return $this->belongsToMany(Fund::class);
    }
}
