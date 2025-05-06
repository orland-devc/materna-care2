<?php

namespace App\Enums;

enum PatientSexEnum: string
{
    case MALE = 'male';
    case FEMALE = 'female';

    public function getLabel(): string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
        };
    }

    public function getDescription(): string
    {
        return match ($this) {
            self::MALE => 'The patient is a male.',
            self::FEMALE => 'The patient is a female.',
        };
    }
}
