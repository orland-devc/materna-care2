<?php

namespace App\Enums;

enum PatientDispositionEnum: string
{
    case DISCHARGED = 'discharged';
    case TRANSFERRED = 'transferred';
    case DAMA = 'dama';
    case ABSCONDED = 'absconded';
    case RECOVERED = 'recovered';
    case IMPROVED = 'improved';
    case UNIMPROVED = 'unimproved';
    case DIED = 'died';

    public function getLabel(): string
    {
        return match ($this) {
            self::DISCHARGED => 'Discharged',
            self::TRANSFERRED => 'Transferred',
            self::DAMA => 'DAMA',
            self::ABSCONDED => 'Absconded',
            self::RECOVERED => 'Recovered',
            self::IMPROVED => 'Improved',
            self::UNIMPROVED => 'Unimproved',
            self::DIED => 'Died',
        };
    }

    public function getDescription(): string
    {
        return match ($this) {
            self::DISCHARGED => 'Patient has been discharged',
            self::TRANSFERRED => 'Patient has been transferred',
            self::DAMA => 'Patient left against medical advice',
            self::ABSCONDED => 'Patient absconded',
            self::RECOVERED => 'Patient has recovered',
            self::IMPROVED => 'Patient has improved',
            self::UNIMPROVED => 'Patient has not improved',
            self::DIED => 'Patient has died',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->getLabel()])
            ->toArray();
    }
}
