<?php

namespace App\Models;

use App\Enums\AdmissionTypeEnum;
use App\Enums\PatientAutopsyStatusEnum;
use App\Enums\PatientCivilStatus;
use App\Enums\PatientDispositionEnum;
use App\Enums\PatientMedicareTypeEnum;
use App\Enums\PatientSexEnum;
use App\Enums\PatientTypeEnum;
use App\Models\Traits\SegmentAble;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientRecord extends Model
{
    use HasFactory;
    use SegmentAble;

    protected $fillable = [
        'user_id',
        'patient_code',
        'type',
        'lastName',
        'firstName',
        'middleName',
        'permanentAddress',
        'telephoneNumber',
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
        'dischargeDate',
        'totalDays',
        'attendingPhysician',
        'admissionType',
        'referredBy',
        'socialServiceClass',
        'hospitalizationPlan',
        'healthInsurance',
        'medicareType',
        'allergies',
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
        'birthDate'        => 'date',
        'admissionDate'     => 'datetime',
        'dischargeDate'     => 'datetime',
        'sex'               => PatientSexEnum::class,
        'civilStatus'       => PatientCivilStatus::class,
        'type'              => PatientTypeEnum::class,
        'admissionType'     => AdmissionTypeEnum::class,
        'medicareType'      => PatientMedicareTypeEnum::class,
        'disposition'       => PatientDispositionEnum::class,
        'autopsyStatus'     => PatientAutopsyStatusEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getSegmentColumn(): string
    {
        return 'patient_code';
    }
}
