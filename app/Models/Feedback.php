<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = [
        'username',
        'comment',
    ];


    protected function username(): Attribute
    {
        return Attribute::make(
            get: fn($value): string => strtoupper($value),
            set: fn($value): string => strtolower($value)
        );
    }
}
