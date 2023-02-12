<?php

declare(strict_types=1);

namespace App\Enums;

enum IsAdminStatus: string
{
    case ACTIVE = '1';
    case BLOCKED = '0';

    public static function all(): array
    {
        return [
            self::ACTIVE->value,
            self::BLOCKED->value,
        ];
    }
}