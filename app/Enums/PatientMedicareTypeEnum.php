<?php

namespace App\Enums;

enum PatientMedicareTypeEnum: string
{
    case GSIS_MEMBER = 'gsis-member';
    case GSIS_DEPENDENT = 'gsis-dependent';
    case SSS_MEMBER = 'sss-member';
    case SSS_DEPENDENT = 'sss-dependent';
    case OWWA = 'owwa';
    case NON_MEDICARE = 'non-medicare';
    case INDIGENT = 'indigent';

    public function getLabel(): string
    {
        return match ($this) {
            self::GSIS_MEMBER => 'GSIS Member',
            self::GSIS_DEPENDENT => 'GSIS Dependent',
            self::SSS_MEMBER => 'SSS Member',
            self::SSS_DEPENDENT => 'SSS Dependent',
            self::OWWA => 'OWWA',
            self::NON_MEDICARE => 'Non-Medicare',
            self::INDIGENT => 'Indigent',
        };
    }

    public function getDescription(): string
    {
        return match ($this) {
            self::GSIS_MEMBER => 'Government Service Insurance System Member',
            self::GSIS_DEPENDENT => 'Government Service Insurance System Dependent',
            self::SSS_MEMBER => 'Social Security System Member',
            self::SSS_DEPENDENT => 'Social Security System Dependent',
            self::OWWA => 'Overseas Workers Welfare Administration',
            self::NON_MEDICARE => 'Non-Medicare Patient',
            self::INDIGENT => 'Indigent Patient',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->getLabel()])
            ->toArray();
    }
}
