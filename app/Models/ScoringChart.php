<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoringChart extends Model
{
    protected $fillable = [
        'patient_admission_id',

        'dateScored',
        'heartRate',
        'respiratory',
        'muscleTone',
        'reflexes',
        'color',

        '5heartRate',
        '5respiratory',
        '5muscleTone',
        '5reflexes',
        '5color',

        '10heartRate',
        '10respiratory',
        '10muscleTone',
        '10reflexes',
        '10color',

        'otherHeartRate',
        'otherRespiratory',
        'otherMuscleTone',
        'otherReflexes',
        'otherColor',
    ];

    public function patientRecord()
    {
        return $this->belongsTo(PatientRecord::class);
    }

}
