<?php

namespace App\Enums;

enum AdmissionTypeEnum: string
{
    case NEW = 'new';
    case OLD = 'old';
    case FORMER = 'former';

    public function getLabel(): string
    {
        return match ($this) {
            self::NEW => 'New',
            self::OLD => 'Old',
            self::FORMER => 'Former',
        };
    }

    public function getDescription(): string
    {
        return match ($this) {
            self::NEW => 'New Patient',
            self::OLD => 'Old Patient',
            self::FORMER => 'Former Patient',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::NEW => 'blue-500',
            self::OLD => 'green-500',
            self::FORMER => 'yellow-500',
        };
    }
}
