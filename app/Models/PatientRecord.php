<?php

namespace App\Models;

use App\Enums\AdmissionTypeEnum;
use App\Enums\PatientAutopsyStatusEnum;
use App\Enums\PatientCivilStatus;
use App\Enums\PatientDispositionEnum;
use App\Enums\PatientMedicareTypeEnum;
use App\Enums\PatientSexEnum;
use App\Enums\PatientTypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'medrec_code',
        'type',
        'lastName',
        'firstName',
        'middleName',
        'wardService',
        'permanentAddress',
        'telephoneNumber',
        'email',
        'sex',
        'civilStatus',
        'birthDate',
        'age',
        'birthPlace',
        'nationality',
        'religion',
        'occupation',

        'employer',
        'employerAddress',
        'employerTelNo',

        'fatherName',
        'fatherAddress',
        'fatherTelNo',
        'motherName',
        'motherAddress',
        'motherTelNo',

        'admissionDate',
        'admissionTime',
        'dischargeDate',
        'dischargeTime',
        'totalDays',
        'attendingPhysician',
        'admissionType',
        'referredBy',

        'socialServiceClass',
        'hospitalizationPlan',
        'healthInsurance',
        'medicareType',
        'allergies',

        'informant',
        'informantAddress',
        'relationship',
        'informantTelNo',

        'admissionDiagnosis',
        'principalDiagnosis',
        'otherDiagnosis',
        'principalProcedure',
        'otherProcedures',
        'accidentDetails',
        'placeOfOccurrence',
        'disposition',
        'autopsyStatus',
    ];

    protected $casts = [
        'sex' => PatientSexEnum::class,
        'civilStatus' => PatientCivilStatus::class,
        'type' => PatientTypeEnum::class,
        'admissionType' => AdmissionTypeEnum::class,
        'medicareType' => PatientMedicareTypeEnum::class,
        'disposition' => PatientDispositionEnum::class,
        'autopsyStatus' => PatientAutopsyStatusEnum::class,
    ];

    public function fullName()
    {
        return $this->firstName.' '.$this->middleName.' '.$this->lastName;
    }

    public function formalName()
    {
        return $this->lastName.', '.$this->firstName.' '.$this->middleName;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($patientRecord) {
            $now = Carbon::now();
            $yearMonth = $now->format('y').$now->format('m'); // e.g. 2505

            $prefix = "REC-{$yearMonth}-";

            $count = self::whereYear('created_at', $now->year)
                ->whereMonth('created_at', $now->month)
                ->count() + 1;

            $sequence = str_pad($count, 4, '0', STR_PAD_LEFT);

            $patientRecord->medrec_code = $prefix.$sequence;
        });
    }
}
