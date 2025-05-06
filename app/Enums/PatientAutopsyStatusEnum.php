<?php

namespace App\Enums;

enum PatientAutopsyStatusEnum: string
{
    case AUTOPSY = 'autopsy';
    case MORE_THAN_48 = 'more-than-48';
    case WITHIN_48 = '48-hours';
    case NO_AUTOPSY = 'no-autopsy';

    public function getLabel(): string
    {
        return match ($this) {
            self::AUTOPSY => 'Autopsy',
            self::MORE_THAN_48 => 'More than 48 hours',
            self::WITHIN_48 => 'Within 48 hours',
            self::NO_AUTOPSY => 'No Autopsy',
        };
    }

    public function getDescription(): string
    {
        return match ($this) {
            self::AUTOPSY => 'Autopsy performed',
            self::MORE_THAN_48 => 'More than 48 hours since death',
            self::WITHIN_48 => 'Within 48 hours of death',
            self::NO_AUTOPSY => 'No autopsy performed',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::AUTOPSY => 'red-500',
            self::MORE_THAN_48 => 'orange-500',
            self::WITHIN_48 => 'green-500',
            self::NO_AUTOPSY => 'gray-500',
        };
    }
}
