<?php

namespace App\Models;

use App\Enums\Settings;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
    use HasUuids;

    protected $fillable = ['code', 'value', 'name'];

    protected $casts = [
        'code' => Settings::class
    ];

}
