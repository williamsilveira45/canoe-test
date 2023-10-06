<?php

namespace App\Modules\Core\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait UuidTrait
{
    protected static function boot(): void
    {
        // Boot other traits on the Model
        parent::boot();

        /**
         * Sets the 'id' to a UUID using Str::orderedUuid() on the instance being created
         */
        static::creating(function (Model $model) {
            if ($model->getKey() === null) {
                $model->setAttribute($model->getKeyName(), Str::orderedUuid()->toString());
            }
        });
    }

    // Tells the database not to auto-increment this field
    public function getIncrementing(): bool
    {
        return false;
    }

    // Helps the application specify the field type in the database
    public function getKeyType(): string
    {
        return 'string';
    }
}
