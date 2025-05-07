<?php

namespace App\Enums;

enum PatientCivilStatus: string
{
    case SINGLE = 'single';
    case MARRIED = 'married';
    case WIDOWED = 'widowed';
    case DIVORCED = 'divorced';

    public function getLabel(): string
    {
        return match ($this) {
            self::SINGLE => 'Single',
            self::MARRIED => 'Married',
            self::WIDOWED => 'Widowed',
            self::DIVORCED => 'Divorced',
        };
    }

    public function getDescription(): string
    {
        return match ($this) {
            self::SINGLE => 'Single Status',
            self::MARRIED => 'Married Status',
            self::WIDOWED => 'Widowed Status',
            self::DIVORCED => 'Divorced Status',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::SINGLE => 'blue-500',
            self::MARRIED => 'green-500',
            self::WIDOWED => 'yellow-500',
            self::DIVORCED => 'red-500',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->getLabel()])
            ->toArray();
    }
}
