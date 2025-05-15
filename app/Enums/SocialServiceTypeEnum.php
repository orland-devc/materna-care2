<?php

namespace App\Enums;

enum SocialServiceTypeEnum: string
{
    case A = 'a';
    case B = 'b';
    case C = 'c';
    case D = 'd';

    public function getLabel(): string
    {
        return match ($this) {
            self::A => 'Class A',
            self::B => 'Class B',
            self::C => 'Class C',
            self::D => 'Class D',
        };
    }

    public function getDescription(): string
    {
        return match ($this) {
            self::A => 'Full-paying patients',
            self::B => 'Partial financial assistance',
            self::C => 'Heavily subsidized',
            self::D => 'Fully subsidized care',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->getLabel()])
            ->toArray();
    }
}
