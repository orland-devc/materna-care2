<?php

namespace App\Enums;

enum PatientTypeEnum: string
{
    case ADULT = 'adult';
    case INFANT = 'infant';
    case CHILD = 'child';

    public function getLabel(): string
    {
        return match ($this) {
            self::ADULT => 'Adult',
            self::INFANT => 'Infant',
            self::CHILD => 'Child',
        };
    }

    public function getDescription(): string
    {
        return match ($this) {
            self::ADULT => 'Adult Patient',
            self::INFANT => 'Infant Patient',
            self::CHILD => 'Child Patient',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::ADULT => 'blue-500',
            self::INFANT => 'green-500',
            self::CHILD => 'yellow-500',
        };
    }
}
